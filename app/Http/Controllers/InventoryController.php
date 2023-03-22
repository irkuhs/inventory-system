<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Stock;
use App\Models\Inventori;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInventoryRequest;

class InventoryController extends Controller
{
    public function create()
    {
        $inventoryTypes = Type::all();
        $inventoryStock = Stock::all();
        return view('inventori.create', compact('inventoryTypes','inventoryStock'));
    }

    public function store(StoreInventoryRequest $request)
    {
        //dd($request->all());
        $inventori= Inventori::create(
            [
                'user_id'=> auth()->user()->id,
                'name'=> $request-> name,
                'description' => $request -> description,
                'inventory_type_id' => $request->inventory_type_id,
            ]
            );
        Stock::create(
            [
                'inventory_id'=>$inventori->id,
                'quantity'=> $request-> quantity,
                'color' => $request -> color
            ]
            );

        return to_route("home");
    }

    public function edit(Inventori $inventory)
    {
        $inventoryTypes=Type::all();
        $inventoryStock = Stock::all();
        return view('inventori.update', compact('inventory','inventoryTypes','inventoryStock'));
    }

    public function update(Request $request, Inventori $inventory)
    {
        $inventory->update([
            'user_id'=> $inventory->user_id,
            'name'=> $request->name,
            'description' => $request ->description,
            'inventory_type_id' => $request->inventory_type_id
        ]);

        $stock = Stock::where('inventory_id',$inventory->id);

        $stock->update([
            'quantity'=> $request-> quantity,
            'color' => $request -> color
        ]);

        return redirect()->route("home");
    }

    public function delete(Inventori $inventory)
    {
        $inventory->inventoryStock()->delete();
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

    public function show(Inventori $inventory)
    {

        $quantityStocks = $inventory->inventoryStock;
        //dd($quantityStocks);
        return view('inventori.show', compact('inventory', 'quantityStocks'));
    }
}
