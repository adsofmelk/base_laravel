<?php

namespace App\Http\Controllers;

use App\Models\TipoExamen;
use App\Models\GruposExamenes;
use Illuminate\Http\Request;
use App\Http\Requests\SaveTipoExamenRequest;

class TipoExamenController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:tipoexamen-list|tipoexamen-create|tipoexamen-edit|tipoexamen-delete', ['only' => ['index','show']]);
         $this->middleware('permission:tipoexamen-create', ['only' => ['create','store']]);
         $this->middleware('permission:tipoexamen-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:tipoexamen-delete', ['only' => ['destroy']]);
    }

    public function index(){
        $tipoexamen = TipoExamen::latest()->paginate(5);
        return view('tipoexamen.index',compact('tipoexamen'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

        // return view('tipoexamen.index',array('tipoexamen'=>tipoexamen::get()));
    }

    public function create(){
        $gruposexamenes = GruposExamenes::pluck('nombre','id')->all();
        return view('tipoexamen.create', ['tipoexamen' => new Tipoexamen,'gruposexamenes' => $gruposexamenes]);
    }

    public function store(SaveTipoexamenRequest $request){

        $validated =  $request->validated();
        $validated['grupos_examenes_id'] = $validated['grupos_examenes_id'][0];
        TipoExamen::create($validated);

        return to_route('tipoexamen.index')->with('status','Tipoexamen Creado!');
    }

    public function edit($id){
        $tipoexamen = TipoExamen::find($id);
        $gruposexamenes = GruposExamenes::pluck('nombre','id')->all();
        return view('tipoexamen.edit',array('tipoexamen' => $tipoexamen,'gruposexamenes' => $gruposexamenes));
    }

    public function update(SaveTipoexamenRequest $request, $id){
        $validated =  $request->validated();
        $validated['grupos_examenes_id'] = $validated['grupos_examenes_id'][0];
        $tipoexamen = TipoExamen::find($id);
        $tipoexamen->update($validated);

        return to_route('tipoexamen.show',$tipoexamen)->with('status','Tipoexamen Actualizado!');
    }

    public function show($id){
        $tipoexamen = TipoExamen::find($id);
        return view('tipoexamen.show',array('tipoexamen' => $tipoexamen));
    }

    public function destroy($id){
        TipoExamen::find($id)->delete();
        return to_route('tipoexamen.index')->with('status','Tipoexamen Borrado !');
    }


}
