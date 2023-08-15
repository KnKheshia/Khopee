<?php

namespace App\Http\Controllers;

use App\Stuff;
use Illuminate\Http\Request;

class BarangController extends Controller
{ 
    public function index()
    {
        $stuffs = Stuff::all();
        return view('content.masterbarang.index', compact('stuffs'));
    }
    public function create()
    {
        return view('content.masterbarang.create');
    }
    public function store(Request $request)
    {
        $stuff = Stuff::create($request->all());
        return redirect()->back();
    }
    public function edit($id)
    {
        $stuff = Stuff::findOrFail($id);
        return view('content.masterbarang.edit', compact('stuff'));
    }
    public function update(Request $request, $id)
    {
        $stuff = Stuff::findOrFail($id);
        $stuff->update($request->all());
        return redirect()-> back();
    }
    public function destroy(Request $request,$id)
    {
        $stuff = Stuff::findOrFail($id);
        $stuff->delete($request->all());
        return redirect()-> back();
    }
}
