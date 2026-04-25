<div class="comm:relative comm:mt-2 comm:pt-2 comm:border-t comm:border-gray-200 comm:dark:border-gray-700 comm:flex comm:items-center comm:gap-x-1 comm:flex-wrap">
    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->reactionSummary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reactionData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <span <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'inline-reaction-button-'.e($reactionData['reaction']).'-'.e($comment->getId()).''; ?>wire:key="inline-reaction-button-<?php echo e($reactionData['reaction']); ?>-<?php echo e($comment->getId()); ?>">
            <button
                x-cloak
                wire:click="handleReactionToggle('<?php echo e($reactionData['reaction']); ?>')"
                type="button"
                class="comm:inline-flex comm:items-center comm:justify-center comm:gap-1 comm:rounded-full comm:border comm:px-2 comm:h-8 comm:text-xs comm:font-medium comm:transition comm:focus:outline-none comm:focus:ring-2 comm:focus:ring-offset-2 comm:disabled:opacity-50 comm:disabled:cursor-not-allowed
                    <?php echo e($reactionData['reacted_by_current_user']
                        ? 'comm:bg-gray-50 comm:dark:bg-gray-800 comm:border-gray-300 comm:dark:border-gray-600 comm:text-gray-700 comm:dark:text-gray-200 comm:hover:bg-gray-200 comm:dark:hover:bg-gray-600'
                        : 'comm:bg-white comm:dark:bg-gray-900 comm:border-gray-300 comm:dark:border-gray-600 comm:text-gray-700 comm:dark:text-gray-200 comm:hover:bg-gray-100 comm:dark:hover:bg-gray-600'); ?>"
                title="<?php echo e($reactionData['reaction']); ?>"

            >
                <span><?php echo e($reactionData['reaction']); ?></span>
                <span <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'inline-reaction-count-'.e($reactionData['reaction']).'-'.e($comment->getId()).''; ?>wire:key="inline-reaction-count-<?php echo e($reactionData['reaction']); ?>-<?php echo e($comment->getId()); ?>"><?php echo e($reactionData['count']); ?></span>
            </button>
        </span>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

    
    <div class="comm:relative" x-data="{ open: false }" wire:ignore.self>
        <button
            x-on:click="open = !open"
            type="button"
            <?php if(! auth()->check()): echo 'disabled'; endif; ?>
            class="comm:inline-flex comm:items-center comm:justify-center comm:gap-1 comm:rounded-full comm:border comm:border-gray-300 comm:dark:border-gray-600 comm:bg-white comm:dark:bg-gray-900 comm:w-8 comm:h-8 comm:text-xs comm:font-medium comm:text-gray-700 comm:dark:text-gray-200 comm:transition comm:hover:bg-gray-100 comm:dark:hover:bg-gray-700 comm:focus:outline-none comm:focus:ring-2 comm:focus:ring-offset-2 comm:disabled:opacity-50 comm:disabled:cursor-not-allowed"
            title="<?php echo e(__('commentions::comments.add_reaction')); ?>"
            <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'add-reaction-button-'.e($comment->getId()).''; ?>wire:key="add-reaction-button-<?php echo e($comment->getId()); ?>"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="comm:h-4 comm:w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </button>

        
        <div
            x-show="open"
            x-cloak
            x-on:click.away="open = false"
            class="comm:absolute comm:bottom-full comm:mb-2 comm:z-10 comm:bg-white comm:dark:bg-gray-800 comm:border comm:border-gray-300 comm:dark:border-gray-600 comm:rounded-lg comm:shadow-lg comm:p-2 comm:flex-wrap comm:gap-1 comm:w-max comm:max-w-xs"
            :class="{ 'comm:hidden': ! open, 'comm:flex': open }"
        >
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $allowedReactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reactionEmoji): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <?php
                    $reactionData = $this->reactionSummary[$reactionEmoji] ?? ['count' => 0, 'reacted_by_current_user' => false];
                ?>

                <button
                    wire:click="handleReactionToggle('<?php echo e($reactionEmoji); ?>')"
                    x-on:click="open = false"
                    type="button"
                    <?php if(! auth()->check()): echo 'disabled'; endif; ?>
                    class="comm:inline-flex comm:items-center comm:justify-center comm:gap-1 comm:rounded-full comm:w-8 comm:h-8 comm:text-xs comm:font-medium comm:transition comm:focus:outline-none comm:focus:ring-2 comm:focus:ring-offset-2 comm:disabled:opacity-50 comm:disabled:cursor-not-allowed
                           <?php echo e($reactionData['reacted_by_current_user']
                               ? 'comm:text-gray-700 comm:dark:text-gray-200 comm:hover:bg-gray-200 comm:dark:hover:bg-gray-600'
                               : 'comm:text-gray-700 comm:dark:text-gray-200 comm:hover:bg-gray-100 comm:dark:hover:bg-gray-600'); ?>"
                    title="<?php echo e($reactionEmoji); ?>"
                    <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'popup-reaction-button-'.e($reactionEmoji).'-'.e($comment->getId()).''; ?>wire:key="popup-reaction-button-<?php echo e($reactionEmoji); ?>-<?php echo e($comment->getId()); ?>"
                >
                    <span><?php echo e($reactionEmoji); ?></span>
                </button>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $this->reactionSummary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reactionEmoji => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! in_array($reactionEmoji, $allowedReactions) && $data['count'] > 0): ?>
            <span
                <?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::$currentLoop['key'] = 'reaction-extra-'.e($reactionEmoji).'-'.e($comment->getId()).''; ?>wire:key="reaction-extra-<?php echo e($reactionEmoji); ?>-<?php echo e($comment->getId()); ?>"
                class="comm:inline-flex comm:items-center comm:justify-center comm:gap-1 comm:rounded-full comm:border comm:border-gray-300 comm:dark:border-gray-600 comm:bg-gray-100 comm:dark:bg-gray-800 comm:px-2 comm:h-8 comm:text-xs comm:font-medium comm:text-gray-600 comm:dark:text-gray-300"
                title="<?php echo e($reactionEmoji); ?>"
            >
                <span><?php echo e($reactionEmoji); ?></span>
                <span><?php echo e($data['count']); ?></span>
            </span>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
</div>
<?php /**PATH C:\xampp\htdocs\mic-admin\vendor\kirschbaum-development\commentions\resources\views\reactions.blade.php ENDPATH**/ ?>