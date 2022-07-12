<?php

namespace App\Http\Controllers;

use App\Models\Expedientes;
use Illuminate\Http\Request;

class ExpedientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar todos los expedientes en formato json
        $expedientes = Expedientes::all();
        return response()->json($expedientes, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Agregar un nuevo expediente
        $expedientes = new Expedientes();
        $expedientes->noExpediente = $request->noExpediente;
        $expedientes->idPaciente = $request->idPaciente;
        $expedientes->idDoctor = $request->idDoctor;
        $expedientes->descripcion = $request->descripcion;
        //Guardar el expediente en la base de datos
        $expedientes->save();
        //Retornar el expediente en formato json
        return response()->json($expedientes, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expedientes  $expedientes
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //Mostrar un expediente en especifico
        $expedientes = Expedientes::find($id);
        //Verificar si el expediente  existe
        if (!$expedientes) {
            //Si no existe devolver un menje de error en formato json
            return response()->json(['message' => 'Sin existencia'], 404);
        }
        //Retornar el expediente en formato json
        return response()->json($expedientes, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expedientes  $expedientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Expedientes $expedientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expedientes  $expedientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //Buscar el expediente por el id
        $expedientes = Expedientes::findOrFail($request->id);
        //Actualizar los campos del expediente
        $expedientes->noExpediente = $request->noExpediente;
        $expedientes->idPaciente = $request->idPaciente;
        $expedientes->idDoctor = $request->idDoctor;
        $expedientes->descripcion = $request->descripcion;
        //Guardar los cambios en la base de datos
        $expedientes->save();
        //Retornar el expediente en formato json
        return response()->json($expedientes, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expedientes  $expedientes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Eliminar un expediente por el id
        $expedientes = Expedientes::destroy($request->id);
        //Retornar un mensaje en formato json
        return response()->json(['message' => 'Expediente eliminado'], 200);
    }
}
