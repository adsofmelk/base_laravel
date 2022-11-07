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
        <div class="pull-right">
        @can('empresas-create')
            <a class="btn btn-success" href="{{ route('empresas.create') }}"> Crear Nueva empresa</a>
        @endcan
        </div>
    </div>

    <div class="table-responsive">


        <table class="table table-hover table-striped align-middle">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Nit</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($empresas as $empresa)
                <tr>
                    <td>{{$empresa->nombre}}</td>
                    <td>{{$empresa->nit}}</td>
                    <td>{{$empresa->telefono}}</td>
                    <td>{{$empresa->email}}</td>
                    <td><a class="btn btn-info" href="{{ route('empresas.show',$empresa) }}">Show</a>
                        @can('empresas-edit')
                            <a class="btn btn-primary" href="{{ route('empresas.edit',$empresa) }}">Edit</a>
                        @endcan
                        @can('empresas-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['empresas.destroy', $empresa],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endcan
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
        {!! $empresas->render() !!}

</x-layouts.app>
