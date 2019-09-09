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
        $response = $this->post('/api/persons', $this->data());
        $person = Persons::first();
        $this->assertEquals('Hello Dude', $person->name);
        $this->assertEquals('male', $person->gender);
        $this->assertEquals('50', $person->age);
        $response->assertStatus(Response::HTTP_CREATED);
    }

    /**
     * @test
     */
    public function testUpdateAnExisingPersonInDB()
    {
        $person = factory(Persons::class)->create();
        $response = $this->patch('/api/persons/' . $person->id, $this->data());
        $person = $person->fresh();
        $this->assertEquals('Hello Dude', $person->name);
        $this->assertEquals('male', $person->gender);
        $this->assertEquals('50', $person->age);
        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function testDeleteAnExistingPersonFromDB()
    {
        $this->withoutExceptionHandling();

        $person = factory(Persons::class)->create();
        $response = $this->delete('/api/persons/'.$person->id);
        $this->assertCount(0, Persons::all());
        $response->assertStatus(Response::HTTP_NO_CONTENT);
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
