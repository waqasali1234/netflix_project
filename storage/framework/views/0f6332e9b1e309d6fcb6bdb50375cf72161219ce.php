<?php $__env->startSection('head_title', trans('words.latest_movies').' | '.getcong('site_name') ); ?>

<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection('content'); ?>


<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
      <li><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(trans('words.home')); ?></a></li>
      <li><?php echo e(trans('words.latest_movies')); ?></li>
      </ul>  
    </div>
    </div>
  </div>
</div>

<?php if(get_ads('movie_list_ad_top')->status!=0): ?>
        <div class="add_banner_section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <?php echo get_ads('movie_list_ad_top')->ad_code; ?>

              </div>
            </div>
          </div>  
        </div>
        <?php endif; ?>

 <div class="main-wrap">
  <div class="section section-padding tv_show vfx_video_list_section text-white">
    <div class="container">
      <div class="row">
 
        <div class="show-listing">
      
           <?php $__currentLoopData = explode(",",$home_sections->section1_latest_movie); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latest_movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>            
            <?php if(App\Movies::getMoviesInfo($latest_movie,'status')==1): ?>
            
            <?php if(Auth::check()): ?>              
                <a class="icon" href="<?php echo e(URL::to('movies/'.App\Movies::getMoviesInfo($latest_movie,'video_slug').'/'.App\Movies::getMoviesInfo($latest_movie,'id'))); ?>">              
            <?php else: ?>
               <?php if(App\Movies::getMoviesInfo($latest_movie,'video_access')=='Paid'): ?>
                <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
               <?php else: ?>
                <a class="icon" href="<?php echo e(URL::to('movies/'.App\Movies::getMoviesInfo($latest_movie,'video_slug').'/'.App\Movies::getMoviesInfo($latest_movie,'id'))); ?>">
               <?php endif; ?>  
            <?php endif; ?>
              
            <div class="col-md-2 col-sm-4 col-xs-6">
            <div class="vfx_video_item"> 
              <div class="thumb-wrap">
              <img src="<?php echo e(URL::to('upload/source/'.App\Movies::getMoviesInfo($latest_movie,'video_image_thumb'))); ?>" alt="Movie Thumb"> <?php if(App\Movies::getMoviesInfo($latest_movie,'video_access')=='Paid'): ?><span class="premium_video"><i class="fa fa-lock"></i>Premium</span><?php endif; ?>
                <div class="thumb-hover">            
                  <i class="icon fa fa-play"></i><span class="ripple"></span>
            
                </div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title"><?php echo e(Str::limit(stripslashes(App\Movies::getMoviesInfo($latest_movie,'video_title')),12)); ?></h4>
                <p class="vfx_video_length"><i class="fa fa-clock-o"></i> <?php echo e(App\Movies::getMoviesInfo($latest_movie,'duration')); ?></p>
               </div>
            </div>
           </div> 
           </a> 
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
           
       
        </div>    
      </div>
    </div>
  </div>
</div>

<?php if(get_ads('movie_list_ad_bottom')->status!=0): ?>
  <div class="add_banner_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php echo get_ads('movie_list_ad_bottom')->ad_code; ?>

        </div>
      </div>
    </div>  
  </div>
  <?php endif; ?>

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\streamit\resources\views/pages/movies_latest.blade.php ENDPATH**/ ?>