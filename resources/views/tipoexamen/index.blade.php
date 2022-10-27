<x-layouts.app>
    <x-slot name="title">
        Tipoexamen
    </x-slot>
    <x-slot name="metaDescription">
        Consulta de tipoexamen
    </x-slot>

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tipo examen</h2>
        </div>
        <div class="pull-right">
        @can('tipoexamen-create')
            <a class="btn btn-success" href="{{ route('tipoexamen.create') }}"> Crear Nuevo tipoexamen</a>
        @endcan
        </div>
    </div>

     <table class="table table-bordered">
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Grupo</th>
            <th width="280px">Action</th>
        </tr>


    @foreach ($tipoexamen as $row)

        <tr>
            <td>{{$row->nombre}}</td>
            <td>{{$row->precio}}</td>
            <td><span class="badge rounded-pill" style="background-color:{{$row->gruposexamenes->color}};">{{$row->gruposexamenes->nombre}}</span></td>

            <td><a class="btn btn-info" href="{{ route('tipoexamen.show',$row) }}">Show</a>
                @can('tipoexamen-edit')
                    <a class="btn btn-primary" href="{{ route('tipoexamen.edit',$row) }}">Edit</a>
                @endcan
                @can('tipoexamen-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['tipoexamen.destroy', $row],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endcan
            </td>

        </tr>
    @endforeach
     </table>
</x-layouts.app>
