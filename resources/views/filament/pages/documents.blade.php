<x-filament::page>

<x-filament::callout
    icon="heroicon-o-information-circle"
    color="primary"
>
    <x-slot name="heading" color="primary">
        Company documents and policies
    </x-slot>

    <x-slot name="description">
        Documents here have been preapproved for member consumption. Ensure to read through
    </x-slot>
    
</x-filament::callout>

@php
$documents = \App\Models\Document::where('visibility', 'public')->get();
@endphp

<div style="
    display:grid; 
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr)); 
    gap:10px;
">

@foreach ($documents as $document)

<x-filament::modal slide-over width="3xl">

    <!-- Trigger Card -->
    <x-slot name="trigger">
        <div 
            style="
                cursor:pointer;
                border:3px solid #ffb900;
                border-radius:14px;
                padding:10px;
                height:190px;
                display:flex;
                flex-direction:column;
                justify-content:space-between;
                background:#ffffff;
                transition: all 0.2s ease;
            "
            onmouseover="this.style.transform='scale(1.03)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.12)'"
            onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none'"
        >

            <!-- Preview Area -->
            <div style="
                height:150px;
                
                display:flex;
                align-items:center;
                justify-content:center;
                background:#f3f4f6;
                border-radius:10px;
                overflow:hidden;
            ">
                @if ($document->category === 'image')
                    <img 
                        src="{{ Storage::url($document->document_path) }}" 
                        style="
                            width:100%;
                            height:100%;
                            object-fit:cover;
                        "
                    />
                @else
                    <x-filament::icon-button  
                        size="lg" 
                        icon="heroicon-s-document-text" 
                        style="
                            background:transparent;
                            width:50px;
                            height:50px;
                            color:#9ca3af;
                        "
                    />
                @endif
            </div>

            <!-- Title -->
            <div style="margin-top:8px; text-align:center;">
                <div style="
                    font-size:12px;
                    font-weight:600;
                    max-width:100px;
                    min-width:100px;
                    color:#374151;
                    line-height:1.2;
                    height:fit-content;
                    overflow:hidden;
                ">
                    {{ $document->title }}
                </div>
            </div>

        </div>
    </x-slot>

    <!-- Modal Header -->
    <x-slot name="heading">
        <div style="
            display:flex; 
            align-items:center; 
            justify-content:space-between; 
            width:100%;
        ">
            <span style="font-size:16px; font-weight:600;">
                {{ $document->title }}
            </span>
        </div>
    </x-slot>

    <!-- Document Viewer -->
    <div style="margin-top:12px;">

        @if ($document->category === 'image')
            <div style="display:flex; justify-content:center;">
                <img 
                    src="{{ Storage::url($document->document_path) }}" 
                    style="
                        max-height:80vh; 
                        max-width:100%; 
                        object-fit:contain; 
                        border-radius:12px;
                    "
                />
            </div>
        @else
            <iframe 
                src="{{ Storage::url($document->document_path) }}" 
                style="
                    width:100%; 
                    height:85vh; 
                    border-radius:12px; 
                    border:1px solid #e5e7eb;
                "
            ></iframe>
        @endif

    </div>

    <x-slot name="footer">
            <x-filament::button  
                    size="sm"
                    icon="heroicon-s-pencil"
                    href="/account/documents/{{ $document->id }}/edit"
                    tag="a"
                    style="
                        background-color:#ffb900; 
                        border:none;
                    "
                >
                Edit
            </x-filament::button>

            <x-filament::button  
                    size="sm"
                    icon="heroicon-s-pencil"
                    wire:click="deleteDocument({{ $document->id }})"
                    tag="a"
                    color="danger"
                    style="
                        border:none;
                    "
                >
                Delete
            </x-filament::button>
    </x-slot>

</x-filament::modal>

@endforeach

</div>

</x-filament::page>