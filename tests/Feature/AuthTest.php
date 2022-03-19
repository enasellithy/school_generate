<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use DatabaseMigrations;
    use Authenticatable;

    public function test_login_redirect_done()
    {
        $user = User::create([
            'email' => 'admin@mail.com',
            'password' => '123456',
            'role' => 'admin'
        ]);
        $response = $this->post('/admin/login',['email' => 'admin@mail.com', 'password' => '123456']);
        $response->assertStatus(302);
        $response->assertRedirect('/admin');
    }

    public function test_logout_redirect_done()
    {
        $user = User::create([
            'email' => 'admin@mail.com',
            'password' => '123456',
            'role' => 'admin'
        ]);
        $response = $this->get('/admin/logout',['email' => 'admin@mail.com', 'password' => '123456']);
        $response->assertStatus(302);
        $response->assertRedirect('/admin/login');
    }
}
