<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- No Ktp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_ktp', 'No Ktp:') !!}
    {!! Form::number('no_ktp', null, ['class' => 'form-control']) !!}
</div>

<!-- Jk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jk', 'Jk:') !!}
    {!! Form::select('jk', array('L' => 'Laki-Laki', 'P' => 'Peremnpuan'), 'L',['class' => 'form-control']); !!}
</div>

<!-- Tgl Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tgl_lahir', 'Tgl Lahir:') !!}
    {!! Form::date('tgl_lahir', null, ['class' => 'form-control','id'=>'tgl_lahir']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#tgl_lahir').datetimepicker({
            format: 'YYYY-MM-DD',
            useCurrent: false
        })
    </script>
@endsection

<!-- Alamat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pasiens.index') !!}" class="btn btn-default">Cancel</a>
</div>
