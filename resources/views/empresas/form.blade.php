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

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tipo Examen:</strong>
            {!! Form::select('tipo_examen_id[]', $gruposexamenes, old('tipo_examen_id' , $empresa->tipoexamen->tipo_examen_id)  , array('class' => 'form-control')) !!}
        </div>
    </div>

</div>
