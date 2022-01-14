<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

class MaterialController extends Controller
{

    function __construct() {
        $this->middleware('permission: ver-material|crear-material|editar-material|borrar-material')->only('index');
        $this->middleware('permission: crear-material', ['only' => ['create', 'store']]);
        $this->middleware('permission: editar-material', ['only' => ['edit', 'update']]);
        $this->middleware('permission: borrar-material', ['only' => ['destroy']]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiales = Material::paginate(5);
        return view('materiales.index', compact('materiales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materiales.crear');
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
            'nombre' => 'required',
            'presentacion' => 'required',
            'precio' => 'required'
        ]);

        Material::create($request->all());
        return redirect()->route('materiales.index');
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
    public function edit($id)
    {
        $material = Material::find($id);
        return view('materiales.editar', compact('material'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material, $id)
    {
        request()->validate([
            'nombre' => 'required',
            'presentacion' => 'required',
            'precio' => 'required'
        ]);

        $input = $request->all();
        $mat = Material::find($id);

        $mat->update($input);
        return redirect()->route('materiales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('materiales.index');
    }
}
