<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Counts;

class CounterTest extends TestCase
{
    use DatabaseTransactions;
    private const HTTP_REQUEST_METHOD = 'POST';
    private const END_POINT = '/api/insertCount';

    /**
     * setup
     */
    public function setUp(): void
    {
        parent::setUp();
        Counts::query()->delete();
    }

    /**
     * A insert count test example.
     *
     * @return void
     */
    public function test_insert_count()
    {
        $this->withoutExceptionHandling();

        $payload = [
            'counts' => 1
        ];

        $response = $this->json(
            self::HTTP_REQUEST_METHOD,
            self::END_POINT,
            $payload
        );

        $response->assertOk()->assertExactJson([
            'message' => 'success'
        ]);
    }
}
