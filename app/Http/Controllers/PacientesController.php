<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use App\Models\TipoDocumentos;
use Illuminate\Http\Request;
use App\Http\Requests\SavePacienteRequest;
use Illuminate\Support\Facades\DB;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:pacientes-list|pacientes-create|pacientes-edit|pacientes-delete', ['only' => ['index','show']]);
         $this->middleware('permission:pacientes-create', ['only' => ['create','store']]);
         $this->middleware('permission:pacientes-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:pacientes-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Pacientes::latest()->paginate(5);
        return view('pacientes.index',compact('pacientes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipodocumentos = Tipodocumentos::pluck('nombre','id')->all();
        return view('pacientes.create', ['paciente' => new Pacientes,'tipodocumentos' => $tipodocumentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SavePacienteRequest $request){

        Pacientes::create($request->validated());

        return to_route('pacientes.index')->with('status','pacientes Creado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = Pacientes::find($id);
        return view('pacientes.show',array('paciente' => $paciente));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Pacientes::find($id);
        $tipodocumentos = Tipodocumentos::pluck('nombre','id')->all();
        return view('pacientes.edit', ['paciente' => $paciente,'tipodocumentos' => $tipodocumentos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SavePacienteRequest $request, Pacientes $paciente){
        $validated =  $request->validated();
        $paciente->update($validated);

        return to_route('pacientes.show',$paciente)->with('status','Paciente Actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pacientes::find($id)->delete();
        return to_route('pacientes.index')->with('status','Paciente Borrado !');
    }
}
