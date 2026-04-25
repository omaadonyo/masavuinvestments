<?php

namespace App\Filament\Resources\Projects\Pages;

use App\Filament\Resources\Projects\ProjectResource;
use App\Models\Project;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProjects extends ListRecords
{
    protected static string $resource = ProjectResource::class;

    protected string $view = 'filament.pages.projects';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
    public function deleteProject(Project $project)
    {
        $project->where(['id' => $project->id, 'user_id' => $project->user_id])->delete();
    }
}
