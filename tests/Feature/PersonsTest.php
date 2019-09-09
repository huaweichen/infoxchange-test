<?php

namespace Tests\Feature;

use App\Persons;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PersonsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function testGetAListOfPersonsFromDB()
    {
        $person1 = factory(Persons::class)->create();
        $person2 = factory(Persons::class)->create();

        $response = $this->get('/api/persons');

        $response->assertStatus(200);
        // Two persons created.
        $response->assertJsonStructure([
            'data' => [
                [
                    'name', 'gender'
                ], [
                    'name', 'gender'
                ],
            ],
        ]);
    }

    /**
     * @test
     */
    public function testSaveASinglePersonIntoDB()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/api/persons', $this->data());
        $person = Persons::first();
        $this->assertEquals('Hello Dude', $person->name);
        $this->assertEquals('male', $person->gender);
        $this->assertEquals('50', $person->age);
        $response->assertStatus(Response::HTTP_CREATED);
    }

    private function data()
    {
        return [
            'name' => 'Hello Dude',
            'gender' => 'male',
            'age' => 50,
        ];
    }
}
