<?php

namespace App\Filament\Resources\Contributions\Schemas;


use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContributionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([


            Section::make([
                TextInput::make('amount')
                        ->required()
                        ->prefix('UGX')
                        // ->mask(RawJs::make('$money($input)'))
                        ->stripCharacters(',')
                        ->numeric()
                        ->live(debounce: 800)
                        ->afterStateUpdated(function ($state, callable $get, callable $set) {
                            $set('total_deposit', ($state ?? 0) + ($get('management_fee') ?? 0));
                        }),

                    Select::make('target_id')
                        ->label('Contribute Towards')
                        ->required()
                        ->options(\App\Models\Target::where([/*'status' => 'ongoing',*/ 'user_id' => auth()->id()])->pluck('title', 'id'))
                        ->native(false),

                    Textarea::make('notes')
                        ->default('Payment made via mobile money')
                        ->columnSpanFull(),
                ])->description('Please add your contribution, you wont be able to edit this after the submission.'),

                Section::make([
                    TextInput::make('managment_fee')
                        ->required()
                        ->live(debounce: 800)
                        ->afterStateUpdated(function ($state, callable $get, callable $set) {
                            $set('total_deposit', ($get('amount') ?? 0) + ($state ?? 0));
                        }),

                    TextInput::make('total_deposit')
                        ->required()
                        ->numeric()
                        ->dehydrated()
                        ->default(0),
                ])->grow(false),

                FileUpload::make('payment_proof')
                    ->label('Upload Payment Proof'),
            ]);
    }
}
