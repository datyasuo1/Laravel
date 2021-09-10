<?php

namespace App\Http\Controllers;

use App\Models\NoiThat;
use Illuminate\Http\Request;

class NoiThatController extends Controller
{
    public function index(){
        return view('index');
    }

    public function wareHouse(Request $request){
        $request ->validate([
            'id_name'=>'required',
            'name'=>'required',
            'price'=>'required',
            'image'=>'required',
        ]);
        NoiThat::create($request->all());
        return redirect()->route('index')
            ->with('success','Done');
    }
    public function getDashboard()
    {
        $warehouse = NoiThat::all();
        return view('index', compact('warehouse'));
    }
}
