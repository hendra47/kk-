<div class="table-responsive">
    <table class="table" id="settings-table">
        <thead>
            <tr>
                <th>Nama Klinik</th>
        <th>Alamat</th>
        <th>Phone</th>
        <th>Logo</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($settings as $settings)
            <tr>
            <td>{!! $settings->nama_klinik !!}</td>
            <td>{!! $settings->alamat !!}</td>
            <td>{!! $settings->phone !!}</td>
            <td>
            <img class="tableLogo" src="{!! $settings->logo !!}">
            </td>
                <td>
                    {!! Form::open(['route' => ['settings.destroy', $settings->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('settings.show', [$settings->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('settings.edit', [$settings->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                      </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
