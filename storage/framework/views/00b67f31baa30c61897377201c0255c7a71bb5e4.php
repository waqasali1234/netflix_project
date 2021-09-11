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
                

                 <?php echo Form::open(array('url' => array('admin/social_login_settings'),'class'=>'form-horizontal','name'=>'settings_form','id'=>'settings_form','role'=>'form','enctype' => 'multipart/form-data')); ?>  
                  
                  <input type="hidden" name="id" value="<?php echo e(isset($settings->id) ? $settings->id : null); ?>">
   
                 <h5 class="m-b-5"><i class="fa fa-google"></i> <b>Google Settings</b></h5>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.google_login')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="google_login">                               
                                 
                                <option value="1" <?php if($settings->google_login=="1"): ?> selected <?php endif; ?>>ON</option>
                                <option value="0" <?php if($settings->google_login=="0"): ?> selected <?php endif; ?>>OFF</option>
                                              
                            </select>
                      </div>
                  </div>
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.google_client_id')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="google_client_id" value="<?php echo e(isset($settings->google_client_id) ? $settings->google_client_id : null); ?>" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.google_secret')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="google_client_secret" value="<?php echo e(isset($settings->google_client_secret) ? $settings->google_client_secret : null); ?>" class="form-control">
                    </div>
                  </div> 
                  <br>

                  <h5 class="m-b-5"><i class="fa fa-facebook"></i> <b>Facebook Settings</b></h5>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.facebook_login')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="facebook_login">                               
                                 
                                <option value="1" <?php if($settings->facebook_login=="1"): ?> selected <?php endif; ?>>ON</option>
                                <option value="0" <?php if($settings->facebook_login=="0"): ?> selected <?php endif; ?>>OFF</option>
                                              
                            </select>
                      </div>
                  </div>
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.facebook_app_id')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="facebook_app_id" value="<?php echo e(isset($settings->facebook_app_id) ? $settings->facebook_app_id : null); ?>" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.facebook_secret')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="facebook_client_secret" value="<?php echo e(isset($settings->facebook_client_secret) ? $settings->facebook_client_secret : null); ?>" class="form-control">
                    </div>
                  </div>
                   
                  <div class="form-group">
                    <div class="offset-sm-3 col-sm-9">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"> <?php echo e(trans('words.save_settings')); ?> </button>                      
                    </div>
                  </div>
                <?php echo Form::close(); ?> 
              </div>
            </div>            
          </div>              
        </div>
      </div>
      <?php echo $__env->make("admin.copyright", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    </div> 
 
 


<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\streamit\resources\views/admin/pages/social_login_settings.blade.php ENDPATH**/ ?>