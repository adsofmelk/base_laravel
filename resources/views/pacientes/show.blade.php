<x-layouts.app>


        <x-slot name="title">
            Pacientes
        </x-slot>
        <x-slot name="metaDescription">
            Consulta de Pacientes
        </x-slot>

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Pacientes</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-warning" href="{{ route('pacientes.index') }}"> Regresar</a>
        </div>
    </div>

    <div class="container p-3 m-4 border bg-light">
        <div class="row">
            <div class="col">
                <strong>Nombre:</strong>
                {{$paciente->nombre1}} {{$paciente->nombre2}} {{$paciente->apellido1}} {{$paciente->apellido2}}
            </div>
            <div class="col">
                <strong>Documento:</strong>
                {{$paciente->tipodocumentos->nombre}} {{$paciente->documento}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                <strong>Telefono:</strong>
                {{$paciente->telefono}}
            </div>
            <div class="col">
                <strong>Email:</strong>
                {{$paciente->email}}
            </div>
        </div>
    </div>


    <div class="col-lg-12 margin-tb">
        @can('pacientes-edit')
            <a class="btn btn-primary" href="{{ route('pacientes.edit',$paciente) }}">Edit</a>
        @endcan
        @can('pacientes-delete')
            {!! Form::open(['method' => 'DELETE','route' => ['pacientes.destroy', $paciente],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endcan
    </div>

</x-layouts.app>
