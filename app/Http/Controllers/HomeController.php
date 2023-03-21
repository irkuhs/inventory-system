<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Stock;
use App\Models\Inventori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //by query
        //$inventories = Inventori::where('user_id', auth()->user()->id)->get();

        //by relation
        $inventories = auth()->user()->inventories()->paginate(5);
         return view('home', compact('inventories'));
    }
}
