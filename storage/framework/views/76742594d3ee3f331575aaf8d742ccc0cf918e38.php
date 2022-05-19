
<?php $__env->startSection('content'); ?>
<div class="container">     
		<div class="card border-silver">
			<div class="card-header">Laravel TreeView</div>
	  		<div class="card-body">
	  			<div class="row">
	  				<div class="col-md-6">
	  					<h3>Category List</h3>
                        <p>Click to lists</p>
				        <ul id="tree1">
				            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				                <li>
								<i class="fa fa-angle-right arrow"></i>
				                    <?php echo e($category->title); ?>

				                    <?php if(count($category->childs)): ?>
				                        <?php echo $__env->make('manageChild',['childs' => $category->childs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				                    <?php endif; ?>
				                </li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<h1> Пустой </h1>
				            <?php endif; ?>
				        </ul>
	  				</div>
	  				<div class="col-md-6">
	  					<h3>Add New Category</h3>
						  <form action="<?php echo e(route('category')); ?>" method="post">
							  <?php echo csrf_field(); ?>
                        <?php echo csrf_field(); ?>
                         <?php if(count($errors) > 0): ?>
                                  <div class="alert alert-danger  alert-dismissible">
                                      <button type="button" class="close" data-dismiss="alert">×</button>
                                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <?php echo e($error); ?><br>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </div>
                              <?php endif; ?>
                          <?php if($message = Session::get('success')): ?>
                           <div class="alert alert-success  alert-dismissible">
                               <button type="button" class="close" data-dismiss="alert">×</button>   
                                   <strong><?php echo e($message); ?></strong>
                           </div>
                        <?php endif; ?>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Title</label>
                                 <input type="text" name="title" class="form-control">   
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Parent</label>
                                 <select class="form-control" name="parent_id">
                                    <option selected disabled>Select Parent Menu</option>
                                    <?php $__currentLoopData = $allCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <button class="btn btn-success">Save</button>
                           </div>
                        </div>
                     </form>
					


	  				</div>
	  			</div>

	  			
	  		</div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\homework\resources\views/categoryTreeview.blade.php ENDPATH**/ ?>