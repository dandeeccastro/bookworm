<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    public function testBookAdding() {
			$book = [
				'title' => 'Test Book',
				'description' => 'This is a dummy book for testing purposes',
				'author_id' => null,
				'publisher_id' => null
			];
			$this->json('POST','/api/book', $book )->seeJson($book);
    }
}
