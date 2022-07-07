

<?php $__env->startSection('content'); ?>

    <!-- DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php if($tasks->count() == 0): ?>
                <h3 class="m-0 font-weight-bold text-primary float-left"><?php echo e($todo->list_name); ?></h3>
            <?php else: ?>
                <?php if(request()->is('todos/'.$todo->id)): ?>
                    <h3 class="m-0 font-weight-bold text-primary float-left"><?php echo e($todo->list_name); ?></h3>
                <?php elseif(request()->is('todos/1/myday')): ?>
                    <h3 class="m-0 font-weight-bold text-primary float-left"><?php echo e(__('My Day')); ?></h3>
                <?php elseif(request()->is('todos/2/important')): ?>
                    <h3 class="m-0 font-weight-bold text-primary float-left"><?php echo e(__('Important')); ?></h3>
                <?php elseif(request()->is('todos/3/planned')): ?>
                    <h3 class="m-0 font-weight-bold text-primary float-left"><?php echo e(__('Planned')); ?></h3>
                <?php endif; ?>
            <?php endif; ?>            
            
            <a href="#" class="btn btn-primary btn-icon-split float-right" data-toggle="modal" data-target="#addTaskModal">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add a task</span>
            </a>
            
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Completion</th>
                            <th>Task</th>
                            <th>Important</th>
                            <th>My Day</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>                                
                                <td>
                                    <form id="completedForm<?php echo e($task->id); ?>" action="<?php echo e(route('task:complete', $task->id)); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="todo_id" value="<?php echo e($todo->id); ?>">
                                        <div class="form-check">
                                            <input class="form-check-input position-static" type="checkbox" id="completed[]" name="completed[]" value="<?php echo e($task->id); ?>" aria-label="...">
                                        </div>
                                    </form>
                                </td>
                                <td><?php echo e($task->description); ?></td>
                                <?php if($task->important == 1): ?>
                                    <td><i class="fas fa-fw fa-star"></i></td>
                                <?php else: ?>
                                    <td></td>
                                <?php endif; ?>
                                <?php if($task->my_day == 1): ?>
                                    <td><i class="fas fa-fw fa-sun"></i></td>
                                <?php else: ?>
                                    <td></td>
                                <?php endif; ?>
                                <td>
                                    <a href="<?php echo e(route('task:edit', $task->id)); ?>" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="<?php echo e(route('task:delete', $task->id)); ?>" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="accordion" id="accordionExample">
        <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
            <button class="btn btn-header-link btn-block text-left text-success" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fa fa-angle-down"></i>
                Completed
            </button>
            </h2>
        </div>
    
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dtCompleted" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="20%">Completion</th>
                                <th>Task</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $completed_tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $completed_task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <?php if($completed_task->completed == 1): ?>
                                        <td><i class="fas fa-fw fa-check-circle text-success"></i></td>
                                    <?php endif; ?>
                                    <td style="text-decoration: line-through;"><?php echo e($completed_task->description); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal New Task -->
    <div class="modal fade bd-example-modal-lg" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addTaskModalLabel">New Task - <?php echo e($todo->id); ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="addForm" action="<?php echo e(route('todo:task', $todo->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>                
                <input type="hidden" name="completed" value="0">
                <div class="modal-body">                
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Task:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="description" name="description" placeholder="Try typing 'Submit design document by 5pm'">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">                        
                            <input class="form-check-input" type="checkbox" id="important" name="important" value="1">
                            <label class="form-check-label" for="important">Mark as Important?</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="my_day" name="my_day" value="1">
                            <label class="form-check-label" for="my_day">Add to My Day</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="reminder" class="col-sm-2 col-form-label">Remind Me:</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="reminder" name="reminder">
                                <option value="">Remind Me</option>
                                <option value="Later Today">Later Today</option>
                                <option value="Tomorrow">Tomorrow</option>
                                <option value="Next Week">Next Week</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="due_date" class="col-sm-2 col-form-label">Due Date:</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="due_date" name="due_date">
                                <option value="">Add due date</option>
                                <option value="Today">Today</option>
                                <option value="Tomorrow">Tomorrow</option>
                                <option value="Next Week">Next Week</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="repeat" class="col-sm-2 col-form-label">Repeat:</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="repeat" name="repeat">
                                <option value="">Repeat</option>
                                <option value="Daily">Daily</option>
                                <option value="Weekdays">Weekdays</option>
                                <option value="Weekly">Weekly</option>
                                <option value="Monthly">Monthly</option>                                
                                <option value="Yearly">Yearly</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="note" class="col-sm-2 col-form-label">Note:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
          </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\cybersecurity\ToDoList\resources\views/todos/show.blade.php ENDPATH**/ ?>