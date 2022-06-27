<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\ReadLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReadLogTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private Book $book;
    private Collection $logs;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        $this->book = Book::factory()->for($this->user)->create([
            'pages_count' => 300,
            'start_page' => 0,
        ]);

        $this->logs = ReadLog::factory()->for($this->book)->count(3)->create([
            'date' => now()->format('d-m-Y'),
            'pages_count' => 10,
        ]);

        $this->actingAs($this->user);
    }


    public function pagesProvider(): array
    {
        return [
            ['books.read_logs.create', false],
            ['books.read_logs.edit', true],
        ];
    }

    /**
     * @dataProvider pagesProvider
     */
    public function testShowPage(string $routeName, bool $needModel): void
    {
        $route = $needModel
            ? route($routeName, ['book' => $this->book, 'read_log' => $this->logs->first()])
            : route($routeName, ['book' => $this->book]);

        $response = $this->get($route);

        $response->assertOk();
    }

    public function testStore(): void
    {
        $body = [
            'read_log' => [
                'pages_count' => 225,
                'date' => now()->format('d-m-Y'),
            ],
        ];

        $response = $this->post(route('books.read_logs.store', $this->book), $body);

        $response->assertRedirect();

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('read_logs', [
            ...$body['read_log'],
        ]);
    }

    public function testStoreAndFinishBook(): void
    {
        $body = [
            'read_log' => [
                'pages_count' => $this->book->pages_count - $this->logs->sum('pages_count'),
                'date' => now()->format('d-m-Y'),
            ],
        ];

        $response = $this->post(route('books.read_logs.store', $this->book), $body);

        $response->assertRedirect();

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('read_logs', [
            ...$body['read_log'],
        ]);

        $this->assertDatabaseHas('books', [
            'id' => $this->book->id,
            'is_finished' => true,
        ]);
    }

    public function testUpdate(): void
    {
        $log = $this->logs->first();

        $body = [
            'read_log' => [
                'pages_count' => 225,
                'date' => now()->format('d-m-Y'),
            ],
        ];

        $response = $this->put(route('books.read_logs.update', [$this->book, $log]), $body);

        $response->assertRedirect();

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('read_logs', [
            ...$body['read_log'],
            'id' => $log->id,
        ]);
    }

    public function testUpdateAndFinishBook(): void
    {
        $book = Book::factory()->create(['pages_count' => 10, 'is_finished' => false]);
        $readLog = ReadLog::factory()->for($book)->create(['pages_count' => 9]);

        $body = [
            'read_log' => [
                'pages_count' => $book->pages_count,
                'date' => now()->format('d-m-Y'),
            ],
        ];

        $response = $this->put(route('books.read_logs.update', [$book, $readLog]), $body);

        $response->assertRedirect();

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('read_logs', [
            ...$body['read_log'],
            'id' => $readLog->id,
        ]);

        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'is_finished' => true,
        ]);
    }

    public function testUpdateAndUnFinishBook(): void
    {
        $book = Book::factory()->create(['pages_count' => 10, 'is_finished' => true]);
        $readLog = ReadLog::factory()->for($book)->create(['pages_count' => 10]);

        $body = [
            'read_log' => [
                'pages_count' => 5,
                'date' => now()->format('d-m-Y'),
            ],
        ];

        $response = $this->put(route('books.read_logs.update', [$book, $readLog]), $body);

        $response->assertRedirect();

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('read_logs', [
            ...$body['read_log'],
            'id' => $readLog->id,
        ]);

        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'is_finished' => false,
        ]);
    }

    public function testDestroy(): void
    {
        $log = $this->logs->first();

        $response = $this->delete(route('books.read_logs.destroy', ['book' => $this->book, 'read_log' => $log]));

        $response->assertRedirect();

        $response->assertSessionHasNoErrors();

        $this->assertSoftDeleted('read_logs', ['id' => $log->id]);
    }

    public function testDestroyAndUnfinishBook(): void
    {
        $book = Book::factory()->create(['pages_count' => 10, 'is_finished' => true]);
        $readLog = ReadLog::factory()->for($book)->create(['pages_count' => 10]);

        $response = $this->delete(route('books.read_logs.destroy', [$book, $readLog]));

        $response->assertRedirect();

        $response->assertSessionHasNoErrors();

        $this->assertSoftDeleted('read_logs', ['id' => $readLog->id]);

        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'is_finished' => false,
        ]);
    }
}
