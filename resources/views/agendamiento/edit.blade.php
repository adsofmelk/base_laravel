<x-layouts.app>
    <x-slot name="title">
        Editar Empresa - {{ $empresa['nombre'] }}
    </x-slot>
    <x-slot name="metaDescription">
        Editar Empresa - {{ $empresa['nombre'] }}
    </x-slot>


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Editar Empresa</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-warning" href="{{ route('empresas.index') }}"> Regresar</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('empresas.update', $empresa)}}" method="post">

        @csrf
        @method('PATCH')

        @include('empresas.form')

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>

</x-layouts.app>
