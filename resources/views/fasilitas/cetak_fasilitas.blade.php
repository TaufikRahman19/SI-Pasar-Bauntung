<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Fasilitas</title>
</head>
<table align="center">
    <tr>
        <td><img src="{{'assets/img/logo_bjb.png'}}" width="150" height="120"></td>
        <td><center>
            <font size="4"><b>PEMERINTAH KOTA BANJARBARU</b></font><br>
            <font size="5"><b>DINAS PERDAGANGAN KOTA BANJARBARU <br> UPT. PASAR BAUNTUNG BANJARBARU</b></font><br>
            <font size="2"><i>Alamat: Jl. R. O. Ulin Banjarbaru Telp (0511) 4772154, email : uptpasarbauntungbanjarbaru@gmail.com</i></font></center>
        </td>
    </tr>
    <tr>
<br>
    </tr>
</table>
<hr>
<br>
<table align="center">
    <tr>
        <td>Nomor</td>
        <td width="635">:  BJB/IN/UPT.Pasar.Bauntung/2022</td>
    </tr>
    <tr>
        <td>Lampiran</td>
        <td width="635">: 1 (satu) Lembar</td>
    </tr>
    <tr>
        <td>Perihal</td>
        <td width="635">: Laporan Fasilitas</td>
    </tr>
</table>
<div class="form-group">
    <br>
    <br>
    <table border="1" align="center">
        <thead>
            <tr>
                <th width="50">No.</th>
                {{-- <th width="50">Kode Barang</th> --}}
                <th width="200">Nama Barang</th>
                <th width="200">Tanggal Masuk</th>
                <th width="50">Jumlah</th>
                <th width="200">Kualitas</th>
                <th width="600">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fasilitass as $fasilitas)
            <tr>

                <td>{{$loop->iteration}}</td>
                {{-- <td>{{$fasilitas->kode_barang}}</td> --}}
                <td>{{$fasilitas->nama_barang}}</td>
                <td>{{$fasilitas->tgl_masuk}}</td>
                <td><center>{{$fasilitas->jumlah}}</center></td>
                <td><center>{{$fasilitas->kualitas}}</center></td>
                <td>{{$fasilitas->keterangan}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br>
<br>
<br>
<table align="right">
    <tr>
        <td>An. Kepala UPT. Pasar Bauntung Banjarbaru <br><center> Kasubbag TU,</center></td>
    </tr>
    <tr>
        <td height="60"></td>
    </tr>
    <tr>
        <td><center><b><u>LISA INDRANYLA,S.KOM</u></b></center></td>
    </tr>
    <tr>
        <td><center>NIP. 19780823 200604 2 024</center></td>
    </tr>
</table>
<body>
    {{-- <div class="form-group">
        <p align="center"><b>Laporan Data Fasilitas</b></p>
        <table align="center" border="1">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Kualitas</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fasilitass as $fasilitas)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$fasilitas->nama_barang}}</td>
                    <td>{{$fasilitas->jumlah}}</td>
                    <td>{{$fasilitas->kualitas}}</td>
                    <td>{{$fasilitas->keterangan}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}

    <script type="text/javascript">
        window.print();
</script>
</body>
</html>
