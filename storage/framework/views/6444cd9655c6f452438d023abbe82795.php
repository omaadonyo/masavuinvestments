<?php if (isset($component)) { $__componentOriginald2aa9f7b74553621bdcc3c69267ff328 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald2aa9f7b74553621bdcc3c69267ff328 = $attributes; } ?>
<?php $component = Filament\View\LegacyComponents\PageComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Filament\View\LegacyComponents\PageComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>


<?php if (isset($component)) { $__componentOriginalc1865fced28501235cfee36c0ed9ea44 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc1865fced28501235cfee36c0ed9ea44 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.callout','data' => ['icon' => 'heroicon-o-information-circle','color' => 'primary']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::callout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicon-o-information-circle','color' => 'primary']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

     <?php $__env->slot('heading', null, ['color' => 'primary']); ?> 
        Payment Proceedure
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('description', null, []); ?> 
        Please first make payment to this Stanbic Bank Account: <strong>903 002 720 258 5</strong>.
        Then proceed with filling this form.
     <?php $__env->endSlot(); ?>
    
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc1865fced28501235cfee36c0ed9ea44)): ?>
<?php $attributes = $__attributesOriginalc1865fced28501235cfee36c0ed9ea44; ?>
<?php unset($__attributesOriginalc1865fced28501235cfee36c0ed9ea44); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc1865fced28501235cfee36c0ed9ea44)): ?>
<?php $component = $__componentOriginalc1865fced28501235cfee36c0ed9ea44; ?>
<?php unset($__componentOriginalc1865fced28501235cfee36c0ed9ea44); ?>
<?php endif; ?>

<?php echo e($this->content); ?>


 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald2aa9f7b74553621bdcc3c69267ff328)): ?>
<?php $attributes = $__attributesOriginald2aa9f7b74553621bdcc3c69267ff328; ?>
<?php unset($__attributesOriginald2aa9f7b74553621bdcc3c69267ff328); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald2aa9f7b74553621bdcc3c69267ff328)): ?>
<?php $component = $__componentOriginald2aa9f7b74553621bdcc3c69267ff328; ?>
<?php unset($__componentOriginald2aa9f7b74553621bdcc3c69267ff328); ?>
<?php endif; ?><?php /**PATH /home/masavuin/domains/admin.masavuinvestments.com/public_html/micapp/resources/views/filament/pages/create-contribution.blade.php ENDPATH**/ ?>