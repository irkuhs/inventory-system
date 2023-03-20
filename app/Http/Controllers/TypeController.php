<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function create()
    {
        return view('type.create');
    }

    public function store(Request $request)
    {
        Type::create(
            [
                'name'=> $request-> name
            ]
            );

        return to_route("home");
    }
}
