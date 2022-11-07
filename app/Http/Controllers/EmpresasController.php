<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use App\Models\TipoExamen;
use Illuminate\Http\Request;
use App\Http\Requests\SaveEmpresaRequest;
use Illuminate\Support\Facades\DB;

class EmpresasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:empresas-list|empresas-create|empresas-edit|empresas-delete', ['only' => ['index','show']]);
         $this->middleware('permission:empresas-create', ['only' => ['create','store']]);
         $this->middleware('permission:empresas-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:empresas-delete', ['only' => ['destroy']]);
    }

    public function index(){
        $empresas = Empresas::latest()->paginate(5);
        return view('empresas.index',compact('empresas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

        // return view('empresas.index',array('empresas'=>Empresas::get()));
    }

    public function create(){
        $tipoexamen = TipoExamen::where('estado',true)->get();
        return view('empresas.create', ['empresa' => new Empresas,'tipoexamen' => $tipoexamen]);
    }

    public function store(SaveEmpresaRequest $request){

        DB::transaction(function () use ($request) {
            $empresa = Empresas::create($request->validated());
            if($request->precio_empresa != null){
                foreach($request->precio_empresa as $key => $val){
                    if(is_numeric($val) && $val > 0){
                        $empresa->tipoexamen()->attach($key, ['precio_empresa'=> $val]);
                    }
                }
            }
        });

        return to_route('empresas.index')->with('status','Empresa Creada!');

    }

    public function show(Empresas $empresa){
        // $empresa->tipoexamen()->sync([5,6,7,8], false); // 2nd param = detach

        // $empresa->tipoexamen()->allRelatedIds(); // [1,2,3,4,5,6,7,8]

        return view('empresas.show',array('empresa' => $empresa));
    }

    public function edit(Empresas $empresa){
        $tipoexamen = TipoExamen::where('estado',true)->get();

        $empresa_tipo_examen = $empresa->tipoexamen;
        foreach($tipoexamen as $key => $val){
            $tipoexamen[$key]['custom'] = "";
            foreach ($empresa_tipo_examen as $tipoexamenkey => $tipoexamenvalue) {
                if($val->id == $tipoexamenvalue->id){
                    $tipoexamen[$key]['custom'] = $tipoexamenvalue->pivot->precio_empresa;
                }
            }
        }
        return view('empresas.edit',array('empresa' => $empresa,'tipoexamen' => $tipoexamen));
    }

    public function update(SaveEmpresaRequest $request, Empresas $empresa){
        if($request->nit != $empresa->nit){
            $request->validate(['nit' => 'unique:empresas']);
        }

        DB::transaction(function () use ($request, $empresa) {
            $empresa->update($request->validated());
            $empresa->tipoexamen()->sync([]);
            if($request->precio_empresa != null){
                foreach($request->precio_empresa as $key => $val){
                    if(is_numeric($val) && $val > 0){
                        $empresa->tipoexamen()->attach($key, ['precio_empresa'=> $val]);
                    }
                }
            }
        });
        // session()->flash('status', 'Empresa Actualizada!');

        return to_route('empresas.show',$empresa)->with('status','Empresa Actualizada!');
    }

    public function destroy(Empresas $empresa){
        $empresa->tipoexamen()->sync([]);
        $empresa->delete();
        return to_route('empresas.index')->with('status','Empresa Borrada !');
    }

}
