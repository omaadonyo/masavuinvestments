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


<style>


       /* ============================================
           PORTFOLIO CARD (Hero)
        ============================================ */
        .portfolio-card {
            background: white;
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            border: 4px solid #ffb900;
            position: relative;
        }

        .portfolio-card:where(.dark,.dark *) {
            background: #2c2002;
        }

        .portfolio-card::before {
            content: '';
            position: absolute;
            inset: -12px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            border-radius: 2rem;
            opacity: 0.15;
            z-index: -1;
            transform: rotate(3deg);
        }

        .portfolio-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .portfolio-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--green-400) 0%, var(--green-600) 100%);
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .portfolio-label {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        .portfolio-value {
            font-size: 1.75rem;
            font-weight: 700;
        }

        .portfolio-item {
            margin-bottom: 1rem;
        }

        .portfolio-item-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .progress-bar {
            height: 12px;
            background: var(--gray-100);
            border-radius: 9999px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 9999px;
            width: 0;
            transition: width 1.5s ease;
        }

        .progress-fill--amber {
            background: linear-gradient(90deg, #fbbf24, #f59e0b);
        }

        .portfolio-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 0rem;
            margin-top: 0rem;
        }


</style>

<?php
    
    $targets = \App\Models\Target::all();

?>


                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if( count($targets) > 0 ): ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $targets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $target): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>

                        <div>
                            <div class="portfolio-card">
                                <div class="portfolio-header">
                                    <div class="portfolio-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                            <polyline points="16 7 22 7 22 13"></polyline>
                                        </svg>
                                    </div>
                                    <div>
                                        <?php
                                            $contribution = \App\Models\Contribution::where(['target_id' => $target->id,  'user_id' => $target->user_id, 'status' => 'approved'])->sum('total_deposit');
                                        ?>

                                        <p class="portfolio-label"><?php echo e($target->user->name); ?>'s Milestone</p>
                                        <p class="portfolio-value">UGX <?php echo e(number_format($target->target_scores)); ?></p>
                                    </div>
                                </div>

                                <div class="portfolio-item">
                                    <div class="portfolio-item-header">
                                        <span class="text-muted"><?php echo e($target->title); ?></span>
                                        <div style="display: flex;flex-direction: column;align-items: flex-end;">
                                            <span class="font-semibold">

                                                <?php echo e(round((($target->target_scores/$target->final_target) * 100), 2)); ?>%

                                            </span>
                                            <b class="font-semibold"><?php echo e(number_format($target->final_target).' UGX'); ?></b>
                                        </div>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill progress-fill--amber" data-width="<?php echo e((($contribution/$target->final_target)*100)); ?>"></div>
                                    </div>
                                </div>


                                <div class="portfolio-footer">
                                    <div>
                                        <p class="portfolio-label">Started On: <?php echo e($target->starts_on); ?> </p>
                                    </div>
                                    <div class="returns-badge">
                                        
                                        Ends On: <?php echo e($target->ends_on); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                <?php else: ?>

                <?php if (isset($component)) { $__componentOriginal18b7d5277b8ac8ab91a5868675cf72d4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18b7d5277b8ac8ab91a5868675cf72d4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.empty-state','data' => ['icon' => 'heroicon-m-user','iconSize' => 'sm']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicon-m-user','icon-size' => 'sm']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>


                     <?php $__env->slot('heading', null, []); ?> 
                        No targets set yet
                     <?php $__env->endSlot(); ?>

                     <?php $__env->slot('description', null, []); ?> 
                        Get started by adding a new target.
                     <?php $__env->endSlot(); ?>

                     <?php $__env->slot('footer', null, []); ?> 
                        <?php if (isset($component)) { $__componentOriginal6330f08526bbb3ce2a0da37da512a11f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.button.index','data' => ['icon' => 'heroicon-m-plus','tag' => 'a','href' => '/account/targets/create']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicon-m-plus','tag' => 'a','href' => '/account/targets/create']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                            Set New Target
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
                     <?php $__env->endSlot(); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18b7d5277b8ac8ab91a5868675cf72d4)): ?>
<?php $attributes = $__attributesOriginal18b7d5277b8ac8ab91a5868675cf72d4; ?>
<?php unset($__attributesOriginal18b7d5277b8ac8ab91a5868675cf72d4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18b7d5277b8ac8ab91a5868675cf72d4)): ?>
<?php $component = $__componentOriginal18b7d5277b8ac8ab91a5868675cf72d4; ?>
<?php unset($__componentOriginal18b7d5277b8ac8ab91a5868675cf72d4); ?>
<?php endif; ?>

            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>



<!-- ============================================
         JAVASCRIPT
    ============================================ -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
        // ============================================
        // FAQ Toggle
        // ============================================
        function toggleFaq(element) {
            const faqItem = element.parentElement;
            const allItems = document.querySelectorAll('.faq-item');

            // Close all other items
            allItems.forEach(item => {
                if (item !== faqItem) {
                    item.classList.remove('active');
                }
            });

            // Toggle current item
            faqItem.classList.toggle('active');
        }

        // ============================================
        // Contact Form Handler
        // ============================================
        function handleSubmit(event) {
            event.preventDefault();

            const form = document.getElementById('contactForm');
            const successMessage = document.getElementById('successMessage');

            // Hide form, show success
            form.style.display = 'none';
            successMessage.style.display = 'block';

            // Reset after 3 seconds
            setTimeout(() => {
                form.style.display = 'block';
                successMessage.style.display = 'none';
                form.reset();
            }, 3000);
        }

        // ============================================
        // Animated Counter
        // ============================================
        function animateCounter(element) {
            const target = parseInt(element.dataset.count);
            const prefix = element.dataset.prefix || '';
            const suffix = element.dataset.suffix || '';
            const format = element.dataset.format;
            const duration = 2000;
            const startTime = performance.now();

            function updateCounter(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const easeOutQuart = 1 - Math.pow(1 - progress, 4);
                const current = Math.floor(easeOutQuart * target);

                if (format === 'compact') {
                    if (current >= 1000000000) {
                        element.textContent = prefix + (current / 1000000000).toFixed(1) + 'B' + suffix;
                    } else if (current >= 1000000) {
                        element.textContent = prefix + (current / 1000000).toFixed(0) + 'M' + suffix;
                    } else if (current >= 1000) {
                        element.textContent = prefix + (current / 1000).toFixed(0) + 'K' + suffix;
                    } else {
                        element.textContent = prefix + current.toLocaleString() + suffix;
                    }
                } else {
                    element.textContent = prefix + current.toLocaleString() + suffix;
                }

                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                }
            }

            requestAnimationFrame(updateCounter);
        }

        // ============================================
        // Progress Bar Animation
        // ============================================
        function animateProgressBar(element) {
            const targetWidth = element.dataset.width;
            setTimeout(() => {
                element.style.width = targetWidth + '%';
            }, 500);
        }

        // ============================================
        // Scroll Animation (Intersection Observer)
        // ============================================
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');

                    // Trigger counter animation
                    if (entry.target.classList.contains('stat-number')) {
                        animateCounter(entry.target);
                    }

                    // Trigger progress bar animation
                    if (entry.target.classList.contains('progress-fill')) {
                        animateProgressBar(entry.target);
                    }

                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe all elements with animation classes
        document.querySelectorAll('.animate-on-scroll, .stat-number, .progress-fill').forEach(el => {
            observer.observe(el);
        });

        // ============================================
        // Smooth Scroll for Anchor Links
        // ============================================
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // ============================================
        // Initialize Progress Bars on Load
        // ============================================
        window.addEventListener('load', () => {
            document.querySelectorAll('.progress-fill').forEach(bar => {
                if (bar.getBoundingClientRect().top < window.innerHeight) {
                    animateProgressBar(bar);
                }
            });
        });
    </script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald2aa9f7b74553621bdcc3c69267ff328)): ?>
<?php $attributes = $__attributesOriginald2aa9f7b74553621bdcc3c69267ff328; ?>
<?php unset($__attributesOriginald2aa9f7b74553621bdcc3c69267ff328); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald2aa9f7b74553621bdcc3c69267ff328)): ?>
<?php $component = $__componentOriginald2aa9f7b74553621bdcc3c69267ff328; ?>
<?php unset($__componentOriginald2aa9f7b74553621bdcc3c69267ff328); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\mic-admin\resources\views\filament\pages\targets.blade.php ENDPATH**/ ?>