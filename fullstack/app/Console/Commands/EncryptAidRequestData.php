<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class EncryptAidRequestData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'aid-requests:encrypt-existing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enkripsi data sensitif (nik, kk_number, bank_account_number) yang masih plaintext di aid_requests';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $records = DB::table('aid_requests')->get();
        $this->info("Memeriksa {$records->count()} data aid_requests...");

        $encryptedCount = 0;

        foreach ($records as $record) {
            $updates = [];

            foreach (['nik', 'kk_number', 'bank_account_number'] as $column) {
                $value = $record->{$column};

                if (! empty($value)) {
                    // Cek apakah data sudah dalam format terenkripsi
                    $isEncrypted = false;
                    try {
                        Crypt::decryptString($value);
                        $isEncrypted = true;
                    } catch (DecryptException) {
                        $isEncrypted = false;
                    }

                    if (! $isEncrypted) {
                        $updates[$column] = Crypt::encryptString($value);
                    }
                }
            }

            if (! empty($updates)) {
                DB::table('aid_requests')
                    ->where('id', $record->id)
                    ->update($updates);
                $encryptedCount++;
            }
        }

        $this->info("Berhasil mengenkripsi {$encryptedCount} record.");

        return Command::SUCCESS;
    }
}
