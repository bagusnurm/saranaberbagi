<?php

namespace App\Filament\Widgets;

use App\Models\Campaign;
use App\Models\Donation;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CampaignOverview extends StatsOverviewWidget
{
    use HasWidgetShield;

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $activeCampaigns = Campaign::query()->where('status', 'active');
        $totalTarget = (float) $activeCampaigns->sum('target_amount');
        $totalCollected = (float) $activeCampaigns->sum('collected_amount');
        $progress = $totalTarget > 0 ? round($totalCollected / $totalTarget * 100) : 0;

        $pendingDonations = Donation::query()->where('status', 'pending')->count();

        $verifiedThisMonth = (float) Donation::query()
            ->where('status', 'verified')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('amount');

        return [
            Stat::make('Program Aktif', $activeCampaigns->count())
                ->description('Total program donasi yang sedang berjalan')
                ->descriptionIcon('heroicon-m-heart')
                ->color('info'),

            Stat::make('Dana Terkumpul (Aktif)', 'Rp ' . number_format($totalCollected, 0, ',', '.'))
                ->description("{$progress}% dari target Rp " . number_format($totalTarget, 0, ',', '.'))
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('Menunggu Verifikasi', $pendingDonations)
                ->description($pendingDonations > 0 ? 'Perlu ditindaklanjuti segera' : 'Semua donasi sudah diverifikasi')
                ->descriptionIcon('heroicon-m-clock')
                ->color($pendingDonations > 0 ? 'warning' : 'success'),

            Stat::make('Terverifikasi Bulan Ini', 'Rp ' . number_format($verifiedThisMonth, 0, ',', '.'))
                ->description(now()->translatedFormat('F Y'))
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('primary'),
        ];
    }
}
