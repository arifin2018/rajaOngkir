<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <form action="/" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label>provinsi asal</label>
                        <select name="province_origin" class="form-control">
                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($province); ?>"><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                      <div class="form-group">
                        <label>Kota asal</label>
                        <select name="city_origin" class="form-control">
                            <option>Kota</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>provinsi tujuan</label>
                        <select name="province_destination" class="form-control">
                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($province); ?>"><?php echo e($value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                      </div>
                        <div class="form-group">
                            <label>Kota asal</label>
                            <select name="city_destination" class="form-control">
                                <option>Kota</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Courir</label>
                            <select name="courier" class="form-control">
                                <?php $__currentLoopData = $Couriers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courier => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($courier); ?>"><?php echo e($value); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Berat gram</label>
                            <input type="number" name="weight" id="" class="form-control" value="1000">
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('select[name="province_origin"]').on('change', function(){
                let provinceId = $(this).val();
                if(provinceId){
                    jQuery.ajax({
                        url: '/province/'+provinceId+'/cities',
                        type: 'GET',
                        dataType: "JSON",
                        success:function(data){
                            $('select[name="city_origin"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="city_origin"]').append('<option value="'+key+'">'+value+'</option>');
                            });
                        },
                    });
                } else{
                    $('select[name="city_origin"]').empty();
                }
            });
            
            $('select[name="province_destination"]').on('change', function(){
                let provinceId = $(this).val();
                if(provinceId){
                    jQuery.ajax({
                        url: '/province/'+provinceId+'/cities',
                        type: 'GET',
                        dataType: "JSON",
                        success:function(data){
                            $('select[name="city_destination"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="city_destination"]').append('<option value="'+key+'">'+value+'</option>');
                            });
                        },
                    });
                } else{
                    $('select[name="city_destination"]').empty();
                }
            })
        });
    </script>
</body>

</html>
<?php /**PATH /home/arifin/Documents/belajar/Laravel/rajaOngkir/resources/views/welcome.blade.php ENDPATH**/ ?>