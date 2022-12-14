<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">   
    <title>Document</title>
</head>
<style>
    html, body
    {
    width: 302px;
    }
     
    .title{
        text-align: center;
    }

    

    
    
</style>
<body>
    <div id="printku">
        
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th colspan="2" style="text-align: center">
                        TOKO SUMBER REJEKI
                    </th>
                </tr>
                <tr>
                    <th colspan="2" style="text-align: center">
                        LAMONGAN
                    </th>
                </tr>
            </thead>
            <tbody style="border-top: 20px solid white;">
                <tr>
                    <td style="text-align: right"> 
                        Nama : 
                    </td>
                    <td>
                        <?php echo e($shipping->nama_pembeli); ?>

                    </td>
                </tr>

                <tr>
                    <td style="text-align: right">
                        Alamat : 
                    </td>
                    <td>
                        <?php echo e($shipping->alamat_pembeli); ?>

                    </td>
                </tr>

                <tr>
                    <td style="text-align: right; width:75px">
                        Tanggal : 
                    </td>
                    <td>
                        <?php echo e($shipping->tanggal_pengiriman); ?>

                    </td>
                </tr>
                <tr>
                    <td style="text-align: right">
                        Supir : 
                    </td>
                    <td>
                        <?php echo e($shipping->driver->name??"-"); ?>

                    </td>
                </tr>

            </tbody>
        </table>
        
        <table style="width: 100%">
            <tbody style="border-bottom: 2px solid #999; border-top: 2px solid #999;">
                <?php $__currentLoopData = $shipping->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td> 
                        <?php echo e($loop->iteration); ?>. 
                    </td>
                    <td style="text-align: right;" > 
                        <?php echo e($item->product->nama_produk); ?>

                    </td>
                    <td style="text-align: right">
                        @ <?php echo e($item->quantity); ?>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" style="text-align: center;" > Total Barang </td>
                    <td style="text-align: right;" > <?php echo e($shipping->items->sum('quantity')); ?> </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;" > Total Harga </td>
                    <td style="text-align: right;" > Rp. <?php echo e(number_format($shipping->grandtotal,2)); ?> </td>
                </tr>   
                
            </tfoot>
        </table>
        
    </div>

</body>
</html><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pengiriman/print_invoice.blade.php ENDPATH**/ ?>