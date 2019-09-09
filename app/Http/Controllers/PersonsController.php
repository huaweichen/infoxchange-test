<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonsResource;
use App\Persons;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class PersonsController
 * @package App\Http\Controllers
 */
class PersonsController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $persons = Persons::all();
        return PersonsResource::collection($persons)->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @return JsonResponse
     */
    public function store(): JsonResponse
    {
        $person = Persons::create($this->validateData());
        return (new PersonsResource($person))->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @param Persons $person
     * @return JsonResponse
     */
    public function update(Persons $person): JsonResponse
    {
        $person->update($this->validateData());
        return (new PersonsResource($person))->response()->setStatusCode(Response::HTTP_OK);
    }

    /**
     * @param Persons $person
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Persons $person): JsonResponse
    {
        $person->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    /**
     * Helper function for validate data and return the data.
     * @return array
     */
    private function validateData(): array
    {
        return request()->validate([
            'name' => 'required|max:255',
            'gender' => 'required|in:male,female',
            'age' => 'required|integer',
        ]);
    }
}
