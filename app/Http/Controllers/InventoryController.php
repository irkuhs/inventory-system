<?php

namespace App\Http\Controllers;

use App\Models\Inventori;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function create()
    {
        return view('inventori.create');
    }

    public function store(Request $request)
    {
        Inventori::create(
            [
                'user_id'=> auth() -> user() -> id,
                'name'=> $request-> name,
                'description' => $request -> description
            ]
            );

        return to_route("home");
    }

}
