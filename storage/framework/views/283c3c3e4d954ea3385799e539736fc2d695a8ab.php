

<?php $__env->startSection('content'); ?>

    <!-- DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary float-left"><?php echo e(__('Edit Task')); ?></h3>
        </div>
        <div class="card-body">
            <form id="editForm" action="<?php echo e(route('task:update', $task->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>                
                <input type="hidden" name="todo_id" value="<?php echo e($task->to_do_id); ?>">
                <div class="modal-body">                
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Task:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="description" name="description" placeholder="Try typing 'Submit design document by 5pm'" value="<?php echo e($task->description); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check form-check-inline">                        
                            <input class="form-check-input" type="checkbox" id="important" name="important" value="1" <?php echo e($task->important === 1 ? 'checked="checked"' : ''); ?>>
                            <label class="form-check-label" for="important">Mark as Important?</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="my_day" name="my_day" value="1" <?php echo e($task->my_day === 1 ? 'checked="checked"' : ''); ?>>
                            <label class="form-check-label" for="my_day">Add to My Day</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="reminder" class="col-sm-2 col-form-label">Remind Me:</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="reminder" name="reminder">
                                <option value="">Remind Me</option>
                                <option <?php echo e(($task->reminder) == 'Later Today' ? 'selected' : ''); ?> value="Later Today">Later Today</option>
                                <option <?php echo e(($task->reminder) == 'Tomorrow' ? 'selected' : ''); ?> value="Tomorrow">Tomorrow</option>
                                <option <?php echo e(($task->reminder) == 'Next Week' ? 'selected' : ''); ?> value="Next Week">Next Week</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="due_date" class="col-sm-2 col-form-label">Due Date:</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="due_date" name="due_date">
                                <option value="">Add due date</option>
                                <option <?php echo e(($task->due_date) == 'Today' ? 'selected' : ''); ?> value="Today">Today</option>
                                <option <?php echo e(($task->due_date) == 'Tomorrow' ? 'selected' : ''); ?> value="Tomorrow">Tomorrow</option>
                                <option <?php echo e(($task->due_date) == 'Next Week' ? 'selected' : ''); ?> value="Next Week">Next Week</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="repeat" class="col-sm-2 col-form-label">Repeat:</label>
                        <div class="col-sm-10">
                            <select class="custom-select" id="repeat" name="repeat">
                                <option value="">Repeat</option>
                                <option <?php echo e(($task->repeat) == 'Daily' ? 'selected' : ''); ?> value="Daily">Daily</option>
                                <option <?php echo e(($task->repeat) == 'Weekdays' ? 'selected' : ''); ?> value="Weekdays">Weekdays</option>
                                <option <?php echo e(($task->repeat) == 'Weekly' ? 'selected' : ''); ?> value="Weekly">Weekly</option>
                                <option <?php echo e(($task->repeat) == 'Monthly' ? 'selected' : ''); ?> value="Monthly">Monthly</option>                                
                                <option <?php echo e(($task->repeat) == 'Yearly' ? 'selected' : ''); ?> value="Yearly">Yearly</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="note" class="col-sm-2 col-form-label">Note:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="note" name="note" rows="3"><?php echo e($task->note); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo e(url()->previous()); ?>" type="button" class="btn btn-secondary">Close</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\cybersecurity\ToDoList\resources\views/todos/edit.blade.php ENDPATH**/ ?>