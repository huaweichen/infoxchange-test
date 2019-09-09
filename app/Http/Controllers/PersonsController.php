<?php

namespace App\Http\Controllers;

use App\Persons;
use Illuminate\Http\Request;

class PersonsController extends Controller
{
    public function index() {
        $persons = Persons::all();
        return response()->json($persons);
    }
}
