<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CountryController extends Controller
{
    public function index():View
    {
        $users = User::whereHas('companies.country', function ($query){
            $query->where('countries.name', 'Canada');
        })->with('companies')->get();
        return view('test', ['users' => $users]);
    }
}
