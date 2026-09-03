<?php

namespace App\Filament\Widgets;

use App\Models\AidRequest;
use App\Models\CollaborationRequest;
use App\Models\JobApplication;
use App\Models\User;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PlatformOverview extends StatsOverviewWidget
{
    use HasWidgetShield;

    protected static ?int $sort = 3;

    protected function getStats(): array
    {
        return [
            Stat::make('Pengguna Terdaftar', User::query()->count())
                ->description('Total akun panel admin/relawan')
                ->descriptionIcon('heroicon-m-users')
                ->color('gray'),

            Stat::make('Permohonan Bantuan', AidRequest::query()->where('status', 'pending')->count())
                ->description('Menunggu peninjauan')
                ->descriptionIcon('heroicon-m-hand-raised')
                ->color('warning'),

            Stat::make('Permintaan Kerjasama', CollaborationRequest::query()->where('status', 'pending')->count())
                ->description('Menunggu peninjauan')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('warning'),

            Stat::make('Lamaran Kerja Baru', JobApplication::query()->where('status', 'pending')->count())
                ->description('Belum ditinjau tim HR')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('info'),
        ];
    }
}
