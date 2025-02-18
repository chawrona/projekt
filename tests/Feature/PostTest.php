<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_all_posts()
    {

        $response = $this->getJson('/api/posts');
        $response->assertStatus(200);
    }

    public function test_store_creates_new_post()
    {
        $data = [
            'title'   => 'Tytuł posta',
            'content' => 'Treść posta.',
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/posts', $data);

        $response->assertStatus(201)
                 ->assertJsonFragment($data);

        $this->assertDatabaseHas('posts', $data);
    }

    public function test_show_returns_post()
    {
        $post = Post::factory()->create();

        $response = $this->getJson("/api/posts/{$post->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'id'      => $post->id,
                     'title'   => $post->title,
                     'content' => $post->content,
        ]);
    }

    public function test_update_modifies_post()
    {
        $post = Post::factory()->create();

        $data = [
            'title'   => 'Zaktualizowany tytuł',
            'content' => 'Zaktualizowana treść.',
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->putJson("/api/posts/{$post->id}", $data);

        $response->assertStatus(200)
                 ->assertJsonFragment($data);

        $this->assertDatabaseHas('posts', array_merge(['id' => $post->id], $data));
    }

    public function test_destroy_deletes_post()
    {
        $post = Post::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->deleteJson("/api/posts/{$post->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}


