<?php $__env->startSection('content'); ?>
<!-- wishlist Content -->
<style>
    .wishlist-content .media-main .media img {
        width: auto;
         !important;
        height: 160px;
        border: 1px solid #ddd;
        margin-right: 1rem;
    }

    .wishlist-content .media-main .media {
        padding: 20px 2px;
         !important;
    }

    .price span {
        color: #6c757d;
        text-decoration: line-through;
        margin-left: 10px;
        font-size: 1.075rem;
        line-height: 1.5;
        color: #6c757d !important;
    }

    h5 {

        text-align: center;
        line-height: 250px;

    }

</style>
<section class="wishlist-content my-4">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="heading">
                    <h2>
                        <?php echo app('translator')->get('website.My Account'); ?>
                    </h2>
                    <hr>
                </div>

                <ul class="list-group">
                    <li class="list-group-item">
                        <a class="nav-link" href="<?php echo e(URL::to('/profile')); ?>">
                            <i class="fas fa-user"></i>
                            <?php echo app('translator')->get('website.Profile'); ?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a class="nav-link" href="<?php echo e(URL::to('/wishlist')); ?>">
                            <i class="fas fa-heart"></i>
                            <?php echo app('translator')->get('website.Wishlist'); ?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a class="nav-link" href="<?php echo e(URL::to('/orders')); ?>">
                            <i class="fas fa-shopping-cart"></i>
                            <?php echo app('translator')->get('website.Orders'); ?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a class="nav-link" href="<?php echo e(URL::to('/points')); ?>">
                            <i class="fas fa-coins"></i>
                            <?php echo app('translator')->get('website.Points'); ?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a class="nav-link" href="<?php echo e(URL::to('/shipping-address')); ?>">
                            <i class="fas fa-map-marker-alt"></i>
                            <?php echo app('translator')->get('website.Shipping Address'); ?>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a class="nav-link" href="<?php echo e(URL::to('/logout')); ?>">
                            <i class="fas fa-power-off"></i>
                            <?php echo app('translator')->get('website.Logout'); ?>
                        </a>
                    </li>
                </ul>

            </div>

            <div class="col-12 col-lg-9 media-main" style="padding: 21px;">
                <div class="heading">
                    <h2>
                        <?php echo app('translator')->get('website.Points'); ?>
                    </h2>
                    <hr>
                </div>
                <?php if($result['finalpoints'] !=null ): ?>
                <div class="coupandiv">

                    <h2> <?php echo app('translator')->get('website.Points'); ?> : <?php echo e($result['finalpoints']->points); ?></h2>

                </div>

                <div class="container mt-5">
                    <div class="d-flex justify-content-center row">
                        <div class="col-md-4">
                            <div class="coupon p-3 bg-white">
                                <div class="row no-gutters">

                                    <div class="col-md-8">
                                        <div>
                                            <div class="d-flex flex-row justify-content-end off">
                                                <h1>AED 100</h1><span>OFF</span>
                                            </div>
                                            <div class="d-flex flex-row justify-content-between off px-3 p-2">
                                                <span class="border border-success px-3 rounded code pointcoupan"
                                                    data-savemonet="100">Generate</span></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="coupon p-3 bg-white">
                                <div class="row no-gutters">

                                    <div class="col-md-8">
                                        <div>
                                            <div class="d-flex flex-row justify-content-end off">
                                                <h1>AED 1000</h1><span>OFF</span>
                                            </div>
                                            <div class="d-flex flex-row justify-content-between off px-3 p-2">
                                                <span class="border border-success px-3 rounded code pointcoupan"
                                                    data-savemonet="1000">Generate</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="coupon p-3 bg-white">
                                <div class="row no-gutters">

                                    <div class="col-md-8">
                                        <div>
                                            <div class="d-flex flex-row justify-content-end off">
                                                <h1>AED 10000</h1><span>OFF</span>
                                            </div>
                                            <div class="d-flex flex-row justify-content-between off px-3 p-2">
                                                <span class="border border-success px-3 rounded code pointcoupan"
                                                    data-savemonet="10000">Generate</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table">

                    <thead>
                        <tr>
                            <th class="col-12 col-md-2">S.no</th>
                            <th class="col-12 col-md-4">Coupon Code</th>
                            <th class="col-12 col-md-3">Price</th>
                            <th class="col-12 col-md-3">Status</th>
                            <th class="col-12 col-md-3">Validity date</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if($result['customerpointcoupon']->count() > 0): ?>
                        <?php $__currentLoopData = $result['customerpointcoupon']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pointcoupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td>
                                <div class="clipboard">
                                    <input onclick="copy('<?php echo e($pointcoupon->coupon_code); ?>',this)" val="<?php echo e($pointcoupon->coupon_code); ?>" class="copy-input" value="<?php echo e($pointcoupon->coupon_code); ?>"
                                        id="copyClipboard" readonly>
                                    <button class="copy-btn" id="copyButton" onclick="copy('<?php echo e($pointcoupon->coupon_code); ?>',this)" value="<?php echo e($pointcoupon->coupon_code); ?>"><i
                                            class="far fa-copy"></i></button>
                                </div>
                                <div id="copied-success" class="copied">
                                    <span>Copied!</span>
                                </div>
                                <style>
                                    .coupon {
                                        border-radius: 12px;
                                        box-shadow: 5px 8px 10px #d6d5d533;
                                        border: 1px solid #000
                                    }

                                    body {
                                        background: rgb(251, 253, 255)
                                    }

                                    .code:hover {
                                        background: green;
                                        color: #fff;
                                        cursor: pointer
                                    }

                                    .clipboard {
                                        position: relative;
                                        `
                                    }

                                    /* You just need to get this field */
                                    .copy-input {
                                        max-width: 275px;
                                        width: 100%;
                                        cursor: pointer;
                                        background-color: #eaeaeb;
                                        border: none;
                                        color: #6c6c6c;
                                        font-size: 14px;
                                        border-radius: 5px;
                                        padding: 15px 45px 15px 15px;
                                        font-family: 'Montserrat', sans-serif;
                                    }

                                    .copy-input:focus {
                                        outline: none;
                                    }

                                    .copy-btn {
                                        width: 40px;
                                        background-color: #eaeaeb;
                                        font-size: 18px;
                                        padding: 6px 9px;
                                        border-radius: 5px;
                                        border: none;
                                        color: #6c6c6c;
                                        margin-left: 90px;
                                        transition: all .4s;
                                    }

                                    .copy-btn:hover {
                                        transform: scale(1.3);
                                        color: #1a1a1a;
                                        cursor: pointer;
                                    }

                                    .copy-btn:focus {
                                        outline: none;
                                    }

                                    .copied {
                                        font-family: 'Montserrat', sans-serif;
                                        width: 100px;
                                        opacity: 0;
                                        position: fixed;
                                        bottom: 20px;
                                        left: 0;
                                        right: 0;
                                        margin: auto;
                                        color: #fff;
                                        padding: 15px 15px;
                                        background-color: #000;
                                        border-radius: 5px;
                                        transition: .4s opacity;
                                    }

                                </style>
                            </td>
                            <td>AED <?php echo e($pointcoupon->coupon_price); ?></td>
                            <td>
                                <span class="alert alert-success">Pending</span>
                            </td>
                            <td>

                                <?php echo e(date("d/m/Y",strtotime($pointcoupon->coupon_expiry))); ?>






                            </td>


                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php else: ?>
                        <tr>
                            <td colspan="4"><?php echo app('translator')->get('website.No record found'); ?></td>
                        </tr>
                        <?php endif; ?>



                    </tbody>
                </table>

                <?php else: ?>

                <h5> <?php echo app('translator')->get('website.No record found'); ?> </h5>

                <?php endif; ?>
                <!-- ............the end..... -->
            </div>
        </div>
    </div>
</section>
<script>
    function copy(code,obj) {
        // console.log(obj.value);
        // return 0;
//   let copyText = document.getElementById("copyClipboard");
  var copySuccess = document.getElementById("copied-success");
//   obj.select();
//   obj.setSelectionRange(0, 99999); 
  navigator.clipboard.writeText(code);
// window.alert('text copied');
 copySuccess.style.opacity = "1";
//  setTimeout(function(){ copySuccess.style.opacity = "1" }, 2000);
 setInterval(() => {
	copySuccess.style.opacity = "0"
                      }, 1500);
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\customecommercea\resources\views/web/points.blade.php ENDPATH**/ ?>