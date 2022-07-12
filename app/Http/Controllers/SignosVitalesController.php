<?php

namespace App\Http\Controllers;

use App\Models\SignosVitales;
use Illuminate\Http\Request;

class SignosVitalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Mostrar todos los signos vitales en formato json
        $signosvitales = SignosVitales::all();
        return response()->json($signosvitales, 200);
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
        //Agregar un nuevo signo vital
        $signosvitales = new SignosVitales();
        $signosvitales->ritmoCardiaco = $request->ritmoCardiaco;
        $signosvitales->caloriasQuemadas = $request->caloriasQuemadas;
        $signosvitales->pasosDiarios = $request->pasosDiarios;
        $signosvitales->distanciaRecorrida = $request->distanciaRecorrida;
        $signosvitales->idExpediente = $request->idExpediente;
        //Guardar los signos vitales en la base de datos
        $signosvitales->save();
        //Retornar los signos vitales en formato json
        return response()->json($signosvitales, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SignosVitales  $signosVitales
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //Mostrar un signo vital en especifico
        $signosvitales = SignosVitales::find($id);
        //Si no existe el signo vital, devolver un error 404
        if (!$signosvitales) {
            //Devolver una respuesta en formato json
            return response()->json(['error' => 'Sin Existencia'], 404);
        }
        //Si existe, retornar un json con los datos del signo vital
        return response()->json($signosvitales, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SignosVitales  $signosVitales
     * @return \Illuminate\Http\Response
     */
    public function edit(SignosVitales $signosVitales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SignosVitales  $signosVitales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //Buscar el signo vital por el id
        $signosvitales = SignosVitales::findOrFail($request->id);
        //Actualizar el signo vital con los nuevos datos
        $signosvitales->ritmoCardiaco = $request->ritmoCardiaco;
        $signosvitales->caloriasQuemadas = $request->caloriasQuemadas;
        $signosvitales->pasosDiarios = $request->pasosDiarios;
        $signosvitales->distanciaRecorrida = $request->distanciaRecorrida;
        $signosvitales->idExpediente = $request->idExpediente;
        //Guardar los cambios en la base de datos
        $signosvitales->save();
        //Retornar los datos del signo vital en formato json
        return response()->json($signosvitales, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SignosVitales  $signosVitales
     * @return \Illuminate\Http\Response
     */
    public function destroy(SignosVitales $signosVitales)
    {
        //Eliminar un signo vital con el metodo destroy
        $signosvitales->destroy($signosVitales->id);
        //Retornar una respuesta en formato json
        return response()->json(['message' => 'Eliminado'], 200);
    }
}
