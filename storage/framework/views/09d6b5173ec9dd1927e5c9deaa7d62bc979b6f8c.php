<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Pedagang</title>
</head>
<table align="center">
    <tr>
        <td>
            <img src="<?php echo e(asset('assets/img/logo_bjb.png')); ?>" width="150" height="120">
        </td>
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
        <td colspan="2">
            <hr>
        </td>
    </tr>
</table>

<div class="form-group">
    <br>
    <h1>
        <center>Kwitansi Pembayaran Pajak Pertama</center>
    </h1>
    <table border="0">
        <tr>
            <td width="150">No Register</td>
            <td width="200">: <?php echo e($pertama->pedagang->no_register); ?></td>
        </tr>
    </table>
    <table border="0">
        <tr>
            <td width="150">NIK</td>
            <td width="200">: <?php echo e($pertama->pedagang->nik); ?></td>
        </tr>
    </table>
    <table border="0">
        <tr>
            <td width="150">Nama Pedagang</td>
            <td width="200">: <?php echo e($pertama->pedagang->nama); ?></td>
        </tr>
    </table>
    <table border="0">
        <tr>
            <td width="150">Nomor Toko</td>
            <td width="200">: <?php echo e($pertama->pedagang->toko->no_toko); ?></td>
        </tr>
    </table>
    <table border="0">
        <tr>
            <td width="150">Jenis Toko</td>
            <td width="200">: <?php echo e($pertama->pedagang->toko->jenis_toko); ?></td>
        </tr>
    </table>
    <table border="0">
        <tr>
            <td width="150">Ukuran</td>
            <td width="200">: <?php echo e($pertama->pedagang->toko->ukuran); ?></td>
        </tr>
    </table>
    <table border="0">
        <tr>
            <td width="150">Massa Kontrak</td>
            <td width="200">: <?php echo e($pertama->perbulan); ?> Bulan</td>
        </tr>
    </table>
    <table border="0">
        <tr>
            <td width="150">Harga Pajak</td>
            <td width="200">: Rp.<?php echo e(currency($pertama->pajak_id)); ?></td>
        </tr>
    </table>
    <table border="0">
        <tr>
            <td width="150">Total</td>
            <td width="200">: Rp.<?php echo e(currency($pertama->total)); ?></td>
        </tr>
    </table>
    <table border="0">
        <tr>
            <td width="150">Kembali</td>
            <td width="200">: Rp.<?php echo e(currency($pertama->kembali)); ?></td>
        </tr>
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

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pertama/detail_pertama.blade.php ENDPATH**/ ?>