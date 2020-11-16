<?php

namespace App\Http\Controllers;

use App\Models\Moneda;
use Illuminate\Http\Request;

class MonedaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monedas = Moneda::all();
        return view('moneda.index', ['monedas' => $monedas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('moneda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $moneda = new Moneda($request->all());
        try {
            $result = $moneda->save();
        } catch(\Exception $e) {
            $result = 0;
        }
        if($moneda->id > 0) {
            $response = ['op' => 'create', 'r' => $result, 'id' => $moneda->id];
            return redirect('moneda')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Moneda $moneda)
    {
        return view('moneda.show', ['moneda' => $moneda]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Moneda $moneda)
    {
        return view('moneda.edit', ['moneda' => $moneda]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Moneda $moneda)
    {
        try {
            $result = $moneda->update($request->all());
        } catch (\Exception $e) {
            $result = 0;
        }
        
        if($result) {
            $response = ['op' => 'update', 'r' => $result, 'id' => $moneda->id];
            return redirect('moneda')->with($response);
        } else {
            return back()->withInput()->with(['error' => 'algo ha fallado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($moneda)
    {
        $id = $moneda->id;
        try {
            $result = $moneda->delete();
        } catch(\Exception $e) {
            $result = 0;
        }
        
        $response = ['op' => 'destroy', 'r' => $result, 'id' => $id];
        return redirect('moneda')->with($response);
    }
    
    function fallback() {
        return redirect('moneda');
    }
}
