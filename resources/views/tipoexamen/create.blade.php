<x-layouts.app>
    <x-slot name="title">
        Crear tipoexamen
    </x-slot>
    <x-slot name="metaDescription">
        Crear tipoexamen
    </x-slot>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Nuevo tipoexamen</h2>
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

    <form action="{{route('tipoexamen.store')}}" method="post">
        @csrf

        @include('tipoexamen.form')

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</x-layouts.app>
