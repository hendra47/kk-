

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
    {!! Form::label('jk', 'Jenis Kelamin:') !!}
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

<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo:') !!}
    <!-- {!! Form::file('photo', null, ['class' => 'form-control']) !!} -->
    <img src="{{ asset('/img/'.$profile->photo) }}" class="img-change form-control"/>
    <input type="file" name="photo" class="form-control" value="">
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="/" class="btn btn-default">Cancel</a>
</div>
