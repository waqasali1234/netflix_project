<?php $__env->startSection("content"); ?>

  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-8">
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

                <?php echo Form::open(array('url' => 'admin/profile','class'=>'form-horizontal','name'=>'profile_form','id'=>'profile_form','role'=>'form','enctype' => 'multipart/form-data')); ?>

                  
                  <div class="form-group row">
                         
                        <?php if(file_exists(public_path('upload/'.Auth::user()->user_image))): ?>                                 
 
                        <img src="<?php echo e(URL::to('upload/'.Auth::user()->user_image)); ?>" alt="person" class="img-thumbnail" width="150" />
                        
                        <?php else: ?>
                            
                        <img src="<?php echo e(URL::asset('admin_assets/images/users/avatar-10.jpg')); ?>" alt="person" class="img-thumbnail" width="150"/>
                        
                        <?php endif; ?>               
                                     
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.profile_image')); ?></label>
                    <div class="col-sm-8">
                      <input type="file" name="user_image" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.name')); ?> *</label>
                    <div class="col-sm-8">
                       <input type="text" name="name" value="<?php echo e(Auth::user()->name); ?>" class="form-control">
                    </div>
                  </div>                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.email')); ?> *</label>
                    <div class="col-sm-8">
                       <input type="email" name="email" value="<?php echo e(Auth::user()->email); ?>" class="form-control" value="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.phone')); ?> </label>
                    <div class="col-sm-8">
                       <input type="text" name="phone" value="<?php echo e(isset(Auth::user()->phone) ? Auth::user()->phone : null); ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="hori-pass1" class="col-sm-3 col-form-label"><?php echo e(trans('words.password')); ?>*</label>
                    <div class="col-sm-8">
                      <input id="hori-pass1" type="password" name="password" class="form-control">
                    </div>
                  </div>                  
                   
                   
                  <div class="form-group">
                    <div class="offset-sm-3 col-sm-9">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"> <?php echo e(trans('words.save')); ?> </button>                      
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
<?php echo $__env->make("admin.admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\streamit\resources\views/admin/pages/profile.blade.php ENDPATH**/ ?>