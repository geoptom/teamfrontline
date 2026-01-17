<?php
namespace App\Imports;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImportLog;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductImport implements ToCollection
{
    protected $hasHeader;

    // Columns allowed for mass processing
    protected $allowedHeaders = [
        'name', 'sku', 'price', 'sale_price', 'category', 'brand',
        'description', 'stock', 'status', 'images',
    ];

    public function __construct($hasHeader = 1)
    {
        $this->hasHeader = $hasHeader;
    }

    public function collection(Collection $rows)
    {
        if ($rows->isEmpty()) {
            throw new \Exception("Uploaded file is empty.");
        }

        $rowsArray = $rows->toArray();
        $start     = 0;
        $headers   = [];

        // --------------------------
        // VALIDATE HEADERS
        // --------------------------
        if ($this->hasHeader) {
            $rawHeaders = array_map('trim', $rowsArray[0]);

            // Normalize headers
            $headers = array_map(fn($h) => Str::slug(strtolower($h), '_'), $rawHeaders);

            // Required columns check
            $required = ['name', 'price'];
            $missing  = array_diff($required, $headers);

            if (! empty($missing)) {
                throw new \Exception("Missing required columns: " . implode(', ', $missing));
            }

            // Invalid header check
            foreach ($headers as $h) {
                if (! in_array($h, $this->allowedHeaders)) {
                    throw new \Exception("Invalid column detected: '{$h}'");
                }
            }

            $start = 1;
        }

        // --------------------------
        // CREATE IMPORT LOG ENTRY
        // --------------------------
        $log = ProductImportLog::create([
            'file_name'    => request()->file('file')->getClientOriginalName(),
            'rows_total'   => count($rowsArray),
            'rows_success' => 0,
            'rows_failed'  => 0,
            'errors'       => [],
        ]);

        $success = 0;
        $failed  = 0;
        $errors  = [];

        // --------------------------
        // PROCESS ROWS
        // --------------------------
        DB::transaction(function () use ($rowsArray, $start, $headers, &$success, &$failed, &$errors, $log) {
            for ($i = $start; $i < count($rowsArray); $i++) {

                try {
                    // Parse row
                    $record = $this->parseRow($rowsArray[$i], $headers);

                    // Create product
                    $this->createProductFromRecord($record);

                    $success++;
                } catch (\Throwable $e) {
                    $failed++;

                    $errors[] = [
                        'row'   => $i + 1,
                        'error' => $e->getMessage(),
                    ];
                }
            }

            // Update log
            $log->update([
                'rows_success' => $success,
                'rows_failed'  => $failed,
                'errors'       => $errors,
            ]);
        });
    }

    // ------------------------------------------------------
    // PARSE A ROW INTO A CLEAN KEY => VALUE ARRAY
    // ------------------------------------------------------
    protected function parseRow(array $row, array $headers)
    {
        $record = [];

        if ($this->hasHeader) {
            foreach ($row as $k => $v) {
                if (! isset($headers[$k])) {
                    continue;
                }

                $key = $headers[$k];

                if (in_array($key, $this->allowedHeaders)) {
                    $record[$key] = trim((string) $v);
                }
            }
        } else {
            // Assign columns by fixed order
            $record = array_combine(
                $this->allowedHeaders,
                array_pad($row, count($this->allowedHeaders), null)
            );
        }

        return $record;
    }

    // ------------------------------------------------------
    // CREATE PRODUCT FROM MAPPED RECORD
    // ------------------------------------------------------
    protected function createProductFromRecord(array $record)
    {
        if (empty($record['name'])) {
            throw new \Exception("Missing product name.");
        }

        $name  = trim($record['name']);
        $price = isset($record['price']) ? floatval($record['price']) : 0;

        $product = Product::create([
            'name'        => $name,
            'slug'        => $this->uniqueSlug(Str::slug($name)),
            'sku'         => $record['sku'] ?? null,
            'price'       => $price,
            'sale_price'  => isset($record['sale_price']) ? floatval($record['sale_price']) : null,
            'description' => $record['description'] ?? null,
            'stock'       => isset($record['stock']) ? intval($record['stock']) : 0,
            'status'      => isset($record['status']) ? intval($record['status']) : 1,
            'category_id' => $this->getCategoryId($record['category'] ?? null),
            'brand_id'    => $this->getBrandId($record['brand'] ?? null),
        ]);

        // Image handler
        if (! empty($record['images'])) {
            $images = array_map('trim', explode(',', $record['images']));

            if (! empty($images[0])) {
                $product->image = $images[0];
                $product->save();
            }
        }

        return $product;
    }

    // ------------------------------------------------------
    // CATEGORY / BRAND HELPERS
    // ------------------------------------------------------
    private function getCategoryId(?string $name)
    {
        if (! $name) {
            return null;
        }

        $name = trim($name);

        $category = Category::firstOrCreate(
            ['slug' => Str::slug($name)],
            ['name' => $name]
        );

        return $category->id;
    }

    private function getBrandId(?string $name)
    {
        if (! $name) {
            return null;
        }

        $name = trim($name);

        $brand = Brand::firstOrCreate(
            ['slug' => Str::slug($name)],
            ['name' => $name]
        );

        return $brand->id;
    }

    // ------------------------------------------------------
    // UNIQUE SLUG GENERATOR
    // ------------------------------------------------------
    protected function uniqueSlug(string $slug)
    {
        $newSlug = $slug;
        $i       = 1;

        while (Product::where('slug', $newSlug)->exists()) {
            $newSlug = "{$slug}-{$i}";
            $i++;
        }

        return $newSlug;
    }
}
