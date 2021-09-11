<?php $__env->startSection("content"); ?>

<style type="text/css">
  .iframe-container {
  overflow: hidden;
  padding-top: 56.25% !important;
  position: relative;
}
 
.iframe-container iframe {
   border: 0;
   height: 100%;
   left: 0;
   position: absolute;
   top: 0;
   width: 100%;
}
</style>
 
  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card-box">
                 
                <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                <?php if(Session::has('flash_message')): ?>
                      <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                          <?php echo e(Session::get('flash_message')); ?>

                      </div>
                <?php endif; ?>
                

                 <?php echo Form::open(array('url' => array('admin/player_settings'),'class'=>'form-horizontal','name'=>'player_settings','id'=>'player_settings','role'=>'form','enctype' => 'multipart/form-data')); ?>  
                  
                  <input type="hidden" name="id" value="<?php echo e(isset($settings->id) ? $settings->id : null); ?>">
                  <div class="row">

                  <div class="col-md-6">
                  <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;"><?php echo e(trans('words.player_options')); ?></h4>

                  <br/>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.player_style')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="player_style">                               
                                 
                                <option value="videojs_style1" <?php if($settings->player_style=="videojs_style1"): ?> selected <?php endif; ?>>Style 1</option>
                                <option value="videojs_style2" <?php if($settings->player_style=="videojs_style2"): ?> selected <?php endif; ?>>Style 2</option>
                                <option value="videojs_style3" <?php if($settings->player_style=="videojs_style3"): ?> selected <?php endif; ?>>Style 3</option>
                                <option value="videojs_style4" <?php if($settings->player_style=="videojs_style4"): ?> selected <?php endif; ?>>Style 4</option>
                                  
                            </select>
                      </div>
                  </div> 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.autoplay')); ?></label>
                    <div class="col-sm-8">
                       <select class="form-control" name="autoplay">
                                <option value="true" <?php if($settings->autoplay=="true"): ?> selected <?php endif; ?>>ON</option>
                                <option value="false" <?php if($settings->autoplay=="false"): ?> selected <?php endif; ?>>OFF</option>
                                  
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.theater_mode')); ?></label>
                    <div class="col-sm-8">
                       <select class="form-control" name="theater_mode">
                                <option value="ON" <?php if($settings->theater_mode=="ON"): ?> selected <?php endif; ?>>ON</option>
                                <option value="OFF" <?php if($settings->theater_mode=="OFF"): ?> selected <?php endif; ?>>OFF</option>
                                  
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.pip_mode')); ?></label>
                    <div class="col-sm-8">
                       <select class="form-control" name="pip_mode">
                                <option value="ON" <?php if($settings->pip_mode=="ON"): ?> selected <?php endif; ?>>ON</option>
                                <option value="OFF" <?php if($settings->pip_mode=="OFF"): ?> selected <?php endif; ?>>OFF</option>
                                  
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.rewind_forward')); ?></label>
                    <div class="col-sm-8">
                       <select class="form-control" name="rewind_forward">
                                <option value="ON" <?php if($settings->rewind_forward=="ON"): ?> selected <?php endif; ?>>ON</option>
                                <option value="OFF" <?php if($settings->rewind_forward=="OFF"): ?> selected <?php endif; ?>>OFF</option>
                                  
                        </select>
                    </div>
                  </div> 
                  <hr>
                  <h4 class="m-t-0 header-title" ><?php echo e(trans('words.player_watermark')); ?></h4>

                  <br/>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.watermark')); ?></label>
                    <div class="col-sm-8">
                       <select class="form-control" name="player_watermark">
                                <option value="ON" <?php if($settings->player_watermark=="ON"): ?> selected <?php endif; ?>>ON</option>
                                <option value="OFF" <?php if($settings->player_watermark=="OFF"): ?> selected <?php endif; ?>>OFF</option>
                                  
                        </select>
                    </div>
                  </div>
 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.player_logo')); ?> <small id="emailHelp" class="form-text text-muted">(<?php echo e(trans('words.recommended_resolution')); ?> : 180x50)</small></label>
                    <div class="col-sm-8">
                      <div class="input-group">

                        <input type="text" name="player_logo" id="player_logo" value="<?php echo e(isset($settings->player_logo) ? $settings->player_logo : null); ?>" class="form-control" readonly>
                        <div class="input-group-append">                           
                          <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#model_poster">Select</button>
                      
                        </div>
                      </div>
                     
                    </div>
                  </div>                 

                  <?php if(isset($settings->player_logo)): ?> 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">&nbsp;</label>
                    <div class="col-sm-8">
                                                                         
                           <img src="<?php echo e(URL::to('upload/source/'.$settings->player_logo)); ?>" alt="video image" class="img-thumbnail" width="200">                        
                       
                    </div>
                  </div>
                  <?php endif; ?>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.player_logo_position')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="player_logo_position">                               
                                 
                                <option value="RT" <?php if($settings->player_logo_position=="RT"): ?> selected <?php endif; ?>>Right Top</option>
                                <option value="LT" <?php if($settings->player_logo_position=="LT"): ?> selected <?php endif; ?>>Left Top</option>
                                  
                            </select>
                      </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.player_url')); ?>*</label>
                    <div class="col-sm-8">
                      <input type="text" name="player_url" value="<?php echo e(isset($settings->player_url) ? $settings->player_url : null); ?>" class="form-control">
                    </div>
                  </div>


                  </div>
                  <div class="col-md-6">
                  <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;"><?php echo e(trans('words.player_ads')); ?></h4>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.player_ad_on')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="player_ad_on_off">                               
                                 
                                <option value="ON" <?php if($settings->player_ad_on_off=="ON"): ?> selected <?php endif; ?>>ON</option>
                                <option value="OFF" <?php if($settings->player_ad_on_off=="OFF"): ?> selected <?php endif; ?>>OFF</option>
                                  
                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.ad_offset')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="ad_offset" value="<?php echo e(isset($settings->ad_offset) ? $settings->ad_offset : null); ?>" class="form-control" placeholder="0">

                      <small id="emailHelp" class="form-text text-muted">
                        Preroll Ad Set offset=0 <br>
                        Midroll Ad Set offset=50% OR  offset=30 (30 is seconds)<br>
                        Postroll Ad Set offset=100% 
                      </small>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.ad_skip')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="ad_skip" value="<?php echo e(isset($settings->ad_skip) ? $settings->ad_skip : null); ?>" class="form-control" placeholder="5">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.ad_web_url')); ?></label>
                    <div class="col-sm-8">
                      <input type="url" name="ad_web_url" value="<?php echo e(isset($settings->ad_web_url) ? $settings->ad_web_url : null); ?>" class="form-control" placeholder="URL to go on click">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.ad_video_type')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="ad_video_type" id="video_type">                               
                                <option value="Local" <?php if(isset($settings->ad_video_type) AND $settings->ad_video_type=="Local"): ?> selected <?php endif; ?>>Local</option>
                                <option value="URL" <?php if(isset($settings->ad_video_type) AND $settings->ad_video_type=="URL"): ?> selected <?php endif; ?>>URL</option>
                                                             
                            </select>
                      </div>
                  </div>
                  <div class="form-group row" id="local_id" <?php if($settings->ad_video_type!="Local"): ?> style="display:none;" <?php endif; ?>>

                    
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.ad_video_file')); ?> <small id="emailHelp" class="form-text text-muted"></small></label>
                    <div class="col-sm-8">
                      <div class="input-group">

                        <input type="text" name="video_url_local" id="video_url" value="<?php echo e(isset($settings->ad_video_url) ? basename($settings->ad_video_url) : null); ?>" class="form-control" readonly>
                        <div class="input-group-append">                           
                          <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#model_ad_video_url">Select</button>
                      
                        </div>
                      </div>
                     
                    </div>
                     
                    </div>
                   

                  <div class="form-group row" id="url_id" <?php if($settings->ad_video_type!="URL" AND $settings->ad_video_type!=""): ?> style="display:none;" <?php endif; ?>>
 
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.ad_video_url')); ?> <small id="emailHelp" class="form-text text-muted"></small></label>
                     <div class="col-sm-8">
                      <input type="text" name="ad_video_url" value="<?php echo e(isset($settings->ad_video_url) ? $settings->ad_video_url : null); ?>" class="form-control" placeholder="http://example.com/demo.mp4">
                    </div>
 
                  </div>

                  <div class="form-group">
                    <div class="offset-sm-8 col-sm-9">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"> <?php echo e(trans('words.save_settings')); ?> </button>                      
                    </div>
                  </div>

                  </div>
                  </div> 
                  
                <?php echo Form::close(); ?> 

                <div class="alert alert-danger"><b>Note:</b> This settings only work with web player</div>
              </div>
            </div>            
          </div>              
        </div>
      </div>
      <?php echo $__env->make("admin.copyright", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    </div> 
 
<!--  Logo -->
<div id="model_poster" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" style="max-width: 900px;">
        <div class="modal-content">             
            <div class="modal-body">
               <div class="iframe-container">
               <iframe src="<?php echo e(URL::to('responsive_filemanager/filemanager/dialog.php?type=2&field_id=player_logo&relative_url=1')); ?>" frameborder="0"></iframe>
               </div>
            </div>
        </div> 
    </div> 
</div>

<!--  Ad Video file -->
<div id="model_ad_video_url" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" style="max-width: 900px;">
        <div class="modal-content">             
            <div class="modal-body">
               <div class="iframe-container">
               <iframe src="<?php echo e(URL::to('responsive_filemanager/filemanager/dialog.php?type=2&sort_by=date&field_id=video_url&relative_url=1')); ?>" frameborder="0"></iframe>
               </div>
            </div>
        </div> 
    </div> 
</div> 


<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\streamit\resources\views/admin/pages/player_settings.blade.php ENDPATH**/ ?>