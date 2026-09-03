<?php

namespace App\Filament\Resources\JobApplications\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class JobApplicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('job_vacancy_id')
                    ->label('Posisi Lowongan')
                    ->relationship('vacancy', 'title')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('applicant_name')
                    ->label('Nama Pelamar')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label('No. Telepon / WhatsApp')
                    ->tel()
                    ->maxLength(255),
                FileUpload::make('cv_file')
                    ->label('Berkas CV / Resume')
                    ->disk('public')
                    ->directory('applications/cv')
                    ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                    ->openable()
                    ->downloadable()
                    ->required(),
                Select::make('status')
                    ->label('Status Lamaran')
                    ->options([
                        'pending' => 'Pending (Menunggu)',
                        'review' => 'Review (Sedang Ditinjau)',
                        'interview' => 'Interview (Wawancara)',
                        'accepted' => 'Accepted (Diterima)',
                        'rejected' => 'Rejected (Ditolak)',
                    ])
                    ->default('pending')
                    ->required(),
                Textarea::make('cover_letter')
                    ->label('Surat Lamaran / Cover Letter')
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }
}
