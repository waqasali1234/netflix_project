<?php $__env->startSection('head_title', trans('words.payment_method').' | '.getcong('site_name') ); ?>

<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection('content'); ?>


<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
         <li><a href="<?php echo e(URL::to('dashboard')); ?>"><?php echo e(trans('words.dashboard_text')); ?></a></li>
         <li><?php echo e(trans('words.payment_method')); ?></li>
      </ul>
    </div>
  </div>
  </div>
</div>

<div class="main-wrap">
  <div class="section section-padding">
    <div class="container">
        <div class="membership_plan_block">

        <div class="row">
          <div class="col-md-6 col-sm-4 col-xs-12 membership_plan_dtl">
            <h5><?php echo e(trans('words.payment_method')); ?></h5>
            <p><?php echo e(trans('words.you_have_selected')); ?> <b></b></p>
            <p><?php echo e(trans('words.you_are_logged')); ?> <b><?php echo e(Auth::User()->email); ?></b> <?php echo e(trans('words.if_you_would_like')); ?><br><?php echo e(trans('words.different_account_subscription')); ?>, <a href="<?php echo e(URL::to('logout')); ?>"><?php echo e(trans('words.logout')); ?></a> <?php echo e(trans('words.now')); ?>.</p>

          </div>

        <div class="col-md-6 col-sm-4 col-xs-12">
        <?php if(getcong('paypal_payment_on_off')==1): ?>
        <div class="col-md-6 col-sm-4 col-xs-12">
          <div class="member-ship-option select_plan">
            <span><img src="<?php echo e(URL::asset('site_assets/images/icons/ic_paypal.png')); ?>" alt="paypal" /></span>
            <p><?php echo e(trans('words.pay_with_paypal')); ?></p>
            <form class="" method="POST" id="payment-form" role="form" action="<?php echo URL::route('addmoney.paypal'); ?>" >
            <?php echo e(csrf_field()); ?>

            <input id="plan_id" type="hidden" class="form-control" name="plan_id" value="">
            <input id="amount" type="hidden" class="form-control" name="amount" value="">
            <input id="plan_name" type="hidden" class="form-control" name="plan_name" value="">
            <button type="submit" class="pure-button btn btn-primary" style="margin-top: 14px;"><?php echo e(trans('words.pay_now')); ?></button>
            </form>
           </div>
        </div>
        <?php endif; ?>

            <?php if(getcong('bitcoin_payment_on_off')==1): ?>
                <div class="col-md-6 col-sm-4 col-xs-12">
                    <div class="member-ship-option select_plan">
                        <span><img src="<?php echo e(url('images/icons/ic_bitcoin.png')); ?>" alt="stripe"/></span>
                        <p>Pay With Bitcoin</p>








                        <form method="post" action="<?php echo e(url('payment_save')); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="text" name="amount" value="<?php echo e($price1); ?>">
                            <input type="text" name="plan" value="<?php echo e($plan); ?>">
                            <input type="hidden" name="movie_id" value="<?php echo e($movie_id); ?>">
                            <input type="hidden" name="user_id" value="<?php echo e($user_id); ?>">
                            <input type="hidden" name="video_slug" value="<?php echo e($video_slug); ?>">
                            <input type="hidden" name="video_access" value="<?php echo e($video_access); ?>">
                            <input type="hidden" name="video_title" value="<?php echo e($video_title); ?>">
                            <input type="hidden" name="duration" value="<?php echo e($duration); ?>">
                            <input type="hidden" name="video_image_thumb" value="<?php echo e($video_image_thumb); ?>">
                            <button type="submit">pay now</button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

        <?php if(getcong('stripe_payment_on_off')==1): ?>
        <div class="col-md-6 col-sm-4 col-xs-12">
          <div class="member-ship-option select_plan">
            <span><img src="<?php echo e(URL::asset('site_assets/images/icons/ic_stripe.png')); ?>" alt="stripe" /></span>
            <p><?php echo e(trans('words.pay_with_stripe')); ?></p>
            <a href="<?php echo e(URL::to('stripe/'.$plan_info->id)); ?>"><?php echo e(trans('words.pay_now')); ?></a>
          </div>
        </div>
        <?php endif; ?>

        <?php if(getcong('razorpay_payment_on_off')==1): ?>
        <div class="col-md-6 col-sm-4 col-xs-12">
          <div class="member-ship-option select_plan">
            <span><img src="<?php echo e(URL::asset('site_assets/images/icons/razorpay.png')); ?>" alt="razorpay" /></span>
            <p><?php echo e(trans('words.pay_with_razorpay')); ?></p>
            <a href="<?php echo e(URL::to('razorpay/')); ?>"><?php echo e(trans('words.pay_now')); ?></a>
          </div>
        </div>
        <?php endif; ?>


        <?php if(getcong('paystack_payment_on_off')==1): ?>
        <div class="col-md-6 col-sm-4 col-xs-12">
          <?php echo Form::open(array('url' => 'pay','class'=>'','id'=>'','role'=>'form','method'=>'POST')); ?>

          <input type="hidden" name="amount" value="<?php echo e(number_format($plan_info->plan_price,2)); ?>">
          <div class="member-ship-option select_plan">
            <span><img src="<?php echo e(URL::asset('site_assets/images/icons/paystack.png')); ?>" alt="paystack" /></span>
            <p><?php echo e(trans('words.pay_with_paystack')); ?></p>
            <button type="submit" class="pure-button btn btn-primary"><?php echo e(trans('words.pay_now')); ?></button>
          </div>
          <?php echo Form::close(); ?>

        </div>

        <?php endif; ?>
      </div>
        </div>
    </div>
  </div>
</div>

    <script src="https://static.cryptochill.com/static/js/sdk.js"></script>
    <script>

        function onPaymentOpen(data, code) {

            // console.log(data)


            $.post("<?php echo e(route('bitcoin_success')); ?>",
                {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    data: data,
                },
                function(data, status){
                    // console.log('done')
                    // location.reload();
                    return false;
                });
        }

        CryptoChill.setup({
            account: "<?php echo e(\App\Settings::first()->bitcoin_account_id); ?>",
            profile: "<?php echo e(\App\Settings::first()->bitcoin_profile_id); ?>",

            // Event callbacks
            onOpen: onPaymentOpen,
            // onSuccess: onPaymentSuccess,
            // onCancel: onPaymentCancel
        })
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\streamit\resources\views/pages/payment_method.blade.php ENDPATH**/ ?>