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
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->books = Book::factory()->count(5)->for($this->user)->create();

        $this->actingAs($this->user);
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
            'user_id' => $this->user->id,
        ]);
    }

    public function testUpdate(): void
    {
        $book = $this->books->first();

        $body = [
            'title' => 'Book Title',
            'author' => 'Book Author',
            'start_page' => 0,
        ];

        $response = $this->put(route('books.update', $book), $body);

        $response->assertRedirect();

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('books', [
            ...$body,
            'id' => $book->id,
            'user_id' => $this->user->id,
        ]);
    }

    public function testDestroy(): void
    {
        $book = $this->books->first();

        $response = $this->delete(route('books.destroy', $book));

        $response->assertRedirect();

        $response->assertSessionHasNoErrors();

        $this->assertSoftDeleted('books', ['id' => $book->id]);
    }
}
