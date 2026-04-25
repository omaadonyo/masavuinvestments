<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Slider;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Tapp\FilamentProgressBarColumn\Tables\Columns\ProgressBarColumn;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    TextInput::make('title')
                        ->required(),

                    TextInput::make('valuation')
                        ->label('Project Valuation')
                        ->placeholder('e.g 2,000,000'),

                    MarkdownEditor::make('description')
                        ->default(null)
                        ->columnSpanFull(),

                    Toggle::make('active')
                        ->required(),
                ]),
              
                FileUpload::make('photos')
                    ->panelLayout('grid')
                    ->visibility('public')
                    ->multiple(),
                
            ]);
    }
}
