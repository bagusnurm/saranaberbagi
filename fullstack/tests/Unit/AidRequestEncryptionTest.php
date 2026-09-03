<?php

namespace Tests\Unit;

use App\Models\AidRequest;
use Tests\TestCase;

class AidRequestEncryptionTest extends TestCase
{
    public function test_sensitive_attributes_have_encrypted_casts(): void
    {
        $model = new AidRequest;
        $casts = $model->getCasts();

        $this->assertArrayHasKey('nik', $casts);
        $this->assertEquals('encrypted', $casts['nik']);

        $this->assertArrayHasKey('kk_number', $casts);
        $this->assertEquals('encrypted', $casts['kk_number']);

        $this->assertArrayHasKey('bank_account_number', $casts);
        $this->assertEquals('encrypted', $casts['bank_account_number']);
    }
}
