<!-- Tgl Field -->
<div class="form-group col-sm-12">
    {!! Form::label('tgl', 'Tanggal:') !!}
    {!! Form::date('tgl', null, ['class' => 'form-control','id'=>'tgl']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#tgl').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: true
        })
    </script>
@endsection

<!-- Id Pasien Field -->
<div class="form-group col-sm-12">
    {!! Form::label('id_pasien', 'Pasien:') !!}
    <!-- {!! Form::number('id_pasien', null, ['class' => 'form-control']) !!} -->
    {!! Form::select('id_pasien', $pasiens, null, ['class' => 'form-control']) !!}
</div>


<!-- Id Pasien Field -->
<div class="form-group col-sm-12">
    {!! Form::label('id_dokter', 'Dokter:') !!}
    <!-- {!! Form::number('id_pasien', null, ['class' => 'form-control']) !!} -->
    {!! Form::select('id_dokter', $dokter, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('daftars.index') !!}" class="btn btn-default">Cancel</a>
</div>
