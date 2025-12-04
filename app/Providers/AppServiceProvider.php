<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\GdImageBackEnd;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Paksa QR Code memakai GD (bukan imagick)
        $this->app->bind('qrCode', function () {
            return new BaconQrCodeGenerator(
                new ImageRenderer(
                    new RendererStyle(300),
                    new GdImageBackEnd() // <-- Ini wajib!
                )
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $now = Carbon::now();

        // Total pengunjung (IP unik)
        $totalVisitors = Visitor::distinct('ip_address')->count('ip_address');

        // Pengunjung online (aktif 5 menit terakhir)
        $onlineVisitors = Visitor::where('last_activity', '>=', $now->copy()->subMinutes(5))->count();

        // Pengunjung hari ini
        $visitorsToday = Visitor::whereDate('last_activity', $now->toDateString())
            ->distinct('ip_address')
            ->count('ip_address');

        view()->composer('layouts.admin', function ($view) {
            $view->with('notifications', auth()->check() ? auth()->user()->unreadNotifications : collect());
        });
        // Total penayangan (total semua record di tabel visitors)
        $totalViews = Visitor::count();

        // Penayangan hari ini
        $viewsToday = Visitor::whereDate('last_activity', $now->toDateString())->count();

        // Bagikan ke semua view
        View::share([
            'totalVisitors' => $totalVisitors,
            'totalViews' => $totalViews,
            'onlineVisitors' => $onlineVisitors,
            'visitorsToday' => $visitorsToday,
            'viewsToday' => $viewsToday,
        ]);
    }
}
