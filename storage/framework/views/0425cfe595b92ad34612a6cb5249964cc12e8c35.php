<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Pajak</title>
</head>
<table align="center">
    <tr>
        <td><img src="<?php echo e('assets/img/logo_bjb.png'); ?>" width="150" height="120"></td>
        <td><center>
            <font size="4"><b>PEMERINTAH KOTA BANJARBARU</b></font><br>
            <font size="5"><b>DINAS PERDAGANGAN KOTA BANJARBARU <br> UPT. PASAR BAUNTUNG BANJARBARU</b></font><br>
            <font size="2"><i>Alamat: Jl. R. O. Ulin Banjarbaru Telp (0511) 4772154, email : uptpasarbauntungbanjarbaru@gmail.com</i></font></center>
        </td>
    </tr>
    <tr>
        <td colspan="2"><hr></td>
    </tr>
</table>
<br>
<table align="center">
    <tr>
        <td>Nomor</td>
        <td width="635">:  .../.../UPT.Pasar.Bauntung/2022</td>
    </tr>
    <tr>
        <td>Lampiran</td>
        <td width="635">: 1 (satu) Lembar</td>
    </tr>
    <tr>
        <td>Perihal</td>
        <td width="635">: Laporan Data Pajak</td>
    </tr>
</table>
<div class="form-group">
<br>
<br>
    <table border="1" align="center">
        <thead>
            <tr>
                <th width="30">No.</th>
                <th width="300">Jenis Toko</th>
                <th width="600">Harga Pajak</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $pajaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pajak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>

                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($pajak->jenis_toko); ?></td>
                <td>Rp.<?php echo e(currency($pajak->harga_pajak)); ?></td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    
                    
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pajak/cetak_pajak.blade.php ENDPATH**/ ?>