<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\CareerApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CareerApplicationController extends Controller
{
    /**
     * Display a listing of applications for a given career.
     */
    public function index(Career $career)
    {
        $applications = $career->applications()->latest()->paginate(20);
        return view('admin.careers.applications.index', compact('career', 'applications'));
    }

    /**
     * Download the resume file for an application.
     */
    public function download(CareerApplication $application)
    {
        if (! $application->resume_path || ! Storage::disk('public')->exists($application->resume_path)) {
            return redirect()->back()->with('error', 'File not found');
        }

        // Resolve absolute path on the public disk and return a streamed download response
        $filePath = Storage::disk('public')->path($application->resume_path);
        if (! file_exists($filePath)) {
            return redirect()->back()->with('error', 'File not found');
        }

        return response()->download($filePath);
    }

    /**
     * Delete an application.
     */
    public function destroy(CareerApplication $application)
    {
        // Optionally delete file
        if ($application->resume_path && Storage::disk('public')->exists($application->resume_path)) {
            Storage::disk('public')->delete($application->resume_path);
        }

        $application->delete();
        return redirect()->back()->with('success', 'Application deleted');
    }

    /**
     * Toggle or set application status.
     */
    public function toggleStatus(Request $request, CareerApplication $application)
    {
        $application->status = $request->has('status') ? (int) $request->input('status') : ($application->status ? 0 : 1);
        $application->save();
        return redirect()->back()->with('success', 'Application status updated');
    }
}
