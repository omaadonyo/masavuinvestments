<?php
    use function Filament\Support\generate_href_html;
    use function Filament\Support\generate_icon_html;
    use Filament\Support\Enums\IconSize;
?>

<style data-navigate-track>
    .fi-bottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 20;
        display: flex;
        align-items: center;
        justify-content: space-around;
        height: 4rem;
        padding-bottom: env(safe-area-inset-bottom, 0px);
        border-top-width: 1px;
        border-top-style: solid;
        background-color: #ffffff;
        border-top-color: var(--gray-200);
    }

    .dark .fi-bottom-nav {
        background-color: var(--gray-900);
        border-top-color: var(--gray-700);
    }

    .fi-bottom-nav-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex: 1;
        gap: 0.25rem;
        padding: 0.5rem 0;
        border: none;
        background: none;
        text-decoration: none;
        cursor: pointer;
        position: relative;
        -webkit-tap-highlight-color: transparent;
        color: var(--gray-500);
    }

    .dark .fi-bottom-nav-item {
        color: var(--gray-400);
    }

    .fi-bottom-nav-item.fi-active {
        color: var(--primary-600);
    }

    .dark .fi-bottom-nav-item.fi-active {
        color: var(--primary-400);
    }

    .fi-bottom-nav-label {
        font-size: 0.625rem;
        line-height: 1;
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;
        text-align: center;
        padding: 0 0.25rem;
    }

    .fi-bottom-nav-icon-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .fi-bottom-nav-badge {
        position: absolute;
        top: -0.25rem;
        right: -0.5rem;
        min-width: 1rem;
        height: 1rem;
        border-radius: 9999px;
        color: #fff;
        font-size: 0.625rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 0.25rem;
        line-height: 1;
    }

    .fi-bottom-nav-badge-dot {
        position: absolute;
        top: -0.125rem;
        right: -0.125rem;
        width: 0.5rem;
        height: 0.5rem;
        border-radius: 9999px;
    }

    @media (min-width: 1024px) {
        .fi-bottom-nav {
            display: none !important;
        }

        .fi-main {
            padding-bottom: 0 !important;
        }
    }

    @media (max-width: 1023px) {
        .fi-main {
            padding-bottom: calc(4rem + env(safe-area-inset-bottom, 0px)) !important;
        }
    }
</style>

<nav
    x-data="{}"
    x-show="! $store.sidebar.isOpen"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fi-bottom-nav"
    aria-label="Bottom navigation"
>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
        <?php
            $isActive = $item->isActiveState();
            $icon = $isActive && $item->getActiveIcon() ? $item->getActiveIcon() : $item->getIcon();
            $badge = $item->getBadge();
            $badgeColor = $item->getBadgeColor() ?? 'primary';
            $badgeCssColor = is_string($badgeColor) ? "var(--{$badgeColor}-500)" : 'var(--primary-500)';
        ?>

        <a
            <?php echo e(generate_href_html($item->getUrl())); ?>

            class="<?php echo \Illuminate\Support\Arr::toCssClasses(['fi-bottom-nav-item', 'fi-active' => $isActive]); ?>"
            <?php if($isActive): ?> aria-current="page" <?php endif; ?>
        >
            <span class="fi-bottom-nav-icon-wrapper">
                <?php echo e(generate_icon_html($icon, size: IconSize::Large)); ?>


                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($badge !== null && $badge !== ''): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(is_numeric($badge)): ?>
                        <span class="fi-bottom-nav-badge" style="background-color: <?php echo e($badgeCssColor); ?>"><?php echo e($badge); ?></span>
                    <?php else: ?>
                        <span class="fi-bottom-nav-badge-dot" style="background-color: <?php echo e($badgeCssColor); ?>"></span>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </span>

            <span class="fi-bottom-nav-label"><?php echo e($item->getLabel()); ?></span>
        </a>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($moreButtonEnabled): ?>
        <button
            type="button"
            x-on:click="$store.sidebar.open()"
            class="fi-bottom-nav-item"
            aria-label="<?php echo e($moreButtonLabel); ?>"
        >
            <span class="fi-bottom-nav-icon-wrapper">
                <?php echo e(generate_icon_html('heroicon-o-bars-3', size: IconSize::Large)); ?>

            </span>

            <span class="fi-bottom-nav-label"><?php echo e($moreButtonLabel); ?></span>
        </button>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</nav>
<?php /**PATH C:\xampp\htdocs\mic-admin\vendor\hammadzafar05\mobile-bottom-nav\resources\views/bottom-navigation.blade.php ENDPATH**/ ?>