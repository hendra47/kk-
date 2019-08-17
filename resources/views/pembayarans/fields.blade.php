<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Dokter Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dokter', 'Dokter:') !!}
    {!! Form::text('dokter', null, ['class' => 'form-control']) !!}
</div>

<!-- Jk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jk', 'Jk:') !!}
    {!! Form::text('jk', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Biaya Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_biaya', 'Total Biaya:') !!}
    {!! Form::text('total_biaya', null, ['class' => 'form-control']) !!}
</div>

<!-- Tgl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl', 'Tgl:') !!}
    {!! Form::date('tgl', null, ['class' => 'form-control','id'=>'tgl']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#tgl').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pembayarans.index') !!}" class="btn btn-default">Cancel</a>
</div>
