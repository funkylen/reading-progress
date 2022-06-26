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
        $this->book = Book::factory()->for($this->user)->create();
        $this->logs = ReadLog::factory()->for($this->book)->count(3)->create([
            'date' => now()->format('d-m-Y'),
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

    public function testUpdate(): void
    {
        $log = $this->logs->first();

        $body = [
            'read_log' => [
                'pages_count' => 225,
                'date' => now()->format('d-m-Y'),
            ],
        ];

        $response = $this->put(route('books.read_logs.update', ['book' => $this->book, 'read_log' => $log]), $body);

        $response->assertRedirect();

        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('read_logs', [
            ...$body['read_log'],
            'id' => $log->id,
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
}
