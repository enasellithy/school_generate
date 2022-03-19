<?php

namespace Tests\Feature;

use App\Models\School;
use App\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SchoolTest extends TestCase
{
    use DatabaseMigrations;

    public function test_admin_can_see_index_schools()
    {
        User::create([
            'email' => 'admin1@mail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ]);
        $response = $this->actingAs(User::findOrFail(1))->get('admin/school');
        $response->assertSee('Create School');
        $response->assertStatus(200);
    }

    public function test_admin_can_see_school_store()
    {
        User::create([
            'email' => 'admin1@mail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ]);
        $response = $this->actingAs(User::findOrFail(1))->post('admin/school',[
            'name' => 'School Test',
        ]);
        $school = School::orderBy('id', 'desc')->first();
        $this->assertEquals('School Test', $school->name);
        $response->assertStatus(302);
    }
}
