<?php

namespace App\Filament\Resources\Onboardings\Schemas;

use Filament\Actions\Action;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class OnboardingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
           ->components([
            Wizard::make([

                Step::make('Personal')
                    ->description('Personal details')
                    ->completedIcon(Heroicon::HandThumbUp)
                    ->icon('heroicon-o-user')
                    ->schema([
                        Grid::make(2)->schema([

                            TextInput::make('full_name')
                                ->placeholder('John Doe')
                                ->prefixIcon('heroicon-o-user')
                                ->required(),

                            DatePicker::make('date_of_birth')
                                ->prefixIcon('heroicon-o-calendar')
                                ->native(false)
                                ->required(),

                            DatePicker::make('date_of_joining')
                                ->prefixIcon('heroicon-o-calendar-days')
                                ->native(false)
                                ->required(),

                            TextInput::make('place_of_residence')
                                ->placeholder('Kampala, Uganda')
                                ->prefixIcon('heroicon-o-map-pin')
                                ->required(),

                            TextInput::make('phone_number')
                                ->tel()
                                ->placeholder('+256 7XX XXX XXX')
                                ->prefixIcon('heroicon-o-phone')
                                ->required(),

                            TextInput::make('email_address')
                                ->email()
                                ->placeholder('email@example.com')
                                ->prefixIcon('heroicon-o-envelope')
                                ->required(),

                            TextInput::make('national_id_passort_number')
                                ->label('National ID / Passport')
                                ->placeholder('CM12345678')
                                ->prefixIcon('heroicon-o-identification')
                                ->required(),

                        ]),
                        
                    ]),

                Step::make('Professional')
                    ->completedIcon(Heroicon::HandThumbUp)
                    ->description('Next of KIN')
                    ->icon('heroicon-o-briefcase')
                    ->schema([

                    Grid::make(2)->schema([

                            TextInput::make('source_of_income')
                                ->placeholder('Salary, Business...')
                                ->prefixIcon('heroicon-o-currency-dollar')
                                ->required(),

                            TextInput::make('highest_level_of_education')
                                ->placeholder('Bachelor’s Degree')
                                ->prefixIcon('heroicon-o-academic-cap')
                                ->required(),

                            TextInput::make('profession')
                                ->placeholder('Software Developer')
                                ->prefixIcon('heroicon-o-wrench-screwdriver')
                                ->required(),

                            TextInput::make('next_of_kin_name')
                                ->placeholder('Full name')
                                ->prefixIcon('heroicon-o-user')
                                ->required(),

                        ]),

                        Grid::make(2)->schema([

                            

                            TextInput::make('relationship_next_of_kin')
                                ->placeholder('Brother, Mother...')
                                ->prefixIcon('heroicon-o-heart')
                                ->required(),

                            TextInput::make('contacts_next_of_kin')
                                ->placeholder('+256 7XX XXX XXX')
                                ->prefixIcon('heroicon-o-phone')
                                ->required(),

                        ]),
                        
                    ]),





                Step::make('Confirmation')
                    ->completedIcon(Heroicon::HandThumbUp)
                    ->description('Uploads, NIN')
                    ->icon('heroicon-o-cloud-arrow-up')
                    ->schema([

                     Grid::make(2)->schema([

                            TextInput::make('active_bank_account_name')
                                ->placeholder('Account holder name')
                                ->prefixIcon('heroicon-o-user')
                                ->required(),

                            TextInput::make('active_bank_account_number')
                                ->placeholder('0123456789')
                                ->prefixIcon('heroicon-o-credit-card')
                                ->suffixIcon('heroicon-o-lock-closed')
                                ->required(),

                        ]),

                        FileUpload::make('national_id_photo')
                            ->label('National ID Photo')
                            ->image()
                            ->visibility('public')
                            ->directory('onboarding/national_ids')
                            ->imagePreviewHeight('150')
                            ->maxSize(1024),

                        FileUpload::make('current_photo')
                            ->label('Current Photo')
                            ->image()
                            ->visibility('public')
                            ->directory('onboarding/photos')
                            ->imagePreviewHeight('150')
                            ->maxSize(1024),

                        Checkbox::make('agree_tos')
                            ->label('I agree to Terms and Conditions')
                            ->required(),

                    ]),

            ])->columns(1)
            ->submitAction(
                Action::make('submit')
                    ->label('Submit Application')
                    ->color('success')
                    ->submit('save')
            )

        ]);
    }
}
