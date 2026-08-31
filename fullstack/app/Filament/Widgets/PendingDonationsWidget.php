<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Donations\DonationResource;
use App\Models\Donation as ModelsDonation;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Donation;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class PendingDonationsWidget extends TableWidget
{
    use HasWidgetShield;

    protected static ?int $sort = 2;

    protected static ?string $heading = 'Donasi Menunggu Verifikasi';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                ModelsDonation::query()->where('status', 'pending')->latest()->limit(10)
            )
            ->columns([
                TextColumn::make('invoice_number')
                    ->label('Invoice')
                    ->weight('bold'),
                TextColumn::make('donor_name')
                    ->label('Donatur')
                    ->description(fn (ModelsDonation $record): ?string => $record->is_anonymous ? 'Fulan' : null),
                TextColumn::make('campaign.title')
                    ->label('Program')
                    ->default('Donasi Umum')
                    ->limit(25),
                TextColumn::make('amount')
                    ->label('Nominal')
                    ->money('IDR', locale: 'id')
                    ->weight('bold'),
                TextColumn::make('created_at')
                    ->label('Masuk')
                    ->since(),
            ])
            ->recordActions([
                Action::make('verify')
                    ->label('Verifikasi')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->url(fn (ModelsDonation $record): string => DonationResource::getUrl('view', ['record' => $record])),
            ])
            ->paginated();
    }
}
