<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Seccion;
use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('alumnos.alumno-index', ['alumnos' => Alumno::all(),]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        $secciones = Seccion::all();
        return view('alumnos.alumno-show', compact('alumno', 'secciones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        //
    }

    public function actualizarSeccionesAlumno(Request $request, Alumno $alumno)
    {
        $alumno->secciones()->sync($request->seccion_id);
        return redirect()->route('alumno.show', $alumno);
    }
}
