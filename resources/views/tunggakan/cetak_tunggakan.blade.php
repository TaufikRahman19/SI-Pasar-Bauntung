<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Tunggakan Pedagang</title>
</head>
<table align="center">
    <tr>
        <td><img src="{{ 'assets/img/logo_bjb.png' }}" width="150" height="120"></td>
        <td>
            <center>
                <font size="4"><b>PEMERINTAH KOTA BANJARBARU</b></font><br>
                <font size="5"><b>DINAS PERDAGANGAN KOTA BANJARBARU <br> UPT. PASAR BAUNTUNG BANJARBARU</b></font><br>
                <font size="2"><i>Alamat: Jl. R. O. Ulin Banjarbaru Telp (0511) 4772154, email :
                        uptpasarbauntungbanjarbaru@gmail.com</i></font>
            </center>
        </td>
    </tr>
    <tr>
<br>
        </td>
    </tr>
</table>
<hr>
<br>
<table align="center">
    <tr>
        <td>Nomor</td>
        <td width="635">: BJB/IN/UPT.Pasar.Bauntung/2022</td>
    </tr>
    <tr>
        <td>Lampiran</td>
        <td width="635">: 1 (satu) Lembar</td>
    </tr>
    <tr>
        <td>Perihal</td>
        <td width="635">: Laporan Pembayaran Pajak</td>
    </tr>
</table>
<div class="form-group">
    <br>
    <br>
    <table border="1" align="center">
        <thead>
            <tr>
                <th width="50">No.</th>
                <th width="200">Nama Pedagang</th>
                <th width="200">No Register</th>
                <th width="200">No Toko</th>
                <th width="200">Jenis Toko</th>
                <th width="200">Massa Tunggakan</th>
                <th width="200">Harga Pajak</th>
                <th width="200">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tunggakans as $tunggakan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tunggakan->pedagang->nama }}</td>
                    <td>{{ $tunggakan->pedagang->no_register }}</td>
                    <td>{{ $tunggakan->pedagang->toko->no_toko }}</td>
                    <td>{{ $tunggakan->pedagang->toko->jenis_toko }}</td>
                    <td>{{ $tunggakan->bulan }} Bulan</td>
                    <td>Rp.{{ currency($tunggakan->pajak_id) }}</td>
                    <td>Rp.{{ currency($tunggakan->total) }}</td>
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
        <td>An. Kepala UPT. Pasar Bauntung Banjarbaru <br>
            <center> Kasubbag TU,</center>
        </td>
    </tr>
    <tr>
        <td height="60"></td>
    </tr>
    <tr>
        <td>
            <center><b><u>LISA INDRANYLA,S.KOM</u></b></center>
        </td>
    </tr>
    <tr>
        <td>
            <center>NIP. 19780823 200604 2 024</center>
        </td>
    </tr>
</table>

<body>
    {{-- <div class="form-group">
        <p align="center"><b>Laporan Data Pedagang</b></p>
        <table border='1' align="center">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Jenis Dagang</th>
                    <th>Tipe Toko</th>
                    <th>Alamat</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($pedagangs as $pedagang)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$pedagang->nama}}</td>
                    <td>{{$pedagang->nik}}</td>
                    <td>{{$pedagang->jenis_dagang}}</td>
                    <td>{{$pedagang->toko->jenis_toko}}</td>
                    <td>{{$pedagang->alamat}}</td>
                    {{-- <td>
                        <button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('pedagang.edit', $pedagang->id)}}">Edit</a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" data-toggle="modal" data-target="#hapusModal{{$pedagang->id}}">Hapus</a>
                        </div>
                    </td> --}}
    {{-- </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
