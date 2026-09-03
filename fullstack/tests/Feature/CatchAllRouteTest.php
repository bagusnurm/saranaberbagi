<?php

namespace Tests\Feature;

use Tests\TestCase;

class CatchAllRouteTest extends TestCase
{
    public function test_unknown_url_returns_404(): void
    {
        $response = $this->get('/asdf123');

        $response->assertStatus(404);
    }

    public function test_deep_unknown_url_returns_404(): void
    {
        $response = $this->get('/some/nested/non-existent/path');

        $response->assertStatus(404);
    }

    public function test_home_page_still_returns_200(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
