<!-- Id Group Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_group', 'Jabatan:') !!}
    {!! Form::select('id_group', $groups, null, ['class' => 'form-control']) !!}

</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Jk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jk', 'Jk:') !!}
    {!! Form::select('jk', array('L' => 'Laki-Laki', 'P' => 'Peremnpuan'), 'L',['class' => 'form-control']); !!}

</div>

<!-- Alamat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Alamat', 'Alamat:') !!}
    {!! Form::text('Alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-3">
                        {!! Form::label('is_doctor', 'Dokter:') !!}
                        {!! Form::select('is_doctor', array('1' => 'Ya', '0' => 'Tidak'), 'T',['class' => 'form-control']); !!}
                    </div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
