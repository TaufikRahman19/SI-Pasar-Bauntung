<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/atlantis.min.css')); ?>">
    <title>Laporan Data Pedagang</title>
</head>
<table border="0" align="center">
    <tr>
        <td>
            <img src="<?php echo e(asset('assets/img/logo_bjb.png')); ?>" width="150" height="120">
        </td>
        <td>
            <center>
                <font size="4"><b>PEMERINTAH KOTA BANJARBARU</b></font><br>
                <font size="5"><b>DINAS PERDAGANGAN KOTA BANJARBARU <br> UPT. PASAR BAUNTUNG BANJARBARU</b></font>
                <br>
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

<div class="form-group">
    <br>
    <h1>
        <center>Kartu Pedagang Pasar Bauntung Banjarbaru</center>
    </h1>
    <br>
    <center><img src="<?php echo e(asset('pasfoto/' . $pedagang->pasfoto)); ?>" width="10%" class="rounded-circle"></center>
    <br>
    <center>
        <table border="0">
            <tr>
                <td width="150">NIK</td>
                <td width="250">: <?php echo e($pedagang->nik); ?></td>
            </tr>
            <tr>
                <td width="150">No Register</td>
                <td width="250">: <?php echo e($pedagang->no_register); ?></td>
            </tr>
            <tr>
                <td width="150">Nama</td>
                <td width="250">: <?php echo e($pedagang->nama); ?></td>
            </tr>
            <tr>
                <td width="150">Jenis Dagang</td>
                <td width="250">: <?php echo e($pedagang->jenis_dagang); ?></td>
            </tr>
            <tr>
                <td width="150">No Toko</td>
                <td width="250">: <?php echo e($pedagang->toko->no_toko); ?></td>
            </tr>
            <tr>
                <td width="150">Alamat</td>
                <td width="250">: <?php echo e($pedagang->alamat); ?></td>
            </tr>
            <tr>
                <td width="150">Massa Kontrak</td>
                <td width="250">: <?php echo e($pedagang->massa_kontrak); ?> Bulan</td>
            </tr>
        </table>
    </center>
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

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pedagang/kartu_pedagang.blade.php ENDPATH**/ ?>