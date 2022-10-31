<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Attribute\Required;

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
        $datos['empleados'] = Empleado::paginate(1);//busca los 5 primeros registros pra mandarselos al index que lo muestre
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
        //validacion de datos
        $campos=[
           'nombre'=>'required|string|max:100', 
           'apellidoPaterno'=>'required|string|max:100', 
           'apellidoMaterno'=>'required|string|max:100',
           'correo'=>'required|email',
           'foto'=>'required|max:10000|mimes:jpeg,png,jpg'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'foto.requerid'=>'La foto es requerida'
        ];
        $this->validate($request, $campos, $mensaje);//une la validacion de datos

        $datosEmpleado = request()->except('_token');//carga todo en datosEmpleado menos el token
        if($request->hasFile('foto')){ //guarda el jpg en la carpeta storage/app/public/uploads
            $datosEmpleado['foto'] = $request->file('foto')->store('uploads','public');
        }
        Empleado::insert($datosEmpleado);//inserta en la base de datos
        return redirect('empleado')->with('mensaje','Empleado agregado con éxito');
        //return response()->json($datosEmpleado);//muestra lo que inserto... ya no es necesrio
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
          //validacion de datos
          $campos=[
            'nombre'=>'required|string|max:100', 
            'apellidoPaterno'=>'required|string|max:100', 
            'apellidoMaterno'=>'required|string|max:100',
            'correo'=>'required|email'            
         ];
         $mensaje=[
             'required'=>'El :attribute es requerido'             
         ];
         if($request->hasFile('foto')){ 
            $campos=['foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['foto.requerid'=>'La foto es requerida'];            
         }
         $this->validate($request, $campos, $mensaje);//une la validacion de datos


        $datosEmpleado = request()->except(['_token','_method']);//carga todo en datosEmpleado menos el token        

        if($request->hasFile('foto')){ //guarda el jpg en la carpeta storage/app/public/uploads pero primero borra la anterior
            $empleado=Empleado::findOrFail($id);//busca el empleado

            storage::delete('public/'.$empleado->foto);//borra la foto del empleado
            $datosEmpleado['foto'] = $request->file('foto')->store('uploads','public');
        }

        Empleado::where('id','=',$id)->update($datosEmpleado);
        $empleado=Empleado::findOrFail($id);
        //return view('empleado.edit', compact('empleado'));
        return redirect('empleado')->with('mensaje','Empleado modificado');
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
        //return redirect('empleado');
        return redirect('empleado')->with('mensaje','Empleado borrado con éxito');

    }
}
