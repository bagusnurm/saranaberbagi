<?php

namespace App\Filament\Resources\CollaborationRequests\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CollaborationRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('institution_name')
                    ->label('Nama Instansi / Komunitas / Perusahaan')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Email Korespondensi')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label('No. Telepon / WhatsApp PIC')
                    ->tel()
                    ->maxLength(255),
                TextInput::make('collaboration_type')
                    ->label('Bentuk Kolaborasi')
                    ->placeholder('Misal: Program CSR, Mitra Penyaluran, Event Bersama')
                    ->required()
                    ->maxLength(255),
                Select::make('status')
                    ->label('Status Proposal')
                    ->options([
                        'pending' => 'Pending (Menunggu Review)',
                        'reviewed' => 'Reviewed (Sedang Ditinjau)',
                        'approved' => 'Approved (Disetujui / Deal)',
                        'rejected' => 'Rejected (Ditolak)',
                    ])
                    ->default('pending')
                    ->required(),
                FileUpload::make('attachment')
                    ->label('Dokumen / Proposal Kerjasama (PDF/Doc)')
                    ->disk('public')
                    ->directory('collaborations/proposals')
                    ->openable()
                    ->downloadable()
                    ->columnSpanFull(),
                Textarea::make('proposal_description')
                    ->label('Rincian Rencana & Tujuan Kerjasama')
                    ->rows(4)
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('admin_note')
                    ->label('Catatan Tim Kemitraan')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}
