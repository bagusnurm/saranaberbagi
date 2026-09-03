<?php

namespace App\Filament\Resources\JobVacancies\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class JobVacanciesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Posisi')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('employment_type')
                    ->label('Tipe')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'fulltime' => 'primary',
                        'parttime' => 'info',
                        'volunteer' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'fulltime' => 'Full-time',
                        'parttime' => 'Part-time',
                        'volunteer' => 'Volunteer',
                        default => $state,
                    }),
                TextColumn::make('location')
                    ->label('Lokasi')
                    ->searchable()
                    ->default('Seluruh Indonesia'),
                TextColumn::make('applications_count')
                    ->label('Pelamar')
                    ->counts('applications')
                    ->badge()
                    ->color('warning')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'open' => 'success',
                        'closed' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'open' => 'Buka',
                        'closed' => 'Tutup',
                        default => $state,
                    }),
                TextColumn::make('deadline')
                    ->label('Deadline')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('employment_type')
                    ->label('Tipe Pekerjaan')
                    ->options([
                        'fulltime' => 'Full-time',
                        'parttime' => 'Part-time',
                        'volunteer' => 'Volunteer',
                    ]),
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'open' => 'Buka',
                        'closed' => 'Tutup',
                    ]),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
