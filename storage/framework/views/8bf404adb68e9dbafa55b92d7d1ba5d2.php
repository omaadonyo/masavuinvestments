<?php
    $rows = $getState()['rows'] ?? [];
    $metadata = $getState()['metadata'] ?? [];
    $groupedRows = collect($rows)->groupBy('group');
?>

<?php if (! $__env->hasRenderedOnce('7e2b444d-c6f3-40e6-9b34-20a8e6b1d03a')): $__env->markAsRenderedOnce('7e2b444d-c6f3-40e6-9b34-20a8e6b1d03a'); ?>
    <style>
        .fi-in-activity-diff {
            display: grid;
            gap: 1rem;
        }

        .fi-in-activity-diff-card {
            overflow: hidden;
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 1rem;
            background: rgba(255, 255, 255, 0.72);
        }

        .dark .fi-in-activity-diff-card {
            border-color: rgba(255, 255, 255, 0.1);
            background: rgba(17, 24, 39, 0.55);
        }

        .fi-in-activity-diff-grid {
            display: grid;
        }

        .fi-in-activity-diff-row {
            display: grid;
            grid-template-columns: minmax(11rem, 1fr) minmax(0, 1.4fr) minmax(0, 1.4fr);
        }

        .fi-in-activity-diff-group {
            grid-column: 1 / -1;
            padding: 0.65rem 1rem;
            border-top: 1px solid rgba(148, 163, 184, 0.16);
            color: #64748b;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            background: rgba(248, 250, 252, 0.75);
        }

        .dark .fi-in-activity-diff-group {
            border-top-color: rgba(255, 255, 255, 0.08);
            color: #cbd5e1;
            background: rgba(15, 23, 42, 0.6);
        }

        .fi-in-activity-diff-row + .fi-in-activity-diff-row {
            border-top: 1px solid rgba(148, 163, 184, 0.16);
        }

        .dark .fi-in-activity-diff-row + .fi-in-activity-diff-row {
            border-top-color: rgba(255, 255, 255, 0.08);
        }

        .fi-in-activity-diff-cell {
            padding: 0.9rem 1rem;
            min-width: 0;
        }

        .fi-in-activity-diff-cell pre {
            margin: 0;
            white-space: pre-wrap;
            word-break: break-word;
            font-size: 0.875rem;
            line-height: 1.55;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        }

        .fi-in-activity-diff-head .fi-in-activity-diff-cell {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .fi-in-activity-diff-field-head {
            color: #64748b;
            background: rgba(248, 250, 252, 0.9);
        }

        .fi-in-activity-diff-old-head {
            color: #b45309;
            background: rgba(254, 243, 199, 0.85);
        }

        .fi-in-activity-diff-new-head {
            color: #047857;
            background: rgba(209, 250, 229, 0.88);
        }

        .dark .fi-in-activity-diff-field-head {
            color: #cbd5e1;
            background: rgba(255, 255, 255, 0.05);
        }

        .dark .fi-in-activity-diff-old-head {
            color: #fde68a;
            background: rgba(245, 158, 11, 0.14);
        }

        .dark .fi-in-activity-diff-new-head {
            color: #a7f3d0;
            background: rgba(16, 185, 129, 0.14);
        }

        .fi-in-activity-diff-field {
            background: rgba(248, 250, 252, 0.72);
            color: #334155;
            font-size: 0.875rem;
            font-weight: 600;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        }

        .fi-in-activity-diff-old,
        .fi-in-activity-diff-new,
        .fi-in-activity-diff-metadata-value {
            color: #111827;
        }

        .fi-in-activity-diff-empty {
            color: #94a3b8;
        }

        .dark .fi-in-activity-diff-field {
            background: rgba(2, 6, 23, 0.36);
            color: #e2e8f0;
        }

        .dark .fi-in-activity-diff-old,
        .dark .fi-in-activity-diff-new,
        .dark .fi-in-activity-diff-metadata-value {
            color: #f8fafc;
        }

        .dark .fi-in-activity-diff-empty {
            color: #94a3b8;
        }

        .fi-in-activity-diff-summary {
            cursor: pointer;
            color: #475569;
            font-size: 0.875rem;
        }

        .fi-in-activity-diff-summary-meta {
            margin-left: 0.4rem;
            color: #94a3b8;
            font-size: 0.75rem;
        }

        .dark .fi-in-activity-diff-summary {
            color: #cbd5e1;
        }

        .fi-in-activity-diff-summary::marker {
            color: #94a3b8;
        }

        .fi-in-activity-diff-code {
            margin-top: 0.75rem;
            padding: 0.9rem 1rem;
            overflow-x: auto;
            border-radius: 0.85rem;
            background: #0f172a;
            color: #f8fafc;
        }

        .fi-in-activity-diff-path-parent {
            display: block;
            color: #64748b;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .fi-in-activity-diff-path-leaf {
            display: block;
            font-size: 0.875rem;
            font-weight: 700;
        }

        .dark .fi-in-activity-diff-path-parent {
            color: #94a3b8;
        }

        .fi-in-activity-diff-empty-state {
            padding: 1rem;
            color: #94a3b8;
            font-size: 0.925rem;
        }

        .fi-in-activity-diff-metadata-row {
            display: grid;
            grid-template-columns: minmax(11rem, 1fr) minmax(0, 2fr);
        }

        .fi-in-activity-diff-metadata-row + .fi-in-activity-diff-metadata-row {
            border-top: 1px solid rgba(148, 163, 184, 0.16);
        }

        .dark .fi-in-activity-diff-metadata-row + .fi-in-activity-diff-metadata-row {
            border-top-color: rgba(255, 255, 255, 0.08);
        }

        .fi-in-activity-diff-metadata-key {
            padding: 0.9rem 1rem;
            color: #475569;
            font-size: 0.875rem;
            font-weight: 600;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        }

        .fi-in-activity-diff-metadata-value {
            padding: 0.9rem 1rem;
        }

        .fi-in-activity-diff-card-header {
            padding: 0.9rem 1rem;
            border-bottom: 1px solid rgba(148, 163, 184, 0.16);
            color: #64748b;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .dark .fi-in-activity-diff-card-header {
            border-bottom-color: rgba(255, 255, 255, 0.08);
            color: #cbd5e1;
        }

        @media (max-width: 900px) {
            .fi-in-activity-diff-row,
            .fi-in-activity-diff-metadata-row {
                grid-template-columns: 1fr;
            }

            .fi-in-activity-diff-head {
                display: none;
            }

            .fi-in-activity-diff-cell,
            .fi-in-activity-diff-metadata-key,
            .fi-in-activity-diff-metadata-value {
                padding-top: 0.75rem;
                padding-bottom: 0.75rem;
            }

            .fi-in-activity-diff-cell::before,
            .fi-in-activity-diff-metadata-value::before {
                content: attr(data-label);
                display: block;
                margin-bottom: 0.35rem;
                color: #64748b;
                font-size: 0.72rem;
                font-weight: 700;
                letter-spacing: 0.08em;
                text-transform: uppercase;
            }

            .dark .fi-in-activity-diff-cell::before,
            .dark .fi-in-activity-diff-metadata-value::before {
                color: #cbd5e1;
            }

            .fi-in-activity-diff-metadata-key {
                display: none;
            }
        }
    </style>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $getEntryWrapperView()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\DynamicComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['entry' => $entry]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div
        <?php echo e($attributes
                ->merge($getExtraAttributes(), escape: false)
                ->class(['fi-in-activity-diff'])); ?>

    >
        <div class="fi-in-activity-diff-card">
            <div class="fi-in-activity-diff-grid">
                <div class="fi-in-activity-diff-row fi-in-activity-diff-head">
                    <div class="fi-in-activity-diff-cell fi-in-activity-diff-field-head">
                        <?php echo e(__('Field')); ?>

                    </div>

                    <div class="fi-in-activity-diff-cell fi-in-activity-diff-old-head">
                        <?php echo e(__('filament-logger::filament-logger.resource.label.old')); ?>

                    </div>

                    <div class="fi-in-activity-diff-cell fi-in-activity-diff-new-head">
                        <?php echo e(__('filament-logger::filament-logger.resource.label.new')); ?>

                    </div>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $groupedRows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group => $rowsInGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($groupedRows->count() > 1): ?>
                        <div class="fi-in-activity-diff-group">
                            <?php echo e(\Illuminate\Support\Str::headline((string) $group)); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $rowsInGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div class="fi-in-activity-diff-row">
                            <div
                                class="fi-in-activity-diff-cell fi-in-activity-diff-field"
                                data-label="<?php echo e(__('Field')); ?>"
                            >
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($row['is_nested'] ?? false): ?>
                                    <span class="fi-in-activity-diff-path-parent"><?php echo e(\Illuminate\Support\Str::beforeLast($row['field'], '.')); ?></span>
                                    <span class="fi-in-activity-diff-path-leaf"><?php echo e(\Illuminate\Support\Str::afterLast($row['field'], '.')); ?></span>
                                <?php else: ?>
                                    <?php echo e($row['field']); ?>

                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['old', 'new']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <?php ($cell = $row[$column]); ?>

                                <div
                                    class="fi-in-activity-diff-cell fi-in-activity-diff-<?php echo e($column); ?> <?php echo e($cell['empty'] ? 'fi-in-activity-diff-empty' : ''); ?>"
                                    data-label="<?php echo e(__('filament-logger::filament-logger.resource.label.' . $column)); ?>"
                                >
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($cell['expandable']): ?>
                                        <details>
                                            <summary class="fi-in-activity-diff-summary">
                                                <?php echo e($cell['summary']); ?>

                                                <span class="fi-in-activity-diff-summary-meta">
                                                    <?php echo e($cell['line_count'] ?? 1); ?>L · <?php echo e($cell['char_count'] ?? 0); ?>C
                                                </span>
                                            </summary>

                                            <pre class="fi-in-activity-diff-code"><?php echo e($cell['display']); ?></pre>
                                        </details>
                                    <?php else: ?>
                                        <pre><?php echo e($cell['display']); ?></pre>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <div class="fi-in-activity-diff-empty-state">
                        <?php echo e(__('No recorded field changes for this activity.')); ?>

                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($metadata) > 0): ?>
            <div class="fi-in-activity-diff-card">
                <div class="fi-in-activity-diff-card-header">
                    <?php echo e(__('filament-logger::filament-logger.resource.label.properties')); ?>

                </div>

                <div class="fi-in-activity-diff-grid">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $metadata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div class="fi-in-activity-diff-metadata-row">
                            <div class="fi-in-activity-diff-metadata-key">
                                <?php echo e($item['field']); ?>

                            </div>

                            <div
                                class="fi-in-activity-diff-metadata-value <?php echo e($item['value']['empty'] ? 'fi-in-activity-diff-empty' : ''); ?>"
                                data-label="<?php echo e($item['field']); ?>"
                            >
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item['value']['expandable']): ?>
                                    <details>
                                        <summary class="fi-in-activity-diff-summary">
                                            <?php echo e($item['value']['summary']); ?>

                                        </summary>

                                        <pre class="fi-in-activity-diff-code"><?php echo e($item['value']['display']); ?></pre>
                                    </details>
                                <?php else: ?>
                                    <pre><?php echo e($item['value']['display']); ?></pre>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php /**PATH /home/masavuin/domains/admin.masavuinvestments.com/public_html/micapp/vendor/mradder/filament-logger/resources/views/infolists/activity-diff.blade.php ENDPATH**/ ?>