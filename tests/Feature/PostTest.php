<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    // create post
    public function testCreate()
    {
        $this->withoutExceptionHandling();
        $response = $this->json('POST',route('posts.store'), $this->valid_data());
        $response->assertStatus(201);
        $this->assertCount(1, \App\Post::all());
    }

    public function testValidation()
    {
        // $this->withoutExceptionHandling();
        $response = $this->json('POST',route('posts.store'), $this->invalid_data());
        $response->assertStatus(422);
        // $response->assertSessionHasErrors('title');
        $this->assertCount(0, \App\Post::all());
    }

    private function valid_data() {
        return [
            'title' => 'Jollof Rice',
            'body' => 'Parboil rice, get pepper and mix, and some spice and serve!'
        ];
    }

    private function invalid_data() {
        return [
            'title' => null,
            'body' => 'Parboil rice, get pepper and mix, and some spice and serve!'
        ];
    }
}
