<x-filament::page>

<style>

/* ============================================
           PROJECT CARDS
        ============================================ */
        .project-card {
            background: rgba(255, 255, 255, 0);
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            border: 1px solid oklch(0.97 0 0 / 0.12);
            transition: all 0.3s ease;
            margin: 0.25rem;
        }

        .grid-3 {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card-title {
            font-weight: 800;
            color: #ffac13;
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .project-image-wrapper {
            position: relative;
            overflow: hidden;
            height: 148px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .project-image {
            width: auto;
            height: stretch;
            object-fit: cover;
            transition: transform 0.5s ease;margin: 1px;
        }

        .project-card:hover .project-image {
            transform: scale(1.05);
        }

        .project-badge {
            position: absolute;
            bottom: 1rem;
            left: 1rem;
            padding: 0.375rem 0.875rem;
            background: var(--primary);
            color: white;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .project-body {
            padding: 1.5rem;
        }

        .masonry-gallery {
            display: flex;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-auto-rows: 10px;
            gap: 10px;
        }

        .masonry-item {
            break-inside: avoid;
            margin-bottom: 10px;
        }

        .masonry-item img {
            width: 100%;
            display: block;
            border-radius: 14px;
            object-fit: cover;
        }

</style>

@php
    
    $projects = \App\Models\project::where('active', true)->get();

@endphp

  <!-- ============================================
         PROJECTS SECTION
    ============================================ -->
    <section id="projects" class="section section--warm">
        <div class="container">
   

            @if(count($projects) > 0 )

                @foreach ($projects as $project)

                <x-filament::modal width="4xl" icon="heroicon-o-information-circle" slide-over>
                    <x-slot name="trigger">
                        <div class="grid-3" style="margin-top: 3rem;">
                    <div class="project-card animate-on-scroll">
                        <div class="project-image-wrapper">
                            @foreach( $project->photos as $photo)

                            <img src="{{ Storage::url($photo) }}" alt="Real Estate Development" class="project-image">

                            @endforeach
        
                            <span class="project-badge">Active Investment</span>
                        </div>
                        <div class="project-body">
                            <div>
                                <h3 class="card-title">{{ $project->title }}</h3>
                                <p class="text-muted">{{ substr($project->description, 0 , 180) }}</p>
                            </div>
                            <div>

                                
                                <x-filament::button 
                                    icon='heroicon-s-pencil'
                                    tag="a"
                                    size="xs"
                                    style="border-radius:30px;padding:5px 14px;margin-top:1rem;"
                                    color="success"
                                    href="/account/projects/{{ $project->id }}/edit">Edit</x-filament::button>

                                <x-filament::button 
                                    icon='heroicon-s-trash'
                                    tag="a"
                                    size="xs"
                                    style="border-radius:30px;padding:5px 14px;margin-top:1rem;"
                                    color="danger"
                                    wire:click="deleteProject({{ $project->id }})">Delete</x-filament::button>
                            </div>
                        </div>
                    </div>
                </div>
                    </x-slot>

                    <x-slot name="heading">
                        {{ $project->title }}
                    </x-slot>

                    <div class="masonry-gallery">
                        @foreach($project->photos as $photo)
                            <div class="masonry-item">
                                <img src="{{ Storage::url($photo) }}" alt="Real Estate Development" class="project-image">
                            </div>
                        @endforeach
                    </div>

                    {{ $project->description }}
                </x-filament::modal>

                @endforeach

            @else

                <x-filament::empty-state icon="heroicon-m-user" icon-size="sm">

                    <x-slot name="heading">
                        No projects yet
                    </x-slot>

                    <x-slot name="description">
                        Get started by adding a new project.
                    </x-slot>

                    <x-slot name="footer">
                        <x-filament::button icon="heroicon-m-plus" tag="a" href="/account/projects/create">
                            Create Project
                        </x-filament::button>
                    </x-slot>

                </x-filament::empty-state>

            @endif
            

            

            


           
        </div>
    </section>


</x-filament::page>