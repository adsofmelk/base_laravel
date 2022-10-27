<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use Illuminate\Http\Request;
use App\Http\Requests\SaveEmpresaRequest;

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
        return view('empresas.create', ['empresa' => new Empresas]);
    }

    public function store(SaveEmpresaRequest $request){

        Empresas::create($request->validated());

        // session()->flash('status', 'Empresa Creada!');

        return to_route('empresas.index')->with('status','Empresa Creada!');
    }

    public function show(Empresas $empresa){
        // $empresa->tipoexamen()->sync([5,6,7,8], false); // 2nd param = detach

        $empresa->tipoexamen()->allRelatedIds(); // [1,2,3,4,5,6,7,8]

        return view('empresas.show',array('empresa' => $empresa));
    }

    public function edit(Empresas $empresa){
        return view('empresas.edit',array('empresa' => $empresa));
    }

    public function update(SaveEmpresaRequest $request, Empresas $empresa){
        if($request->nit != $empresa->nit){
            $request->validate(['nit' => 'unique:empresas']);
        }
        $empresa->update($request->validated());

        // session()->flash('status', 'Empresa Actualizada!');

        return to_route('empresas.show',$empresa)->with('status','Empresa Actualizada!');
    }

    public function destroy(Empresas $empresa){
        // return view('empresas.edit',array('empresa' => $empresa));
        $empresa->delete();
        return to_route('empresas.index')->with('status','Empresa Borrada !');
    }

}
