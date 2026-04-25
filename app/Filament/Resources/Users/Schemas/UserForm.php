<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                Grid::make(1)->schema([
                    
                        TextInput::make('name')->placeholder('Full Name')->required(),
                        TextInput::make('email')->label('Email address') ->email()->placeholder('Email Address')->required(),
                        TextInput::make('phone_number')->placeholder('Phone Number')->default(null),
                        TextInput::make('member_number')->default(null)->placeholder('Member Number'),
                        DatePicker::make('date_of_birth')->native(false)->default(null)->placeholder('Date of Birth'),
                        DatePicker::make('date_of_joining')->native(false)->placeholder('Date Joined'),
                        TextInput::make('place_of_residence')->default(null)->placeholder('Residence'),
                        TextInput::make('national_id_passort_number')->placeholder('NIN Number'),
                        TextInput::make('highest_level_of_education')->placeholder('Highest Level of Education'),
                        TextInput::make('source_of_income')->placeholder('Source of Income'),
                        TextInput::make('profession')->placeholder('Profession'),
                        TextInput::make('next_of_kin_name')->placeholder('Next of Kin')->default(null),
                        TextInput::make('relationship_next_of_kin')->placeholder('Relationship')->default(null),
                        TextInput::make('contacts_next_of_kin')->placeholder('Next of Kin Contacts')->default(null),
                        TextInput::make('active_bank_account_name')->placeholder('Bank')->default(null),
                        TextInput::make('active_bank_account_number')->placeholder('Bank Account Number')->default(null),
                        
                        FileUpload::make('avatar_url')->visibility('public')->default(null),
                        FileUpload::make('national_id_photo')->visibility('public')->default(null),
                        FileUpload::make('current_photo')->visibility('public')->default(null),
                    

                   Select::make('application_status')
                        ->options([
                            'Approved' => 'Approved',
                            'Pending' => 'Pending',
                            'Rejected' => 'Rejected',
                            'Cancelled' => 'Cancelled',
                        ])
                        ->default('Pending')
                        ->native(false)
                        ->required(),
                        
                    Select::make('status')
                        ->options([
                            'active' => 'Active',
                            'suspended' => 'Suspended',
                            'banned' => 'Banned',
                            'in-active' => 'In active',
                        ])
                        ->native(false)
                        ->required(),
                
                    Toggle::make('is_admin'),
                    Toggle::make('acknowledgment_on_tos')->required()->label('Have read all the above documents.'),

                ]), 

            ]);
    }
}
