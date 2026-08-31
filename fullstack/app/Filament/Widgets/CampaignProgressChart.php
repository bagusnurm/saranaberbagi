<?php

namespace App\Filament\Widgets;

use App\Models\Campaign;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Str;

class CampaignProgressChart extends ChartWidget
{
    use HasWidgetShield;

    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        $campaigns = Campaign::query()
            ->where('status', 'active')
            ->orderByDesc('collected_amount')
            ->limit(5)
            ->get(['title', 'target_amount', 'collected_amount']);

        return [
            'datasets' => [
                [
                    'label' => 'Terkumpul (%)',
                    'data' => $campaigns->map(function (Campaign $campaign): float {
                        $target = (float) $campaign->target_amount;

                        return $target > 0
                            ? round(((float) $campaign->collected_amount / $target) * 100, 1)
                            : 0;
                    })->toArray(),
                    'backgroundColor' => '#0d9488',
                ],
            ],
            'labels' => $campaigns->map(fn (Campaign $campaign) => Str::limit($campaign->title, 20))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => ['beginAtZero' => true, 'max' => 100],
            ],
        ];
    }
}
