<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class VueController for handling all Vue incoming web requests.
 * @package App\Http\Controllers
 */
class VueController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
