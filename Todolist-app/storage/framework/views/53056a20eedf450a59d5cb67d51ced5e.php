

<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('tasks.create')); ?>" class="flex items-center bg-gray-200 px-2 py-1 rounded hover:bg-gray-100 border-b-4 border-gray-400">
                <svg 
                    class="w-6 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"              stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span>New Task</span>
            </a>
<?php $__currentLoopData = $task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($task->user_id); ?>

        <div class="pb-4 pt-2 px-2 mt-4 mb-2 border-b-4 border-gray-400 bg-gray-200 hover:shadow-md rounded">
            <p><?php echo e($task->task_name); ?></p>
            <p><?php echo e($task->task_details); ?></p>
            
        </div>
        
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('home')); ?>">back</a>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\NITRO\OneDrive\Máy tính\laravel\aaa\To-Do-List-App\Todolist-app\resources\views/tasks/index.blade.php ENDPATH**/ ?>