<?php

namespace App\Filament\Resources\AidRequests\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AidRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('applicant_name')
                    ->label('Nama Pemohon')
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label('Nomor WhatsApp / HP')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                TextInput::make('aid_type')
                    ->label('Jenis Bantuan')
                    ->placeholder('Misal: Kesehatan, Sembako, Pendidikan')
                    ->required()
                    ->maxLength(255),
                Select::make('status')
                    ->label('Status Pengajuan')
                    ->options([
                        'pending' => 'Pending (Menunggu Verifikasi)',
                        'verified' => 'Verified (Disetujui / Terverifikasi)',
                        'rejected' => 'Rejected (Ditolak)',
                        'disbursed' => 'Disbursed (Bantuan Disalurkan)',
                    ])
                    ->default('pending')
                    ->required(),
                FileUpload::make('supporting_document')
                    ->label('Dokumen / Berkas Pendukung (KTP/SKTM/Foto/Surat Medis)')
                    ->disk('public')
                    ->directory('aid-requests/documents')
                    ->openable()
                    ->downloadable()
                    ->columnSpanFull(),
                Textarea::make('address')
                    ->label('Alamat Lengkap Pemohon')
                    ->rows(3)
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->label('Deskripsi & Rincian Kebutuhan Bantuan')
                    ->rows(4)
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('admin_note')
                    ->label('Catatan Admin / Verifikator')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}
