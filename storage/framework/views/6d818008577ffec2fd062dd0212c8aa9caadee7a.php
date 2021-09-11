<?php $__env->startSection('head_title', trans('words.subscription_plan').' | '.getcong('site_name') ); ?>

<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection('content'); ?>


    <div class="page-header">
        <div class="vfx_page_header_overlay">
            <div class="container">
                <div class="vfx_breadcrumb">
                    <ul>
                        <li><a href="<?php echo e(URL::to('dashboard')); ?>"><?php echo e(trans('words.home')); ?></a></li>
                        <li><?php echo e(trans('words.subscription_plan')); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="main-wrap">
        <div class="section section-padding">
            <div class="container">
                <div class="row">











                                            <div class="col-md-3 col-sm-4 col-xs-12">
                                                <div class="member-ship-option select_plan">
                                                    <h5 class="color-up"><?php echo e($price_packages->one_day_price); ?><span><?php echo e(getcong('currency_code')); ?></span><p class="premuim-memplan"></p></h5>
                                                    <p>One Day</p>
                                                    <a href="<?php echo e(URL::to('payment_method/'.$price_packages['id'].'?type=day')); ?>"><?php echo e(trans('words.select_plan')); ?></a>
                                                </div>
                                            </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="member-ship-option select_plan">
                            <h5 class="color-up"><?php echo e($price_packages->one_month_price); ?><span><?php echo e(getcong('currency_code')); ?></span><p class="premuim-memplan"></p></h5>
                            <p>One Month</p>

                            <a href="<?php echo e(URL::to('payment_method/'.$price_packages->id.'?type=month')); ?>"><?php echo e(trans('words.select_plan')); ?></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="member-ship-option select_plan">
                            <h5 class="color-up"><?php echo e($price_packages->one_year_price); ?><span><?php echo e(getcong('currency_code')); ?></span><p class="premuim-memplan"></p></h5>
                            <p>One Year</p>

                            <a href="<?php echo e(URL::to('payment_method/'.$price_packages->id.'?type=year')); ?>"><?php echo e(trans('words.select_plan')); ?></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="member-ship-option select_plan">
                            <h5 class="color-up"><?php echo e($price_packages->life_time_price); ?><span><?php echo e(getcong('currency_code')); ?></span><p class="premuim-memplan"></p></h5>
                            <p>Life Time</p>

                            <a href="<?php echo e(URL::to('payment_method/'.$price_packages->id.'?type=lifetime')); ?>"><?php echo e(trans('words.select_plan')); ?></a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\streamit\resources\views/pages/show_price.blade.php ENDPATH**/ ?>