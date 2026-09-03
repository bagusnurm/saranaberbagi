<?php

namespace Tests\Feature;

use Tests\TestCase;

class RateLimitingTest extends TestCase
{
    public function test_donasi_konfirmasi_route_is_rate_limited(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $response = $this->post('/donasi/konfirmasi');
            // Request 1-5 will pass throttle (could return 302 validation error / etc, but NOT 429)
            $this->assertNotEquals(429, $response->getStatusCode());
        }

        // The 6th request within 1 minute must return HTTP 429 Too Many Requests
        $response = $this->post('/donasi/konfirmasi');
        $response->assertStatus(429);
    }

    public function test_kolaborasi_ajukan_route_is_rate_limited(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $response = $this->post('/kolaborasi/ajukan');
            $this->assertNotEquals(429, $response->getStatusCode());
        }

        $response = $this->post('/kolaborasi/ajukan');
        $response->assertStatus(429);
    }

    public function test_karir_apply_route_is_rate_limited(): void
    {
        for ($i = 0; $i < 5; $i++) {
            $response = $this->post('/karir/apply');
            $this->assertNotEquals(429, $response->getStatusCode());
        }

        $response = $this->post('/karir/apply');
        $response->assertStatus(429);
    }
}
