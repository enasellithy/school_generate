<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use DatabaseMigrations;

    public function test_add_or_edit_all_student_validation()
    {
        $response = $this->json('POST', 'api/student', ['Accept' => 'application/json']);
        $response->assertStatus(200);
        $response->assertJson([
            "message" => "error",
            "data" => [
                "name" => [
                    "The name field is required.",
                ],
                'school_id' => [
                    "The school id field is required."
                ],
            ]
        ]);
    }
}
