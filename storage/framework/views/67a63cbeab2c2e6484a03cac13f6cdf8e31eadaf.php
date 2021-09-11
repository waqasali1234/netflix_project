<?php $__env->startSection('head_title', trans('words.dashboard_text').' | '.getcong('site_name') ); ?>

<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection('content'); ?>



























<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
         <li><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(trans('words.home')); ?></a></li>
         <li><?php echo e(trans('words.dashboard_text')); ?></li>
      </ul>
    </div>
    </div>
  </div>
</div>
<div class="main-wrap">
  <div class="section section-padding ">

    <div class="container">

       <?php if(Session::has('flash_message')): ?>
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  <?php echo e(Session::get('flash_message')); ?>

              </div>
        <?php endif; ?>
        <?php if(Session::has('success')): ?>
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  <?php echo e(Session::get('success')); ?>

              </div>
        <?php endif; ?>
        <?php if(Session::has('error_flash_message')): ?>
              <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  <?php echo e(Session::get('error_flash_message')); ?>

              </div>
        <?php endif; ?>
        <div class="col-md-12 col-sm-12 col-xs-12 profile-sec-1 card-1">
            <div class="col-md-3 col-sm-4">
              <div class="img-profile">
                <?php if(Auth::User()->user_image): ?>
                  <img src="<?php echo e(URL::asset('upload/'.Auth::User()->user_image)); ?>" class="img-rounded" alt="profile_img">
                <?php else: ?>
                  <img src="<?php echo e(URL::asset('site_assets/images/avatar.jpg')); ?>" class="img-rounded" alt="profile_img">
                <?php endif; ?>
              </div>
        <div class="profile_title_item">
          <h5><?php echo e(Auth::User()->name); ?></h5>
          <p><?php echo e(Auth::User()->email); ?></p>
          <a href="<?php echo e(URL::to('profile')); ?>" class="pure-button btn btn-primary"><?php echo e(trans('words.edit')); ?></a>
        </div>
            </div>
            <div class="col-md-9">
                <?php $__currentLoopData = $movies_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movies_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-md-2 col-sm-4 col-xs-6">
                                                            <div class="vfx_video_item">
                                                                <div class="thumb-wrap"> <img src="<?php echo e(URL::to('upload/source/'.$movies_data->video_image_thumb)); ?>" alt="<?php echo e($movies_data->video_title); ?>">

                                                                    <div class="thumb-hover">

                                                                        <i class="icon fa fa-play"></i><span class="ripple"></span>

                                                                    </div>
                                                                </div>
                                                                <div class="vfx_video_detail">
                                                                    <h4 class="vfx_video_title"><a href="<?php echo e(URL::to('movies/'.$movies_data->video_slug.'/'.$movies_data->movie_id)); ?>"><?php echo e(Str::limit(stripslashes($movies_data->video_title),12)); ?></a></h4>
                                                                    <p class="vfx_video_length"><i class="fa fa-clock-o"></i> <?php echo e($movies_data->duration); ?></p>
                                                                    <h4 class="vfx_video_title"><a href="<?php echo e('show_price/'.$movies_data->movie_id); ?>">Play Video</a></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>


                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>










































            </div>
        </div>
    </div>
  </div>
</div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\streamit\resources\views/pages/dashboard.blade.php ENDPATH**/ ?>