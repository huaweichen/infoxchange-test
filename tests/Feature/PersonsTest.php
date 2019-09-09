<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PersonsTest extends TestCase
{

    /**
     * @test
     */
    public function testGetAListOfPersonsFromDB()
    {
        $response = $this->get('/api/persons');

        $response->assertStatus(200);
    }
}
