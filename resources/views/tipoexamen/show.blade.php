<x-layouts.app>
    <x-slot name="title">
        Tipoexamen - {{ $tipoexamen['nombre'] }}
    </x-slot>
    <x-slot name="metaDescription">
        Tipoexamen - {{ $tipoexamen['nombre'] }}
    </x-slot>

    <div class="col-lg-12 margin-tb">
        <div class="float-right">
            <a class="btn btn-warning" href="{{ route('tipoexamen.index') }}"> Regresar</a>
        </div>
    </div>
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Detalle tipoexamen - {{ $tipoexamen['nombre'] }}</h2>
        </div>
    </div>

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">
            Precio:
            {{$tipoexamen->precio}}
        </div>

        <div class="pull-left">
            Precio:
            {{$tipoexamen->gruposexamenes->nombre}}
        </div>

    </div>

    <div class="col-lg-12 margin-tb">
        &nbsp;
    </div>

    <div class="col-lg-12 margin-tb">
        @can('tipoexamen-edit')
            <a class="btn btn-primary" href="{{ route('tipoexamen.edit',$tipoexamen) }}">Edit</a>
        @endcan
        @can('tipoexamen-delete')
            {!! Form::open(['method' => 'DELETE','route' => ['tipoexamen.destroy', $tipoexamen],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endcan
    </div>

</x-layouts.app>
