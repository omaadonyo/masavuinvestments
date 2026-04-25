<?php if (isset($component)) { $__componentOriginal166a02a7c5ef5a9331faf66fa665c256 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal166a02a7c5ef5a9331faf66fa665c256 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-panels::components.page.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-panels::page'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div style="max-width: 700px; margin: 90px auto; text-align: center; padding: 40px;">

    <!-- ICON -->
    <div style="width: 90px; height: 90px; margin: 0 auto 20px; border-radius: 50%; background: #fef2f2; display: flex; align-items: center; justify-content: center;">
        <span style="font-size: 40px; color: #dc2626;">⛔</span>
    </div>

    <!-- TITLE -->
    <h1 style="font-size: 24px; font-weight:bold;margin-bottom: 10px;">
        Account Suspended
    </h1>

    <!-- DESCRIPTION -->
    <p style="font-size: 15px; line-height: 1.6; margin-bottom: 25px;">
        Your account has been temporarily suspended and access to the platform is currently restricted.
        If you believe this is a mistake or need further clarification, please contact the administrator for assistance.
    </p>

    <div style="font-size: 2.2rem;font-weight: bold;text-transform: uppercase;">
        <?php echo e(number_format(auth()->user()->member_account)); ?> Ugx
    </div>

    <!-- STATUS BOX -->
    <div style="display: inline-block; background: #f9fafb; padding: 12px 18px; border-radius: 100px; font-size: 13px; color: #555; margin-bottom: 25px;">
        Current: <strong style="color: #dc2626;">Balance</strong>
    </div>

    <!-- ACTION BUTTON (FILAMENT) -->
    <div>
        <?php if (isset($component)) { $__componentOriginal6330f08526bbb3ce2a0da37da512a11f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.button.index','data' => ['tag' => 'a','href' => 'mailto:info@masavuinvestments.com','color' => 'danger','icon' => 'heroicon-o-phone','size' => 'lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['tag' => 'a','href' => 'mailto:info@masavuinvestments.com','color' => 'danger','icon' => 'heroicon-o-phone','size' => 'lg']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            Contact Administrator
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6330f08526bbb3ce2a0da37da512a11f)): ?>
<?php $attributes = $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f; ?>
<?php unset($__attributesOriginal6330f08526bbb3ce2a0da37da512a11f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6330f08526bbb3ce2a0da37da512a11f)): ?>
<?php $component = $__componentOriginal6330f08526bbb3ce2a0da37da512a11f; ?>
<?php unset($__componentOriginal6330f08526bbb3ce2a0da37da512a11f); ?>
<?php endif; ?>
    </div>

    <!-- FOOT NOTE -->
    <p style="margin-top: 20px; font-size: 12px; color: #999;">
        Access will remain restricted until reviewed by the support team.
    </p>

</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal166a02a7c5ef5a9331faf66fa665c256)): ?>
<?php $attributes = $__attributesOriginal166a02a7c5ef5a9331faf66fa665c256; ?>
<?php unset($__attributesOriginal166a02a7c5ef5a9331faf66fa665c256); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal166a02a7c5ef5a9331faf66fa665c256)): ?>
<?php $component = $__componentOriginal166a02a7c5ef5a9331faf66fa665c256; ?>
<?php unset($__componentOriginal166a02a7c5ef5a9331faf66fa665c256); ?>
<?php endif; ?>
<?php /**PATH /home/masavuin/domains/admin.masavuinvestments.com/public_html/micapp/resources/views/filament/pages/suspended.blade.php ENDPATH**/ ?>