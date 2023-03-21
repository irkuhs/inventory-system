<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Inventori;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInventoryRequest;

class InventoryController extends Controller
{
    public function create()
    {
        $inventoryTypes = Type::all();
        return view('inventori.create', compact('inventoryTypes'));
    }

    public function store(StoreInventoryRequest $request)
    {
        //dd($request->all());
        Inventori::create(
            [
                'user_id'=> auth() -> user() -> id,
                'name'=> $request-> name,
                'description' => $request -> description,
                'inventory_type_id' => $request->inventory_type_id
            ]
            );

        return to_route("home");
    }

    public function edit(Inventori $inventory)
    {
        $inventoryTypes=Type::all();
        return view('inventori.update', compact('inventory','inventoryTypes'));
    }

    public function update(Request $request, Inventori $inventory)
    {
        $inventory->update([
            'user_id'=> $inventory->user_id,
            'name'=> $request->name,
            'description' => $request ->description,
            'inventory_type_id' => $request->inventory_type_id
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
