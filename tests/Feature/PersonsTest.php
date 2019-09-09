<?php

namespace Tests\Feature;

use App\Persons;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PersonsTest extends TestCase
{

    /**
     * @test
     */
    public function testGetAListOfPersonsFromDB()
    {
        $this->withoutExceptionHandling();

        $person1 = factory(Persons::class)->create();
        $person2 = factory(Persons::class)->create();

        $response = $this->get('/api/persons');

        $response->assertStatus(200);
        $response->assertJsonCount(2);
    }
}
