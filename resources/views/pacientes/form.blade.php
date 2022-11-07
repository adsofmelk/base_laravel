<div class="container p-3">
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="nombre1"></label><input type="text" name="nombre1" id="nombre1" value="{{ old('nombre1' , $paciente->nombre1)  }}" placeholder="nombre1"></div>
                    @error('nombre1')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="nombre2"></label><input type="text" name="nombre2" id="nombre2" value="{{ old('nombre2' , $paciente->nombre2)  }}" placeholder="nombre2"></div>
                    @error('nombre2')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="apellido1"></label><input type="text" name="apellido1" id="apellido1" value="{{ old('apellido1' , $paciente->apellido1)  }}" placeholder="apellido1"></div>
                    @error('apellido1')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="apellido2"></label><input type="text" name="apellido2" id="apellido2" value="{{ old('apellido2' , $paciente->apellido2)  }}" placeholder="apellido2"></div>
                    @error('apellido2')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                {!! Form::select('tipo_documentos_id', $tipodocumentos, old('tipo_documentos_id' , $paciente->tipo_documentos_id)  , array('class' => 'form-control')) !!}
            </div>
        </div>



        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="documento"></label><input type="text" name="documento" id="documento" value="{{ old('documento' , $paciente->documento)  }}" placeholder="documento"></div>
                    @error('documento')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
        </div>
    </div>

    <div class="row ">
        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="telefono"></label><input type="text" name="telefono" id="telefono" value="{{ old('telefono' , $paciente->telefono)  }}" placeholder="telefono"></div>
                    @error('telefono')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="email"></label><input type="text" name="email" id="email" value="{{ old('email' , $paciente->email)  }}" placeholder="email"></div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
        </div>
    </div>
</div>
