<?php

namespace App\Http\Controllers;

use App\Models\bin;
use Illuminate\Http\Request;

class BinController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $bins = Bin::get();
        return view('bins.index', compact('bins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bins.form'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request);        
        $bins = Bin::create($request->all());

        $bins = Bin::get();
        return view('bins.index', ['bins' => $bins]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
        $bin = Bin::findOrFail($id);
        return view('bins.show', compact('bin')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bin = Bin::findOrFail($id);
        $entrada = \Carbon\Carbon::parse($bin->hora_entrada);
        //dd(var_dump($entrada));
        //dd($salida, $entrada->format('H:i'), $tiempo, $total);
        return view('bins.form', compact('bin')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$entrada = \Carbon\Carbon::parse($request->hora_entrada);
        //$tiempo = $entrada->diffInMinutes($request->hora_salida);
        //$tarifa = 28 / 60;
        //$total = $tarifa * $tiempo ;
        //dd($request);
        $bin = Bin::findOrFail($id);
        $bin->fill($request->all());
        $bin->save();
        $bins = Bin::get();
        return view('bins.index', ['bins' => $bins]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bin = Bin::destroy($id);
        $bins = Bin::get();
        return view('bins.index', ['bins' => $bins]);
    }

    
    public function search(Request $request)
    {
        $bins = Bin::where('placas', 'like', "{$request->search}%")->get();
        return view('bins.index', ['bins' => $bins]);

    }
}
