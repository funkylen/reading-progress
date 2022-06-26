<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReadLog>
 */
class ReadLogFactory extends Factory
{
    public function definition(): array
    {
        return [
            'book_id' => fn () => Book::factory()->create(),
            'pages_count' => 10,
            'date' => now(),
        ];
    }
}
