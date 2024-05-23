

<?php $__env->startSection('content'); ?>

<div class="container">
    <a href="<?php echo e(route('tasks.create')); ?>" class="flex items-center bg-gray-200 px-2 py-1 rounded hover:bg-gray-100 border-b-4 border-gray-400">
        <span>New Task</span>
    </a>
    <table>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
       
        <?php if($admin_role == 1): ?>
            <?php $__currentLoopData = $tasks_admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td> <!-- Add index here -->
                    <td><?php echo e($task->task_name); ?></td>
                    <td><?php echo e($task->task_details); ?></td>
                    <td><?php echo e($task->status); ?></td>
                    <td>
                        <a href="<?php echo e(route('tasks.edit', $task->id)); ?>" class="hover:text-gray-400">edit</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td> <!-- Add index here -->
                    <td><?php echo e($task->task_name); ?></td>
                    <td><?php echo e($task->task_details); ?></td>
                    <td><?php echo e($task->status); ?></td>
                    <td class='d-flex ps-1 pe-1'>
                        <a href="<?php echo e(route('tasks.edit', $task->id)); ?>" class="hover:text-gray-400 ms-2 me-2">edit</a>
                        <form action="<?php echo e(route('tasks.destroy', $task->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?> 
                            <?php echo method_field('DELETE'); ?>
                            <button onclick="return confirm('Are you sure you want to delete this task?')">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </table>
    <a href="<?php echo e(route('home')); ?>">back</a>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\NITRO\OneDrive\Máy tính\laravel\bbb\To-Do-List-App\Todolist-app\resources\views/tasks/index.blade.php ENDPATH**/ ?>