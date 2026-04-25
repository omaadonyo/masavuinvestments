<div>
    <div class="space-y-4">
    <!-- Document Info -->
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <!-- Icon based on category -->
            @php
                $icons = [
                    'image' => 'heroicon-o-photograph',
                    'pdf' => 'heroicon-o-document-text',
                    'word' => 'heroicon-o-document',
                ];
                $icon = $icons[$record->category] ?? 'heroicon-o-document';
            @endphp

            <h2 class="font-semibold text-lg">{{ $record->title }}</h2>
        </div>
        <span class="text-gray-500 text-sm">{{ ucfirst($record->visibility) }}</span>
    </div>

    <!-- Slider / Preview -->
    <div class="relative">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <!-- Only one item for now, can loop if multiple docs -->
                <div class="swiper-slide flex justify-center items-center">
                    @if($record->category === 'image')
                        <img src="{{ asset('storage/'.$record->document_path) }}" 
                             alt="{{ $record->title }}" 
                             class="max-h-96 rounded shadow-lg"/>
                    @else
                        <div class="flex flex-col items-center justify-center p-4 border rounded bg-gray-50">
                            <x-heroicon-o-document-text class="w-16 h-16 text-gray-400"/>
                            <p class="mt-2 text-gray-600">{{ $record->title }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <!-- Metadata -->
    <div class="text-sm text-gray-500">
        Created at: {{ \Carbon\Carbon::parse($record->created_at)->format('M d, Y H:i') }} |
        Updated at: {{ \Carbon\Carbon::parse($record->updated_at)->format('M d, Y H:i') }}
    </div>
</div>

<!-- Swiper JS -->
@push('scripts')
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
@endpush
</div>