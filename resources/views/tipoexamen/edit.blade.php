<x-layouts.app>
    <x-slot name="title">
        Editar Tipoexamen - {{ $tipoexamen['nombre'] }}
    </x-slot>
    <x-slot name="metaDescription">
        Editar Tipoexamen - {{ $tipoexamen['nombre'] }}
    </x-slot>


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Editar Tipoexamen</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-warning" href="{{ route('tipoexamen.index') }}"> Regresar</a>
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

    <form action="{{route('tipoexamen.update',$tipoexamen->id)}}" method="post">

        @csrf
        @method('PATCH')

        @include('tipoexamen.form')

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>

</x-layouts.app>
