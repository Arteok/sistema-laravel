<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados'] = Empleado::paginate(5);//busca los 5 primeros registros pra mandarselos al index que lo muestre
        return view('empleado.index', $datos);  
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $datosEmpleado = request()->except('_token');//carga todo en datosEmpleado menos el token
        if($request->hasFile('foto')){ //guarda el jpg en la carpeta storage/app/public/uploads
            $datosEmpleado['foto'] = $request->file('foto')->store('uploads','public');
        }
        Empleado::insert($datosEmpleado);//inserta en la base de datos
        return response()->json($datosEmpleado);//muestra lo que inserto
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado=Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosEmpleado = request()->except(['_token','_method']);//carga todo en datosEmpleado menos el token        

        if($request->hasFile('foto')){ //guarda el jpg en la carpeta storage/app/public/uploads pero primero borra la anterior
            $empleado=Empleado::findOrFail($id);//busca el empleado
            storage::delete('public/'.$empleado->foto);//borra la foto del empleado
            $datosEmpleado['foto'] = $request->file('foto')->store('uploads','public');
        }

        Empleado::where('id','=',$id)->update($datosEmpleado);
        $empleado=Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleado=Empleado::findOrFail($id);//busca el empleado
        if(Storage::delete('public/'.$empleado->foto)){

            Empleado::destroy($id);
        }        
        return redirect('empleado');
    }
}
