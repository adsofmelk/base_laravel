<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="fecha"></label>
            <strong>Fecha Agendada:</strong><br>
            <input type="datetime-local" name="fecha" id="fecha" min="{{ old('fecha', date('Y-m-d H:i:s')) }}"
                value="{{ old('fecha', date('Y-m-d H:i:s')) }}" {{ $agendamiento->fecha != null ?? 'READONLY', '' }}
                placeholder="fecha">
        </div>
        @error('fecha')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Estado:</strong>
            {!! Form::select(
                'tipoestados_agendamientos_id[]',
                $tipoestadosagendamientos,
                old('tipoestados_agendamientos_id', $agendamiento->tipoestados_agendamientos_id),
                ['class' => 'form-control'],
            ) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Empresa:</strong>
            {!! Form::select('empresas_id[]', $empresas, old('empresas_id', $agendamiento->empresas_id), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Paciente a agendar:</strong>
            {!! Form::select('pacientes_id[]', $pacientes, old('pacientes_id', $agendamiento->pacientes_id), ['class' => 'form-control']) !!}
        </div>
    </div>

</div>
