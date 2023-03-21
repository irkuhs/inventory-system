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

    public function index()
    {
        $inventoryTypes = Type::all();
        return view('type.index', compact('inventoryTypes'));
    }

    public function store(Request $request)
    {
        Type::create(
            [
                'name'=> $request-> name
            ]
            );

        return to_route("type.index");
    }
}
