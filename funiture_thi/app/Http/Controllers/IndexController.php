<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function view()
    {
        $datas = Furniture::all();
        return view('index', compact('datas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);
        Furniture::create($request->all());
        return redirect()->route('index');
    }
}
