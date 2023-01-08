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
        $body = [
            'feedback' => Feedback::factory()->make()->toArray(),
            'captcha' => 'captcha',
        ];

        $response = $this->post(route('feedback.store'), $body);

        $response->assertRedirect();

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('feedback', $body['feedback']);
    }
}
