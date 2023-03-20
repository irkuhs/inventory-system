<?php

namespace App\Http\Controllers;

use App\Models\Inventori;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInventoryRequest;

class InventoryController extends Controller
{
    public function create()
    {
        $inventoryTypes = Type::all();
        return view('inventory.create', compact('inventoryTypes'));
    }

    public function store(StoreInventoryRequest $request)
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

    public function search(Request $request)
    {
        if($request->keyword){
            $inventories = Inventori::query()
                        ->where('user_id',  auth()->user()->id)
                        ->where('name','LIKE','%'.$request->keyword.'%')
                        ->paginate(3);
        }else{
            $inventories = auth()->user()->inventories()->paginate(5);
        }
        return view('home',compact('inventories'));
    }
}
