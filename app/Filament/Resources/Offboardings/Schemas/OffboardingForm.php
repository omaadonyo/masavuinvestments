<?php

namespace App\Filament\Resources\Offboardings\Schemas;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Slider;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OffboardingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Personal Information')->schema([
                    TextInput::make('name')
                        ->label('Full Name')
                        ->placeholder('Enter your full name')
                        ->required()
                        ->maxLength(255),
                    DatePicker::make('date_of_exit')
                        ->label('Date of Exit')
                        ->native(false)
                        ->required(),
                    Select::make('membership_duration')
                        ->label('Membership Duration')
                        ->native(false)
                        ->options([
                            'less_than_1year' => 'Less than 1 year',
                            '1_to_2.5_years' => 'Between 1 and 2.5 years',
                            '2.5_years_and_above' => '2.5 years and above',
                        ])
                        ->required(),
                    Select::make('role_in_club')
                        ->label('Role in the Club')
                        ->native(false)
                        ->options([
                            'general_member' => 'General Member',
                            'committee_member' => 'Committee Member',
                            'leadership_and_management' => 'Leadership and Management',
                        ])
                        ->required(),
                ])->columns(2)->collapsed(),

                Section::make('Exit Reason')->schema([
                    TextInput::make('main_reason_leaving')
                        ->label('Main Reason for Leaving')
                        ->required(),
                    Textarea::make('reason_details')
                        ->label('Please explain in detail')
                        ->rows(1)
                        ->nullable(),
                ])->collapsed(),

                Section::make('Experience Feedback')->schema([
                    Slider::make('overall_experience')
                        ->label('Overall Experience')
                        ->maxValue(5),
                    Textarea::make('liked_most')
                        ->label('What did you like most?')
                        ->rows(2)
                        ->nullable(),
                    Textarea::make('liked_least')
                        ->label('What did you like least?')
                        ->rows(2)
                        ->nullable(),
                    CheckboxList::make('satisfaction_ratings')
                        ->label('Satisfaction Ratings')
                        ->columns(2)
                        ->options([
                            'Leadership and Management' => 'Leadership and Management',
                            'Communication with Members' => 'Communication with Members',
                            'Transparency in Finance' => 'Transparency in Finance',
                            'Investment Opportunities' => 'Investment Opportunities',
                            'Member Engagement' => "Member's engagement in decision making and activities",
                        ]),
                ])->collapsed(),

                Section::make('Recommendations')->schema([
                    Textarea::make('recommended_improvements')->label('Improvements')->rows(4),
                    Textarea::make('continue_doing')->label('Continue Doing')->rows(4),
                    Textarea::make('stop_doing')->label('Stop Doing')->rows(2),
                ])->collapsed(),

                Section::make('Future & Additional')->schema([
                    Radio::make('rejoin_future')
                        ->label('Would you consider rejoining?')
                        ->options(['yes' => 'Yes', 'no' => 'No', 'maybe' => 'Maybe']),
                    Radio::make('recommend_to_others')
                        ->label('Would you recommend the club?')
                        ->options(['yes' => 'Yes', 'no' => 'No', 'maybe' => 'Maybe']),
                    Textarea::make('additional_comments')->label('Additional Comments')->rows(2),
                ])->collapsed(),

                Section::make('Confirmation')->schema([
                    Toggle::make('exit_confirmation')
                        ->label('I confirm that I am voluntarily exiting the club')
                        ->required(),
                    Toggle::make('cooperation_confirmation')
                        ->label('I shall cooperate with the exit process')
                        ->required(),
                ])->collapsed(),
            ]);
    }
}
