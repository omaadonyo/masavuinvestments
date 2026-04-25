<x-filament::page>

<style>


       /* ============================================
           PORTFOLIO CARD (Hero)
        ============================================ */
        .portfolio-card {
            background: white;
            border-radius: 1.5rem;
            padding: 1rem;
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
            margin-bottom: 0.25rem;
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
            margin-bottom: -12px;
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

@php


$years = [2024, 2025, 2026];

$targetsSummary = [];

$annualTargetPerMember = 1200000;

foreach ($years as $year) {

    $targets = \App\Models\Target::whereYear('starts_on', $year)->get();

    $members = $targets->count();

    $expectedTotal = $members * $annualTargetPerMember;

    $actualTotal = $targets->sum('target_scores');

    $performance = $expectedTotal > 0
        ? ($actualTotal / $expectedTotal) * 100
        : 0;

    $targetsSummary[$year] = [
        'members' => $members,
        'expected_total' => $expectedTotal,
        'actual_total' => $actualTotal,
        'performance' => round($performance, 2),
    ];
}
  
    $targets = \App\Models\Target::all();

@endphp



<div style="display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
    position: sticky;
    top: 1rem;
    z-index: 9999;
    backdrop-filter: blur(9px);
    box-shadow: 0px 9px 12px #00000036;
    border-radius: 23px;">

@foreach($targetsSummary as $year => $data)

    @php
        $percent = min($data['performance'], 100);

        $color = $percent >= 75 ? '#16a34a' : ($percent >= 50 ? '#f59e0b' : '#ef4444');
    @endphp

    <div style="
        background: #ef444412;
        border-radius: 16px;
        padding: 16px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        border-left: 17px solid {{ $color }};
        font-family: Arial, sans-serif;
    ">

        <div style="display:flex; justify-content:space-between; align-items:center;">
            <h2 style="margin:0; font-size:18px; font-weight:bold;">
                {{ $year }}
            </h2>

            <span style="
                font-size:12px;
                padding:4px 10px;
                background: {{ $color }};
                color:white;
                border-radius:999px;
            ">
                {{ $data['members'] }} Members
            </span>
        </div>

        <div style="margin-top:10px;">
            <p style="margin:0; font-size:12px; color:#6b7280;">
                Club Performance
            </p>

            <p style="margin:0; font-size:26px; font-weight:bold; color:{{ $color }};">
                {{ $data['performance'] }}%
            </p>
        </div>

        <div style="margin-top:12px; font-size:13px;">
            <div style="display:flex; justify-content:space-between; margin-bottom:6px;">
                <span>Expected</span>
                <b>UGX {{ number_format($data['expected_total']) }}</b>
            </div>

            <div style="display:flex; justify-content:space-between;">
                <span>Actual</span>
                <b>UGX {{ number_format($data['actual_total']) }}</b>
            </div>
        </div>

        {{-- Progress bar --}}
        <div style="
            margin-top:12px;
            width:100%;
            height:8px;
            background:#e5e7eb;
            border-radius:999px;
            overflow:hidden;
        ">
            <div style="
                width: {{ $percent }}%;
                height:100%;
                background: {{ $color }};
            "></div>
        </div>

    </div>

@endforeach

</div>

  


                @if( count($targets) > 0 )

                    @foreach( $targets as $target)

                        <div>
                            <div class="portfolio-card">
                                <div class="portfolio-header">
                                    <div class="portfolio-icon">

                                      @if($target->user?->avatar_url )
                                               <img src="https://masavuinvestments.com/storage/{{ $target->user->avatar_url }}">
                                      @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                            <polyline points="16 7 22 7 22 13"></polyline>
                                        </svg>
                                      @endif
                                        
                                    </div>
                                    <div>
                                        @php
                                            $contribution = \App\Models\Contribution::where(['target_id' => $target->id,  'user_id' => $target->user_id, 'status' => 'approved'])->sum('total_deposit');
                                        @endphp

                                        <p class="portfolio-label">{{ $target->user->name ?? 'N/A' }}'s Milestone</p>
                                        <p class="portfolio-value">UGX {{ number_format($target->target_scores) }}</p>
                                    </div>
                                </div>

                                <div class="portfolio-item">
                                    <div class="portfolio-item-header">
                                        <span class="text-muted">{{ $target->title }}</span>
                                      <p class="portfolio-label">Started On: <b> {{ \Carbon\Carbon::parse($target->starts_on)->format('M j, Y') }}</b> 
                                      Ends On: <b> {{ \Carbon\Carbon::parse($target->ends_on)->format('M j, Y') }} </b> </p>
                                        <div style="">
                                            <span class="font-semibold">

                                                {{ round((( $target->target_scores / $target->final_target) * 100), 1) }}%

                                            </span>
                                            <b class="font-semibold">{{ number_format($target->final_target).' UGX' }}</b>
                                        </div>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill progress-fill--amber" data-width="{{ (($contribution /$target->final_target)*100) }}"></div>
                                    </div>
                                </div>


                             
                            </div>
                        </div>

                        @endforeach

                @else

                <x-filament::empty-state icon="heroicon-m-user" icon-size="sm">

                    <x-slot name="heading">
                        No targets set yet
                    </x-slot>

                    <x-slot name="description">
                        Get started by adding a new target.
                    </x-slot>

                    <x-slot name="footer">
                        <x-filament::button icon="heroicon-m-plus" tag="a" href="/account/targets/create">
                            Set New Target
                        </x-filament::button>
                    </x-slot>

                </x-filament::empty-state>

            @endif



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

</x-filament::page>