<?php $__env->startSection('head_title', trans('words.search').' | '.getcong('site_name') ); ?>

<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection('content'); ?>


<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
      <li><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(trans('words.home')); ?></a></li>
      <li><?php echo e(trans('words.search_result_for')); ?> <?php echo e($_GET['s']); ?></li>
      </ul>  
    </div>
    </div>
  </div>
</div>

 <div class="main-wrap">
  <?php if(count($movies_list)>0 OR count($series_list)>0 OR count($sports_video_list)>0 OR count($live_tv_list)>0): ?>     
  
  <div class="section section-padding vfx_movie_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><?php echo e(trans('words.movies_text')); ?></h2>
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="show-listing">
      
      <?php $__currentLoopData = $movies_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movies_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if(Auth::check()): ?>              
          <a class="icon" href="<?php echo e(URL::to('movies/'.$movies_data->video_slug.'/'.$movies_data->id)); ?>"> 
      <?php else: ?>
         <?php if($movies_data->video_access=='Paid'): ?>
          <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
         <?php else: ?>
          <a class="icon" href="<?php echo e(URL::to('movies/'.$movies_data->video_slug.'/'.$movies_data->id)); ?>">
         <?php endif; ?>  
      <?php endif; ?>
      <div class="col-md-2 col-sm-4 col-xs-6">
            <div class="vfx_video_item">
              <div class="thumb-wrap"> <img src="<?php echo e(URL::to('upload/source/'.$movies_data->video_image_thumb)); ?>" alt="<?php echo e($movies_data->video_title); ?>">
                <?php if($movies_data->video_access=='Paid'): ?><span class="premium_video"><i class="fa fa-lock"></i>Premium</span><?php endif; ?>

                <div class="thumb-hover">           
                  <i class="icon fa fa-play"></i><span class="ripple"></span>
          
              </div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title"><?php echo e(Str::limit(stripslashes($movies_data->video_title),12)); ?></h4>
               </div>
            </div>
      </div>  
      </a>
     
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
 

        </div>    
      </div>
    </div>
  </div>
  <div class="section section-padding vfx_movie_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><?php echo e(trans('words.shows_text')); ?></h2>
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="show-listing series_listing_view">
      
       <?php $__currentLoopData = $series_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $series_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
      <a href="<?php echo e(URL::to('series/'.$series_data->series_slug.'/'.$series_data->id)); ?>">  
        <div class="col-md-3 col-sm-4 col-xs-6 sm-top-30">
          <div class="vfx_upcomming_item_block"> 
        <div class="series_view_img">
        <img class="img-responsive" src="<?php echo e(URL::to('upload/source/'.$series_data->series_poster)); ?>" alt="show">
        </div>  
        <div class="vfx_upcomming_detail">
        <h4 class="vfx_video_title"><?php echo e(Str::limit(stripslashes($series_data->series_name),25)); ?></h4>          
        </div>            
          </div>                  
        </div>
      </a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 

        </div>    
      </div>
    </div>
  </div>

  <div class="section section-padding vfx_movie_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><?php echo e(trans('words.sports_text')); ?></h2>
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="show-listing sports_listing_view">
      
       <?php $__currentLoopData = $sports_video_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sports_video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
       
      
      <?php if(Auth::check()): ?>              
          <a class="icon" href="<?php echo e(URL::to('sports/'.$sports_video->video_slug.'/'.$sports_video->id)); ?>">
      <?php else: ?>
         <?php if($sports_video->video_access=='Paid'): ?>
          <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
         <?php else: ?>
          <a class="icon" href="<?php echo e(URL::to('sports/'.$sports_video->video_slug.'/'.$sports_video->id)); ?>">
         <?php endif; ?>  
      <?php endif; ?>  
      <div class="col-md-3 col-sm-4 col-xs-6">
            <div class="vfx_video_item">
              <div class="thumb-wrap"> <img src="<?php echo e(URL::to('upload/source/'.$sports_video->video_image)); ?>" alt="<?php echo e($sports_video->video_title); ?>">
                <?php if($sports_video->video_access=='Paid'): ?><span class="premium_video"><i class="fa fa-lock"></i>Premium</span><?php endif; ?>

                <div class="thumb-hover"> 
         
          <i class="icon fa fa-play"></i><span class="ripple"></span>
         
          </div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title"><?php echo e(Str::limit(stripslashes($sports_video->video_title),25)); ?></h4>
               </div>
            </div>
      </div>
      </a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 

        </div>    
      </div>
    </div>
  </div>

  <div class="section section-padding vfx_movie_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><?php echo e(trans('words.live_tv')); ?></h2>
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="show-listing sports_listing_view">
      
       <?php $__currentLoopData = $live_tv_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $live_tv_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
       
      
      <?php if(Auth::check()): ?>              
          <a class="icon" href="<?php echo e(URL::to('live-tv/'.$live_tv_data->channel_slug.'/'.$live_tv_data->id)); ?>">
      <?php else: ?>
         <?php if($live_tv_data->channel_access=='Paid'): ?>
          <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
         <?php else: ?>
          <a class="icon" href="<?php echo e(URL::to('sports/'.$live_tv_data->channel_slug.'/'.$live_tv_data->id)); ?>">
         <?php endif; ?>  
      <?php endif; ?>  
      <div class="col-md-3 col-sm-4 col-xs-6">
            <div class="vfx_video_item">
              <div class="thumb-wrap"> <img src="<?php echo e(URL::to('upload/source/'.$live_tv_data->channel_thumb)); ?>" alt="<?php echo e($live_tv_data->channel_name); ?>">
                <?php if($live_tv_data->channel_access=='Paid'): ?><span class="premium_video"><i class="fa fa-lock"></i>Premium</span><?php endif; ?>

                <div class="thumb-hover"> 
         
          <i class="icon fa fa-play"></i><span class="ripple"></span>
         
          </div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title"><?php echo e(Str::limit(stripslashes($live_tv_data->channel_name),25)); ?></h4>
               </div>
            </div>
      </div>
      </a>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 

        </div>    
      </div>
    </div>
  </div>

  <?php else: ?>
     <h3 style="text-align: center;padding-top: 25px;padding-bottom: 26px;color:#eb1536;"><?php echo e(trans('words.no_search_found')); ?></h3>
  <?php endif; ?>

</div>

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\streamit\resources\views/pages/search.blade.php ENDPATH**/ ?>