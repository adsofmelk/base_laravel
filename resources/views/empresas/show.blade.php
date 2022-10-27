<x-layouts.app>
    <x-slot name="title">
        Empresa - {{ $empresa['nombre'] }}
    </x-slot>
    <x-slot name="metaDescription">
        Empresa - {{ $empresa['nombre'] }}
    </x-slot>

    <div class="col-lg-12 margin-tb">
        <div class="float-right">
            <a class="btn btn-warning" href="{{ route('empresas.index') }}"> Regresar</a>
        </div>
    </div>
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Detalle Empresa - {{ $empresa['nombre'] }}</h2>
        </div>
    </div>

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">
            <Kbd>Nit:</kbd>
            {{$empresa->nit}}
        </div>

        <div class="pull-left">
            <Kbd>Telefono:</kbd>
            {{$empresa->telefono}}
        </div>

        <div class="pull-left">
            <Kbd>Email:</kbd>
            {{$empresa->email}}
        </div>

        <div class="pull-left">
            <Kbd>Nombre Contacto:</kbd>
            {{$empresa->nombre_contacto}}
        </div>

        <div class="pull-left">
            <Kbd>Dirección:</kbd>
            {{$empresa->direccion}}
        </div>

        <div class="pull-left">
            <Kbd>Tipo Examenes:</kbd>
                @dd($empresa->tipoexamen)
            {{-- {{$empresa->getTipoexamen}} --}}
        </div>


    </div>

    <div class="col-lg-12 margin-tb">
        &nbsp;
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
