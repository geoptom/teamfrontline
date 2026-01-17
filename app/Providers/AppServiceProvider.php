<?php
namespace App\Providers;

use App\Models\Category;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Solution;
use Cache;
use Config;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        /**
         * ================================
         * LOAD SETTINGS (CACHED FOREVER)
         * ================================
         */
        if (Schema::hasTable('settings')) {
            $settings = Cache::rememberForever('settings', function () {
                return Setting::where('status', 1)
                    ->get()
                    ->groupBy('group')
                    ->map(fn($items) => $items->pluck('value', 'key')->toArray())
                    ->toArray();
            });
        } else {
            $settings = [];
        }

        // Ensure default currency
        $settings['general']['currency_icon'] = $settings['general']['currency_icon'] ?? '₹';

        // Set timezone
        Config::set('app.timezone', $settings['general']['time_zone'] ?? 'UTC');

        /**
         * ================================
         * MAIL CONFIG
         * ================================
         */
        $mail = $settings['mail'] ?? [];
        Config::set('mail.mailers.smtp.host', $mail['mail_host'] ?? 'smtp.mailtrap.io');
        Config::set('mail.mailers.smtp.port', $mail['mail_port'] ?? 2525);
        Config::set('mail.mailers.smtp.encryption', $mail['mail_encryption'] ?? null);
        Config::set('mail.mailers.smtp.username', $mail['mail_username'] ?? null);
        Config::set('mail.mailers.smtp.password', $mail['mail_password'] ?? null);
        Config::set('mail.from.address', $mail['mail_from_address'] ?? 'no-reply@example.com');
        Config::set('mail.from.name', $mail['mail_from_name'] ?? 'Team Frontline');

        /**
         * ================================
         * PUSHER CONFIG
         * ================================
         */
        $pusher = $settings['pusher'] ?? [];
        Config::set('broadcasting.connections.pusher.key', $pusher['pusher_key'] ?? 'your_key');
        Config::set('broadcasting.connections.pusher.secret', $pusher['pusher_secret'] ?? 'your_secret');
        Config::set('broadcasting.connections.pusher.app_id', $pusher['pusher_app_id'] ?? 'your_app_id');
        Config::set('broadcasting.connections.pusher.options.cluster', $pusher['pusher_cluster'] ?? 'ap2');
        Config::set('broadcasting.connections.pusher.options.host', "api-" . ($pusher['pusher_cluster'] ?? 'ap2') . ".pusher.com");

        /**
         * ================================
         * MAKE ALL SETTINGS AVAILABLE
         * ================================
         */
        View::composer('*', function ($view) use ($settings, $pusher) {
            $view->with([
                'settings'      => $settings,
                'pusherSetting' => $pusher,
            ]);
        });

        /**
         * FOOTER DATA (decode JSON once, globally)
         */
        View::composer('frontend.layouts.footer', function ($view) use ($settings) {

            $footer = $settings['footer'] ?? [];

            $view->with([
                'footer_about'   => $footer['about'] ?? '',
                'footer_logo'    => $footer['logo'] ?? null,
                'footer_address' => $footer['address'] ?? '',
                'footer_copy'    => $footer['copyright'] ?? '',
                'footer_menu_2'  => json_decode($footer['grid_2_menus'] ?? '[]', true),
                'footer_menu_3'  => json_decode($footer['grid_3_menus'] ?? '[]', true),
                'social_links'   => json_decode($settings['social']['links'] ?? '[]', true),
            ]);
        });

        /**
         * ================================================
         * MENU COMPOSER - ONLY FOR HEADER (PERFORMANCE!)
         * ================================================
         */
        View::composer('frontend.layouts.header', function ($view) {

            // Cache menus for 24 hours
            $menu_categories = Cache::remember('menu_categories', 86400, function () {
                return Category::where('status', 1)
                    ->whereNull('parent_id')
                    ->with('children')
                    ->orderBy('name')
                    ->get();
            });

            $menu_services = Cache::remember('menu_services', 86400, function () {
                return Service::where('status', 1)
                    ->orderBy('title')
                    ->get();
            });

            $menu_solutions = Cache::remember('menu_solutions', 86400, function () {
                return Solution::where('status', 1)
                    ->orderBy('title')
                    ->get();
            });

            $view->with([
                'menu_categories' => $menu_categories,
                'menu_services'   => $menu_services,
                'menu_solutions'  => $menu_solutions,
            ]);
        });
    }
}
