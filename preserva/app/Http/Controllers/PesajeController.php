<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesaje;

class PesajeController extends Controller
{

    function __construct() {
        $this->middleware('permission: ver-pesaje|crear-pesaje|editar-pesaje|borrar-pesaje')->only('index');
        $this->middleware('permission: crear-pesaje', ['only' => ['create', 'store']]);
        $this->middleware('permission: editar-pesaje', ['only' => ['edit', 'update']]);
        $this->middleware('permission: borrar-pesaje', ['only' => ['destroy']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesajes = Pesaje::paginate(5);
        return view('pesajes.index', compact('pesajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pesajes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'material' => 'required',
            'kg' => 'required'
        ]);

        Pesaje::create($request->all());
        return redirect()->route('pesajes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesaje $pesaje)
    {
        return view('pesajes.editar', compact('pesaje'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesaje $pesaje)
    {
        request()->validate([
            'material' => 'required',
            'kg' => 'required'
        ]);

        $pesaje->update($request->all());
        return redirect()->route('pesajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesaje $pesaje)
    {
        $pesaje->delete();
        return redirect()->route('pesajes.index');
    }
}
