<!-- User Id Field -->

<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Users:') !!}
    <!-- {!! Form::number('id_pasien', null, ['class' => 'form-control']) !!} -->
    {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
</div>

<!-- Menu Field -->

<div class="form-group col-sm-6">
    {!! Form::label('menu', 'Menu:') !!}
    {!! Form::select('menu',
         array('pendaftaran' => 'Pendaftaran',
          'rekam_medis' => 'Rekam Medis',
          'master_data' => 'Master Data',
          'kasir' => 'Kasir',
          'user_management' => 'User Management'),null,['class' => 'form-control']); !!}
</div>

<!-- Akses Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('akses', 'Akses:') !!}
    {!! Form::number('akses', null, ['class' => 'form-control']) !!}
</div> -->
<div class="form-group col-sm-6">
{!! Form::label('akses', 'Akses:') !!}
    <div class="flex-radio">
    <label>
        <input type="radio" name="akses" id="optionsRadios1" value="1">
        Yes
    </label>
    <label>
        <input type="radio" name="akses" id="optionsRadios2" value="2">
        No
    </label>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancel</a>
</div>
