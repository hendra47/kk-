<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama Tindakan:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type', array('TINDAKAN' => 'TINDAKAN', 'JASA' => 'JASA'),null,['class' => 'form-control']); !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('biaya', 'Biaya:') !!}
    {!! Form::number('biaya', null, ['class' => 'form-control']) !!}
</div> 

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('tindakan.index') !!}" class="btn btn-default">Cancel</a>
</div>
