<?php

namespace Tests\Feature;

use App\Models\Content;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContentsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function testIndexContents()
    {
        $content = Content::factory()->create();

        $response = $this->json('GET', '/contents');

        $response->assertStatus(200)
            ->assertJsonFragment([
                'title' => $content->title,
            ]);
    }

    /**
     * @return void
     */
    public function testCreateContents()
    {
        $content = Content::factory()->make();

        $response = $this->json('POST', '/contents', [
            'type' => $content->type,
            'title' => $content->title,
            'body' => $content->body,
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment([
                'type' => $content->type,
                'title' => $content->title,
                'body' => $content->body,
            ]);
    }

    /**
     * @return void
     */
    public function testReadContents()
    {
        $content = Content::factory()->create();

        $response = $this->json('GET', "/contents/{$content->id}");

        $response->assertStatus(200)
            ->assertJsonFragment([
                'title' => $content->title,
            ]);
    }

    /**
     * @return void
     */
    public function testUpdateContents()
    {
        $content = Content::factory()->create();
        $sample = Content::factory()->make();

        $response = $this->json('PUT', "/contents/{$content->id}", [
            'title' => $sample->title,
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'title' => $sample->title,
            ]);
    }

    /**
     * @return void
     */
    public function testDeleteContents()
    {
        $content = Content::factory()->create();

        $response = $this->json('DELETE', "/contents/{$content->id}");

        $response->assertStatus(204);
    }
}
