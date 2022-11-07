<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class CourseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $data = [
            'uuid' => Str::uuid()->toString(),
            'name' => 'test66',
            'description' => 'test66'
        ];

        $expected = [
            'data' => [
                'name' => 'test66',
                'description' => 'test66'
            ]
        ];

        $this->post('api/courses', $data)
            ->assertJson($expected);
    }
}
