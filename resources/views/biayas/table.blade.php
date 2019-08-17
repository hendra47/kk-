<div class="table-responsive">
    <table class="table" id="biayas-table">
        <thead>
            <tr>
                <th>Nama</th>
        <th>Type</th>
        <th>Nilai</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($biayas as $biaya)
            <tr>
                <td>{!! $biaya->nama !!}</td>
            <td>{!! $biaya->type !!}</td>
            <td>{!! $biaya->nilai !!}</td>
                <td>
                    {!! Form::open(['route' => ['biayas.destroy', $biaya->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('biayas.show', [$biaya->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('biayas.edit', [$biaya->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
