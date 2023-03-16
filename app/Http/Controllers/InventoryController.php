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

    public function edit(Inventori $inventory)
    {
        return view('inventori.update', compact('inventory'));
    }

    public function update(Request $request, Inventori $inventory)
    {
        $inventory->update([
            'user_id'=> $inventory->user_id,
            'name'=> $request->name,
            'description' => $request ->description
        ]);

        return redirect()->route("home");
    }

    public function delete(Inventori $inventory)
    {
        $inventory->delete();

        return redirect()->route("home");
    }

}
