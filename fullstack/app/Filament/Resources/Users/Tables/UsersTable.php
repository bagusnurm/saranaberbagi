<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->color('gray')
                    ->description(fn ($record): string => $record->email)
                    ->icon('heroicon-m-user')
                    ->iconColor('gray'),

                TextColumn::make('roles.name')
                    ->label('Peran (Role)')
                    ->badge()
                    ->color('primary'),

                TextColumn::make('created_at')
                    ->label('Terdaftar')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->filters([
                //
            ])

            ->recordActions([
                ActionGroup::make([
                    EditAction::make()
                        ->label('Edit')
                        ->tooltip('Edit User'),
                    DeleteAction::make()
                        ->label('Hapus')
                        ->tooltip('Hapus User')
                        ->requiresConfirmation(),
                    ViewAction::make()
                        ->label('Lihat')
                        ->tooltip('Lihat User'),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Hapus')
                        ->icon('heroicon-o-trash'),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
