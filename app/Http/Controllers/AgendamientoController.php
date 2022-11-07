<?php

namespace App\Http\Controllers;

use App\Models\Agendamiento;
use App\Models\Pacientes;
use App\Models\Empresas;
use App\Models\TipoestadosAgendamientos;
use Illuminate\Http\Request;
use App\Http\Requests\SaveAgendamientoRequest;
use Illuminate\Support\Facades\DB;


class AgendamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:agendamiento-list|agendamiento-create|agendamiento-edit|agendamiento-delete', ['only' => ['index','show']]);
         $this->middleware('permission:agendamiento-create', ['only' => ['create','store']]);
         $this->middleware('permission:agendamiento-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:agendamiento-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendamiento = Agendamiento::latest()->paginate(5);
        return view('agendamiento.index',compact('agendamiento'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes = Pacientes::where('estado',true)->pluck('nombre1', 'id')->all();
        $empresas = Empresas::where('estado',true)->pluck('nombre', 'id')->all();
        $tipoestadosagendamientos = TipoestadosAgendamientos::where('estado',true)->pluck('nombre', 'id')->all();
        return view('agendamiento.create', ['agendamiento' => new Agendamiento,
                                            'pacientes' => $pacientes,
                                            'empresas' => $empresas,
                                            'tipoestadosagendamientos' => $tipoestadosagendamientos,
                                        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveAgendamientoRequest $request)
    {
        // $validated =  $request->validated();
        // $validated['grupos_examenes_id'] = $validated['grupos_examenes_id'][0];
        // TipoExamen::create($validated);

        $agendamiento = new Agendamiento( $request->validated() );
        $agendamiento->empresas_id = $agendamiento->empresas_id[0];
        $agendamiento->pacientes_id = $agendamiento->pacientes_id[0];
        $agendamiento->tipoestados_agendamientos_id = $agendamiento->tipoestados_agendamientos_id[0];

        $agendamiento->save();
        return to_route('agendamiento.index')->with('status', 'Agendamiento Creado!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
