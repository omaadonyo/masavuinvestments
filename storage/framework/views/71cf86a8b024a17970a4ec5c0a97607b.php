<div>
    <div class="space-y-4">
    <!-- Document Info -->
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <!-- Icon based on category -->
            <?php
                $icons = [
                    'image' => 'heroicon-o-photograph',
                    'pdf' => 'heroicon-o-document-text',
                    'word' => 'heroicon-o-document',
                ];
                $icon = $icons[$record->category] ?? 'heroicon-o-document';
            ?>

            <h2 class="font-semibold text-lg"><?php echo e($record->title); ?></h2>
        </div>
        <span class="text-gray-500 text-sm"><?php echo e(ucfirst($record->visibility)); ?></span>
    </div>

    <!-- Slider / Preview -->
    <div class="relative">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <!-- Only one item for now, can loop if multiple docs -->
                <div class="swiper-slide flex justify-center items-center">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($record->category === 'image'): ?>
                        <img src="<?php echo e(asset('storage/'.$record->document_path)); ?>" 
                             alt="<?php echo e($record->title); ?>" 
                             class="max-h-96 rounded shadow-lg"/>
                    <?php else: ?>
                        <div class="flex flex-col items-center justify-center p-4 border rounded bg-gray-50">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('heroicon-o-document-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-16 h-16 text-gray-400']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                            <p class="mt-2 text-gray-600"><?php echo e($record->title); ?></p>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            <!-- Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <!-- Metadata -->
    <div class="text-sm text-gray-500">
        Created at: <?php echo e(\Carbon\Carbon::parse($record->created_at)->format('M d, Y H:i')); ?> |
        Updated at: <?php echo e(\Carbon\Carbon::parse($record->updated_at)->format('M d, Y H:i')); ?>

    </div>
</div>

<!-- Swiper JS -->
<?php $__env->startPush('scripts'); ?>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.swiper-container', {
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });
</script>
<?php $__env->stopPush(); ?>
</div><?php /**PATH /home/masavuin/domains/admin.masavuinvestments.com/public_html/micapp/resources/views/filament/pages/actions/document.blade.php ENDPATH**/ ?>