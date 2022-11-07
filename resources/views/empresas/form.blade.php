<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="nombre"></label><input type="text" name="nombre" id="nombre" value="{{ old('nombre' , $empresa->nombre)  }}" placeholder="nombre"></div>
                @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="nit"></label><input type="text" name="nit" id="nit" value="{{ old('nit' , $empresa->nit)  }}" placeholder="nit"></div>
                @error('nit')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="telefono"></label><input type="text" name="telefono" id="telefono" value="{{ old('telefono' , $empresa->telefono)  }}" placeholder="telefono"></div>
                @error('telefono')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="email"></label><input type="text" name="email" id="email" value="{{ old('email' , $empresa->email)  }}" placeholder="email"></div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="nombre_contacto"></label><input type="text" name="nombre_contacto" id="nombre_contacto" value="{{ old('nombre_contacto' , $empresa->nombre_contacto)  }}" placeholder="nombre_contacto"></div>
                @error('nombre_contacto')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="direccion"></label><input type="text" name="direccion" id="direccion" value="{{ old('direccion' , $empresa->direccion)  }}" placeholder="direccion"></div>
                @error('direccion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
    </div>

</div>


<div class="table-responsive">


    <table class="table table-hover table-striped align-middle">
        <thead>
            <tr>
                <th>Nombre Examen</th>
                <th>Grupo Examen</th>
                <th>Precio General</th>
                <th>Precio Empresa</th>
                {{-- <th>Activo</th> --}}
            </tr>
        </thead>
        <tbody>
        @foreach ($tipoexamen as $tipo)
            <tr>
                <td>{{$tipo->nombre}}</td>
                <td><span class="badge rounded-pill" style="background-color:{{$tipo->gruposexamenes->color}};">{{$tipo->gruposexamenes->nombre}}</span></td>
                <td>$ {{number_format($tipo->precio)}}</td>
                <td>
                    <input type="text" name="precio_empresa[{{$tipo->id}}]" id="precio_empresa[{{$tipo->id}}]" value="{{ $tipo->custom ?? $tipo->custom, '' }}" placeholder="0">
                </td>
                {{-- <td><input name="activo[{{$tipo->id}}]" id="activo[{{$tipo->id}}]" class="form-check-input" type="checkbox" role="switch"  checked></td> --}}
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
