<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index()
    {
        return view('pages.index');
    }


    public function create()
    {
        return view('pages.create');
    }

    public function edit(string $id)
    {
        return view('pages.edit',compact('id'));
    }


    public function destroy(string $id)
    {
        Movie::find($id)->delete();
        return redirect(route('movie.index'));
    }
}
