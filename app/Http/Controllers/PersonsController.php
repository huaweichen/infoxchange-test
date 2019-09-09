<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonsResource;
use App\Persons;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
    public function store()
    {
        $person = Persons::create($this->validateData());
        return (new PersonsResource($person))->response()->setStatusCode(Response::HTTP_CREATED);
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
            'age' => 'required',
        ]);
    }
}
