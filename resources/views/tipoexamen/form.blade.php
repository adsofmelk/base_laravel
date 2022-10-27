<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="nombre"></label><input type="text" name="nombre" id="nombre" value="{{ old('nombre' , $tipoexamen->nombre)  }}" placeholder="nombre"></div>
                @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="precio"></label><input type="text" name="precio" id="precio" value="{{ old('precio' , $tipoexamen->precio)  }}" placeholder="precio"></div>
                @error('precio')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Grupo:</strong>
            {!! Form::select('grupos_examenes_id[]', $gruposexamenes, old('grupos_examenes_id' , $tipoexamen->grupos_examenes_id)  , array('class' => 'form-control')) !!}
        </div>
    </div>


</div>
