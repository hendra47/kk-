<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $roles->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $roles->user_id !!}</p>
</div>

<!-- Menu Field -->
<div class="form-group">
    {!! Form::label('menu', 'Menu:') !!}
    <p>{!! $roles->menu !!}</p>
</div>

<!-- Akses Field -->
<div class="form-group">
    {!! Form::label('akses', 'Akses:') !!}
    <p>{!! $roles->akses !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $roles->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $roles->updated_at !!}</p>
</div>

