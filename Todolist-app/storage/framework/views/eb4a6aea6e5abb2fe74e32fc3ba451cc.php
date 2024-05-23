

<?php $__env->startSection('content'); ?>
<div style="width: 480px;"class="max-w-full mx-auto mt-10 px-4 py-8 text-gray-500">
        <h1 class="text-xl uppercase text-gray-500 mb-4">Update a Task</h1>
        <form action="<?php echo e(route('tasks.update', $task->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <label class="block" for="task_name">Task Name: </label>
            <input class="w-full mb-2 rounded-lg bg-gray-200" type="text" name="task_name" value="<?php echo e($task->task_name); ?>">
            <?php $__errorArgs = ['task_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-base pb-4 text-red-400"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <label class="block" for="task_details">Task Details: </label>
            <textarea class="w-full mb-2 rounded-lg h-48 bg-gray-200" type="text" name="task_details"><?php echo e($task->task_details); ?></textarea>
            <?php $__errorArgs = ['task_details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="text-base pb-4 text-red-400"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <select class="w-full mb-2 rounded-lg bg-gray-200" id="task_status" name="status">
    <option <?php echo e($task->status == 'new' ? 'selected' : ''); ?> value="new">New</option>
    <option <?php echo e($task->status == 'done' ? 'selected' : ''); ?> value="done">Done</option>
    <option <?php echo e($task->status == 'doing' ? 'selected' : ''); ?> value="doing">Doing</option>
    <option <?php echo e($task->status == 'canceled' ? 'selected' : ''); ?> value="canceled">Canceled</option>
</select>

            
            <div class="flex gap-4">
                <button class="block bg-gray-400 py-2 px-4 rounded-lg text-gray-100 hover:text-gray-500 focus:outline-none">Update</button>
                <a href="<?php echo e(route('tasks.index')); ?>" class="block bg-red-500 py-2 px-4 rounded-lg text-gray-100 hover:bg-red-400 focus:outline-none">Cancel</a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\NITRO\OneDrive\Máy tính\laravel\bbb\To-Do-List-App\Todolist-app\resources\views/tasks/edit.blade.php ENDPATH**/ ?>