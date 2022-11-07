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
        <div class="pull-right">
        @can('pacientes-create')
            <a class="btn btn-success" href="{{ route('pacientes.create') }}"> Crear Nuevo Paciente</a>
        @endcan
        </div>
    </div>

    <div class="table-responsive">


        <table class="table table-hover table-striped align-middle">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Documento</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($pacientes as $paciente)
                <tr>
                    <td>{{$paciente->nombre1}} {{$paciente->nombre2}}</td>
                    <td>{{$paciente->apellido1}} {{$paciente->apellido2}}</td>
                    <td>{{$paciente->tipodocumentos->alias}} {{$paciente->documento}}</td>
                    <td>{{$paciente->telefono}}</td>
                    <td>{{$paciente->email}}</td>
                    <td><a class="btn btn-info" href="{{ route('pacientes.show',$paciente) }}">Show</a>
                        @can('pacientes-edit')
                            <a class="btn btn-primary" href="{{ route('pacientes.edit',$paciente) }}">Edit</a>
                        @endcan
                        @can('pacientes-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['pacientes.destroy', $paciente],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endcan
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
        {!! $pacientes->render() !!}

</x-layouts.app>
