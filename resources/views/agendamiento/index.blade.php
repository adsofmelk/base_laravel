<x-layouts.app>
    <x-slot name="title">
        Agendamiento
    </x-slot>
    <x-slot name="metaDescription">
        Consulta de agendamiento
    </x-slot>

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>agendamiento</h2>
        </div>
        <div class="pull-right">
        @can('agendamiento-create')
            <a class="btn btn-success" href="{{ route('agendamiento.create') }}"> Crear Nuevo Agendamiento</a>
        @endcan
        </div>
    </div>

    <div class="table-responsive">


        <table class="table table-hover table-striped align-middle">
            <thead>
                <tr>
                    <th>Fecha/hora</th>
                    <th>Empresa</th>
                    <th>Paciente</th>
                    <th>Estado</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($agendamiento as $item)
                <tr>
                    <td>{{$item->fecha}}</td>
                    <td>{{$item->empresas->nombre}}</td>
                    <td>{{$item->pacientes->nombre1}} {{$item->pacientes->nombre2}} {{$item->pacientes->apellido1}} {{$item->pacientes->apelldos2}}</td>
                    <td>{{$item->tipoestasosAgendamientos->nombre}}</td>
                    <td><a class="btn btn-info" href="{{ route('agendamiento.show',$item) }}">Show</a>
                        @can('agendamiento-edit')
                            <a class="btn btn-primary" href="{{ route('agendamiento.edit',$item) }}">Edit</a>
                        @endcan
                        @can('agendamiento-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['agendamiento.destroy', $item],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endcan
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
        {!! $agendamiento->render() !!}

</x-layouts.app>
