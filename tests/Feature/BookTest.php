<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    private Collection $books;

    protected function setUp(): void
    {
        parent::setUp();

        $this->books = Book::factory()->count(5)->create();
    }

    public function testIndex(): void
    {
        $response = $this->get(route('books.index'));

        $response->assertOk();
    }

    public function testCreate(): void
    {
        $response = $this->get(route('books.create'));

        $response->assertOk();
    }

    public function testEdit(): void
    {
        $response = $this->get(route('books.edit', $this->books->first()));

        $response->assertOk();
    }

    public function testShow(): void
    {
        $response = $this->get(route('books.show', $this->books->first()));

        $response->assertOk();
    }

    public function testStore(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $body = [
            'title' => 'Book Title',
            'author' => 'Book Author',
            'start_page' => 0,
        ];

        $response = $this->post(route('books.store'), $body);

        $response->assertRedirect();

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('books', [
            ...$body,
            'user_id' => $user->id,
        ]);
    }
}
