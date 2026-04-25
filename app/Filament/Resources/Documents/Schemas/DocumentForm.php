<?php

namespace App\Filament\Resources\Documents\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                
                Select::make('visibility')
                    ->options(['public' => 'Public', 'private' => 'Private'])
                    ->default('private')
                    ->native(false)
                    ->required(),

                FileUpload::make('document_path')
                    ->visibility('public')
                    ->required(),

                Select::make('category')
                    ->options(['pdf' => 'Pdf', 'docx' => 'Docx', 'image' => 'Image'])
                    ->default('pdf')
                    ->native(false)
                    ->required(),
            ]);
    }
}
