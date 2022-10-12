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
<br>
        </td>
    </tr>
</table>
<hr>
<h1><center><u> KWINTANSI</u></center></h1>

<div class="form-group">
<table border="0">
        <tr>
            <td width="100"></td>
            <td width="210">No Register</td>
            <td width="200">: <?php echo e($pembayaran->pedagang->no_register); ?></td>
        </tr>
    </table>
<table border="0">
        <tr>
            <td width="100"></td>
            <td width="210">NIK</td>
            <td width="200">: <?php echo e($pembayaran->pedagang->nik); ?></td>
        </tr>
    </table>
<table border="0">
        <tr>
            <td width="100"></td>
            <td width="210">Nama Pedagang</td>
            <td width="200">: <?php echo e($pembayaran->pedagang->nama); ?></td>
        </tr>
    </table>
<table border="0">
        <tr>
            <td width="100"></td>
            <td width="210">Nomor Toko</td>
            <td width="200">: <?php echo e($pembayaran->pedagang->toko->no_toko); ?></td>
        </tr>
    </table>
<table border="0">
        <tr>
            <td width="100"></td>
            <td width="210">Jenis Toko</td>
            <td width="200">: <?php echo e($pembayaran->pedagang->toko->jenis_toko); ?></td>
        </tr>
    </table>
<table border="0">
        <tr>
            <td width="100"></td>
            <td width="210">Ukuran</td>
            <td width="200">: <?php echo e($pembayaran->pedagang->toko->ukuran); ?></td>
        </tr>
    </table>
<table border="0">
        <tr>
            <td width="100"></td>
            <td width="210">Massa Kontrak</td>
            <td width="200">: <?php echo e($pembayaran->perbulan); ?> Bulan</td>
        </tr>
    </table>
<table border="0">
        <tr>
            <td width="100"></td>
            <td width="210">Harga Pajak</td>
            <td width="200">: Rp.<?php echo e(currency($pembayaran->pajak_id)); ?></td>
        </tr>
    </table>
<table border="0">
        <tr>
            <td width="100"></td>
            <td width="210">Total</td>
            <td width="200">: Rp.<?php echo e(currency($pembayaran->total)); ?></td>
        </tr>
    </table>
<table border="0">
        <tr>
            <td width="100"></td>
            <td width="210">Kembali</td>
            <td width="200">: Rp.<?php echo e(currency($pembayaran->kembali)); ?></td>
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
<?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pembayaran/detail_pembayaran.blade.php ENDPATH**/ ?>