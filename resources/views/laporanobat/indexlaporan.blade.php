<!DOCTYPE html>
<html>
<head>
    <title>Laporan Stock Obat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <center>
            <h4>Laporan Stock Obat</h4>
            <h5>Periode {{$awal}} s/d {{$akhir}}</h5>
        </center>
        <br/>
        <a href="/downobat_pdf/{{$awal}}/{{$akhir}}" class="btn btn-primary" target="_blank"><i class="fa fa-cloud-download"></i>CETAK PDF</a>
         <!-- <a href="/print" class="btn btn-success" target="_blank"><i class="fa fa-print"></i>PRINT</a> -->
        <p></p>
        <table class='table table-bordered'>
             <thead>
                <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Satuan</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($data as $p)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$p->code}}</td>
                    <td>{{$p->nama}}</td>
                    <td>{{$p->jenis}}</td>
                    <td>{{$p->satuan}}</td>
                    <td>{{$p->harga_beli}}</td>
                    <td>{{$p->harga_jual}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>