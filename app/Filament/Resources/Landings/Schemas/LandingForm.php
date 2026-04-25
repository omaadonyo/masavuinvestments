<?php

namespace App\Filament\Resources\Landings\Schemas;

use App\Models\Landing;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;


class LandingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                Tabs::make('Landing Page Sections')
                    ->contained(false)
                    ->tabs([
                        // Hero Section
                        self::heroSectionTab(),

                        // Features Section
                        self::featuresSectionTab(),

                        // How It Works Section
                        self::howItWorksSectionTab(),

                        // FAQ Section
                        self::faqSectionTab(),

                        // CTA Section
                        self::ctaSectionTab(),

                        // Contact Section
                        self::contactSectionTab(),

                        // Footer Section
                        self::footerSectionTab(),
                    ]),
            ]);
    }

    protected static function heroSectionTab(): Tab
    {
        return Tab::make('hero')
            ->label(__('Hero Section'))
            ->icon('heroicon-o-sparkles')
            ->schema([
                Section::make('Hero Badge')
                    ->icon('heroicon-o-check-badge')
                    ->schema([
                        TextInput::make('hero_badge')
                            ->label('Badge Text')
                            ->default('Trusted by 15+ Members')
                            ->maxLength(255),
                        
                        TextInput::make('brandname')
                            ->label('Brand Name')
                            ->default('Masavau Investments')
                            ->maxLength(255),

                        FileUpload::make('logo')
                            ->label('Logo'),

                        FileUpload::make('favicon')
                            ->label('Favicon'),
                    ]),

                Section::make('Hero Title')
                    ->icon('heroicon-o-hashtag')
                    ->schema([
                        TextInput::make('hero_title_line1')
                            ->label('Title Line 1')
                            ->default('Build Wealth Faster Through')
                            ->maxLength(255),
                        TextInput::make('hero_title_line2')
                            ->label('Title Line 2 (Accent Color)')
                            ->default('Trusted Collective Investment')
                            ->maxLength(255),
                    ]),

                Section::make('Hero Description')
                    ->icon('heroicon-o-chat-bubble-bottom-center-text')
                    ->schema([
                        Textarea::make('hero_description')
                            ->label('Description')
                            ->default('Enter the hero description...')
                            ->rows(3),
                    ]),

                Section::make('Call to Action Buttons')
                    ->icon('heroicon-o-cursor-arrow-rays')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('hero_primary_cta_text')
                                    ->label('Primary CTA Text')
                                    ->default('Become a Member')
                                    ->maxLength(100),
                                TextInput::make('hero_primary_cta_link')
                                    ->label('Primary CTA Link')
                                    ->default('#join')
                                    ->maxLength(255),
                            ]),
                        Grid::make(2)
                            ->schema([
                                TextInput::make('hero_secondary_cta_text')
                                    ->label('Secondary CTA Text')
                                    ->default('Member Login')
                                    ->maxLength(100),
                                TextInput::make('hero_secondary_cta_link')
                                    ->label('Secondary CTA Link')
                                    ->default('#login')
                                    ->maxLength(255),
                            ]),
                    ]),
            ]);
    }

    protected static function featuresSectionTab(): Tab
    {
        return Tab::make('features')
            ->label(__('Features Section'))
            ->icon('heroicon-o-star')
            ->schema([
                Section::make('Section Header')
                    ->icon('heroicon-o-identification')
                    ->schema([
                        TextInput::make('features_badge')
                            ->label('Badge Text')
                            ->default('Why Choose Us')
                            ->maxLength(255),
                        TextInput::make('features_title')
                            ->label('Section Title')
                            ->default('Why Join Masavu Investment Club')
                            ->maxLength(255),
                        Textarea::make('features_subtitle')
                            ->label('Subtitle')
                            ->default('Enter section subtitle...')
                            ->rows(2),
                    ]),

                Section::make('Feature Card 1')
                    ->icon('heroicon-o-star')
                    ->schema([
                        Select::make('feature1_icon')
                            ->label('Icon')
                            ->options(Landing::getAvailableIcons()),
                        TextInput::make('feature1_title')
                            ->label('Title')
                            ->default('Pooled Capital Power')
                            ->maxLength(255),
                        Textarea::make('feature1_description')
                            ->label('Description')
                            ->default('Enter feature description...')
                            ->rows(3),
                    ]),

                Section::make('Feature Card 2')
                    ->icon('heroicon-o-star')
                    ->schema([
                        Select::make('feature2_icon')
                            ->label('Icon')
                            ->options(Landing::getAvailableIcons()),
                        TextInput::make('feature2_title')
                            ->label('Title')
                            ->default('Professional Management')
                            ->maxLength(255),
                        Textarea::make('feature2_description')
                            ->label('Description')
                            ->default('Enter feature description...')
                            ->rows(3),
                    ]),

                Section::make('Feature Card 3')
                    ->icon('heroicon-o-star')
                    ->schema([
                        Select::make('feature3_icon')
                            ->label('Icon')
                            ->options(Landing::getAvailableIcons()),
                        TextInput::make('feature3_title')
                            ->label('Title')
                            ->default('Secure & Transparent')
                            ->maxLength(255),
                        Textarea::make('feature3_description')
                            ->label('Description')
                            ->default('Enter feature description...')
                            ->rows(3),
                    ]),
            ]);
    }

    protected static function howItWorksSectionTab(): Tab
    {
        return Tab::make('how-it-works')
            ->label(__('How It Works'))
            ->icon('heroicon-o-list-bullet')
            ->schema([
                Section::make('Section Header')
                    ->icon('heroicon-o-identification')
                    ->schema([
                        TextInput::make('howitworks_badge')
                            ->label('Badge Text')
                            ->default('Getting Started')
                            ->maxLength(255),
                        TextInput::make('howitworks_title')
                            ->label('Section Title')
                            ->default('How It Works')
                            ->maxLength(255),
                        Textarea::make('howitworks_subtitle')
                            ->label('Subtitle')
                            ->default('Enter section subtitle...')
                            ->rows(2),
                    ]),

                Section::make('Step 1')
                    ->icon('heroicon-o-numbered-list')
                    ->schema([
                        TextInput::make('step1_title')
                            ->label('Step Title')
                            ->default('Sign Up')
                            ->maxLength(255),
                        Textarea::make('step1_description')
                            ->label('Step Description')
                            ->default('Describe what happens in this step...')
                            ->rows(2),
                    ]),

                Section::make('Step 2')
                    ->icon('heroicon-o-numbered-list')
                    ->schema([
                        TextInput::make('step2_title')
                            ->label('Step Title')
                            ->default('Choose Plan')
                            ->maxLength(255),
                        Textarea::make('step2_description')
                            ->label('Step Description')
                            ->default('Describe what happens in this step...')
                            ->rows(2),
                    ]),

                Section::make('Step 3')
                    ->icon('heroicon-o-numbered-list')
                    ->schema([
                        TextInput::make('step3_title')
                            ->label('Step Title')
                            ->default('Invest')
                            ->maxLength(255),
                        Textarea::make('step3_description')
                            ->label('Step Description')
                            ->default('Describe what happens in this step...')
                            ->rows(2),
                    ]),

                Section::make('Step 4')
                    ->icon('heroicon-o-numbered-list')
                    ->schema([
                        TextInput::make('step4_title')
                            ->label('Step Title')
                            ->default('Grow')
                            ->maxLength(255),
                        Textarea::make('step4_description')
                            ->label('Step Description')
                            ->default('Describe what happens in this step...')
                            ->rows(2),
                    ]),
            ]);
    }

    protected static function faqSectionTab(): Tab
    {
        return Tab::make('faq')
            ->label(__('FAQ Section'))
            ->icon('heroicon-o-question-mark-circle')
            ->schema([
                Section::make('Section Header')
                    ->icon('heroicon-o-identification')
                    ->schema([
                        TextInput::make('faq_badge')
                            ->label('Badge Text')
                            ->default('Got Questions?')
                            ->maxLength(255),
                        TextInput::make('faq_title')
                            ->label('Section Title')
                            ->default('Frequently Asked Questions')
                            ->maxLength(255),
                        Textarea::make('faq_subtitle')
                            ->label('Subtitle')
                            ->default('Enter section subtitle...')
                            ->rows(2),
                    ]),

                Section::make('FAQ Items')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->schema([
                        Repeater::make('faq_items')
                            ->label('FAQ Items')
                            ->schema([
                                TextInput::make('question')
                                    ->label('Question')
                                    ->default('Enter question...')
                                    ->maxLength(255),
                                Textarea::make('answer')
                                    ->label('Answer')
                                    ->default('Enter answer...')
                                    ->rows(3),
                            ])
                            ->defaultItems(0)
                            ->addActionLabel('Add FAQ Item'),
                    ])
                    ->collapsible(),

                // Individual FAQ fields for easier editing
                Section::make('FAQ Item 1')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->schema([
                        TextInput::make('faq1_question')
                            ->label('Question 1')
                            ->default('How much is the monthly contribution?')
                            ->maxLength(255),
                        Textarea::make('faq1_answer')
                            ->label('Answer 1')
                            ->default('Enter answer...')
                            ->rows(3),
                    ]),

                Section::make('FAQ Item 2')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->schema([
                        TextInput::make('faq2_question')
                            ->label('Question 2')
                            ->default('Can I withdraw my investment?')
                            ->maxLength(255),
                        Textarea::make('faq2_answer')
                            ->label('Answer 2')
                            ->default('Enter answer...')
                            ->rows(3),
                    ]),

                Section::make('FAQ Item 3')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->schema([
                        TextInput::make('faq3_question')
                            ->label('Question 3')
                            ->default('Who manages the funds?')
                            ->maxLength(255),
                        Textarea::make('faq3_answer')
                            ->label('Answer 3')
                            ->default('Enter answer...')
                            ->rows(3),
                    ]),

                Section::make('FAQ Item 4')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->schema([
                        TextInput::make('faq4_question')
                            ->label('Question 4')
                            ->default('What makes Masavu different?')
                            ->maxLength(255),
                        Textarea::make('faq4_answer')
                            ->label('Answer 4')
                            ->default('Enter answer...')
                            ->rows(3),
                    ]),

                Section::make('FAQ Item 5')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->schema([
                        TextInput::make('faq5_question')
                            ->label('Question 5')
                            ->default('Optional question...')
                            ->maxLength(255)
                            ->nullable(),
                        Textarea::make('faq5_answer')
                            ->label('Answer 5')
                            ->default('Enter answer...')
                            ->rows(3)
                            ->nullable(),
                    ]),

                Section::make('FAQ Item 6')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->schema([
                        TextInput::make('faq6_question')
                            ->label('Question 6')
                            ->default('Optional question...')
                            ->maxLength(255)
                            ->nullable(),
                        Textarea::make('faq6_answer')
                            ->label('Answer 6')
                            ->default('Enter answer...')
                            ->rows(3)
                            ->nullable(),
                    ]),
            ]);
    }

    protected static function ctaSectionTab(): Tab
    {
        return Tab::make('cta')
            ->label(__('CTA Section'))
            ->icon('heroicon-o-megaphone')
            ->schema([
                Section::make('Call to Action Banner')
                    ->icon('heroicon-o-megaphone')
                    ->description('This section creates the main call-to-action banner on the landing page.')
                    ->schema([
                        TextInput::make('cta_headline')
                            ->label('Headline')
                            ->default('Start Your Wealth Journey Today')
                            ->maxLength(255),
                        Textarea::make('cta_body')
                            ->label('Body Text')
                            ->default('Enter the motivational message...')
                            ->rows(3),
                    ]),
            ]);
    }

    protected static function contactSectionTab(): Tab
    {
        return Tab::make('contact')
            ->label(__('Contact Section'))
            ->icon('heroicon-o-envelope')
            ->schema([
                Section::make('Section Header')
                    ->icon('heroicon-o-identification')
                    ->schema([
                        TextInput::make('contact_badge')
                            ->label('Badge Text')
                            ->default('Get In Touch')
                            ->maxLength(255),
                        TextInput::make('contact_title')
                            ->label('Section Title')
                            ->default('Contact Us')
                            ->maxLength(255),
                        Textarea::make('contact_subtitle')
                            ->label('Subtitle')
                            ->default('Enter section subtitle...')
                            ->rows(2),
                    ]),

                Section::make('Contact Information')
                    ->icon('heroicon-o-phone')
                    ->schema([
                        TextInput::make('contact_phone')
                            ->label('Phone numbered-list')
                            ->default('+256 700 123 456')
                            ->maxLength(50)
                            ->tel(),
                        TextInput::make('contact_email')
                            ->label('Email Address')
                            ->default('info@masavuinvestments.com')
                            ->maxLength(255)
                            ->email(),
                        TextInput::make('contact_address')
                            ->label('Physical Address')
                            ->default('Kampala, Uganda')
                            ->maxLength(255),
                    ]),
            ]);
    }

    protected static function footerSectionTab(): Tab
    {
        return Tab::make('footer')
            ->label(__('Footer Section'))
            ->icon('heroicon-o-window')
            ->schema([
                Section::make('Footer Branding')
                    ->icon('heroicon-o-building-office')
                    ->schema([
                        TextInput::make('footer_brand')
                            ->label('Brand Name')
                            ->default('Masavu Investment Club')
                            ->maxLength(255),
                        Textarea::make('footer_description')
                            ->label('Brand Description')
                            ->default('Enter footer description...')
                            ->rows(3),
                    ]),

                Section::make('Quick Links')
                    ->icon('heroicon-o-link')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('quicklink1')
                                    ->label('Link 1')
                                    ->default('Features')
                                    ->maxLength(100),
                                TextInput::make('quicklink2')
                                    ->label('Link 2')
                                    ->default('Projects')
                                    ->maxLength(100),
                                TextInput::make('quicklink3')
                                    ->label('Link 3')
                                    ->default('FAQ')
                                    ->maxLength(100),
                                TextInput::make('quicklink4')
                                    ->label('Link 4')
                                    ->default('Contact')
                                    ->maxLength(100),
                            ]),
                    ]),

                Section::make('Legal Links')
                    ->icon('heroicon-o-scale')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextInput::make('legallink1')
                                    ->label('Legal Link 1')
                                    ->default('Privacy Policy')
                                    ->maxLength(100),
                                TextInput::make('legallink2')
                                    ->label('Legal Link 2')
                                    ->default('Terms of Service')
                                    ->maxLength(100),
                                TextInput::make('legallink3')
                                    ->label('Legal Link 3')
                                    ->default('Cookie Policy')
                                    ->maxLength(100),
                            ]),
                    ]),
            ]);
    }
}
