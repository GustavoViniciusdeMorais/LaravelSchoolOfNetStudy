<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $expected = ['title' => 'ET EOS CUMQUE MOLESTIAS SIT MINIMA.'];

        // the dump function shows the code error at console.
        // the assertJsonFragment allows you to build a more flexible test.

        $this->get(route('products.show', 1), $data)
            ->dump()
            ->assertStatus(201)
            ->assertJsonFragment($expected);
    }
}
