<x-layouts.app>


        <x-slot name="title">
            Empresas
        </x-slot>
        <x-slot name="metaDescription">
            Consulta de empresas
        </x-slot>

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Empresas</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-warning" href="{{ route('empresas.index') }}"> Regresar</a>
        </div>
    </div>

    <div class="container p-3 m-4 border bg-light">
        <div class="row">
            <div class="col">
                <strong>Nombre:</strong>
                {{$empresa->nombre}}
            </div>
            <div class="col">
                <strong>Nit:</strong>
                {{$empresa->nit}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                <strong>Telefono:</strong>
                {{$empresa->telefono}}
            </div>
            <div class="col">
                <strong>Email:</strong>
                {{$empresa->email}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                <strong>Nombre Contacto:</strong>
                {{$empresa->nombre_contacto}}
            </div>
            <div class="col">
                <strong>Dirección:</strong>
                {{$empresa->direccion}}
            </div>
        </div>
    </div>
    <div class="container text-center">
        <h3>Precios personalizados</h3>
    </div>
    <div class="container p-3 m-4 border bg-light">
        <table class="table table-hover table-striped align-middle">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>precio</th>
                    <th>Grupo Examenes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $empresa->tipoexamen as $key => $val)
                <hr>
                    <tr>
                        <td>{{$val->nombre}}</td>
                        <td>$ {{number_format($val->pivot->precio_empresa)}}</td>
                        <td><span class="badge rounded-pill" style="background-color:{{$val->gruposexamenes->color}};">{{$val->gruposexamenes->nombre}}</span></td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>

    <div class="col-lg-12 margin-tb">
        @can('empresas-edit')
            <a class="btn btn-primary" href="{{ route('empresas.edit',$empresa) }}">Edit</a>
        @endcan
        @can('empresas-delete')
            {!! Form::open(['method' => 'DELETE','route' => ['empresas.destroy', $empresa],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endcan
    </div>

</x-layouts.app>
