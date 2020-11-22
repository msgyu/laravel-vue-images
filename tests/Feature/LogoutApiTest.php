<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::SetUp();

        $this->user = factory(User::class)->create();
    }

    public function should_user_logout()
    {
        $response = $this->actingAs($this->user)
            ->json('POST', route('logout'));
        $response->assertStatus(200);
        $this->assertGuest();
    }
}
