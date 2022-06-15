<?php

namespace App\Http\Controllers;

use App\Sala;
use Illuminate\Http\Request;
use App;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $salas = App\Sala::all();

      //Return vista Inicio
      return view("inicio", compact('salas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //Creacion de instancia en nuestro modelo
          $salaAgregar = new Sala;

          $request->validate([
            'sala' => 'required|unique:salas',
            'nombre' => 'required',
            'actividad' => 'required',
            'horadinicio' => 'required',
            'horadtermino' => 'required'
          ]);

        //Guarado en BD
          $salaAgregar->sala = $request->sala;
          $salaAgregar->nombre = $request->nombre;
          $salaAgregar->actividad = $request->actividad;
          $salaAgregar->horadinicio = $request->horadinicio;
          $salaAgregar->horadtermino = $request->horadtermino;
          
  
          $salaAgregar->save();

          //notificación de guardado corectamente
          return back()->with('agregar', 'Se ha agendado la sala correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function show(Sala $sala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //funcion editar
        $salaActualizar = App\Sala::findOrFail($id);
        return view('editar', compact('salaActualizar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $salaUpdate = App\Sala::findOrFail($id);
        $salaUpdate->nombre = $request->nombre;
        $salaUpdate->actividad = $request->actividad;
        $salaUpdate->save();
        return back()->with('update', 'Se ha actualizado la informacion!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salaEliminar = App\Sala::findOrFail($id);
        $salaEliminar->delete();
        return back()->with('eliminar', 'La sala se ha finalizado!');
    }
}
