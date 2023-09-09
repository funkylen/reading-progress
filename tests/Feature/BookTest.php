<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    /** @var Collection|Book[] */
    private Collection $books;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->books = Book::factory()->count(5)->for($this->user)->create();

        $this->actingAs($this->user);
    }

    public static function pagesProvider(): array
    {
        return [
            ['books.index', false],
            ['books.finished', false],
            ['books.create', false],
            ['books.edit', true],
            ['books.show', true],
        ];
    }

    /**
     * @dataProvider pagesProvider
     */
    public function testShowPage(string $routeName, bool $needModel): void
    {
        $route = $needModel ? route($routeName, $this->books->first()) : route($routeName);

        $response = $this->get($route);

        $response->assertOk();
    }

    public function testStore(): void
    {
        $body = [
            'book' => [
                'title' => 'Book Title',
                'author' => 'Book Author',
                'start_page' => 0,
                'pages_count' => 225,
            ],
        ];

        $response = $this->post(route('books.store'), $body);

        $response->assertRedirect();

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('books', [
            ...$body['book'],
            'user_id' => $this->user->id,
        ]);
    }

    public function testUpdate(): void
    {
        $book = $this->books->first();

        $body = [
            'book' => [
                'title' => 'Book Title',
                'author' => 'Book Author',
                'pages_count' => 1,
            ],
        ];

        $response = $this->put(route('books.update', $book), $body);

        $response->assertRedirect();

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('books', [
            ...$body['book'],
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
