<?php

namespace Tests\Feature;

use App\Models\Feedback;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    use RefreshDatabase;

    public function testCreate(): void
    {
        $response = $this->get(route('feedback.create'));

        $response->assertOk();
    }

    public function testStore(): void
    {
        $body = Feedback::factory()->make()->toArray();

        $response = $this->post(route('feedback.store'), ['feedback' => $body]);

        $response->assertRedirect();

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('feedback', $body);
    }
}
