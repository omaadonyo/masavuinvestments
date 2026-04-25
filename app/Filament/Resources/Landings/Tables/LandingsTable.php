<?php

namespace App\Filament\Resources\Landings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class LandingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('hero_badge')
                    ->searchable(),
                TextColumn::make('hero_title_line1')
                    ->searchable(),
                TextColumn::make('hero_title_line2')
                    ->searchable(),
                TextColumn::make('hero_primary_cta_text')
                    ->searchable(),
                TextColumn::make('hero_primary_cta_link')
                    ->searchable(),
                TextColumn::make('hero_secondary_cta_text')
                    ->searchable(),
                TextColumn::make('hero_secondary_cta_link')
                    ->searchable(),
                TextColumn::make('features_badge')
                    ->searchable(),
                TextColumn::make('features_title')
                    ->searchable(),
                TextColumn::make('feature1_icon')
                    ->searchable(),
                TextColumn::make('feature1_title')
                    ->searchable(),
                TextColumn::make('feature2_icon')
                    ->searchable(),
                TextColumn::make('feature2_title')
                    ->searchable(),
                TextColumn::make('feature3_icon')
                    ->searchable(),
                TextColumn::make('feature3_title')
                    ->searchable(),
                TextColumn::make('howitworks_badge')
                    ->searchable(),
                TextColumn::make('howitworks_title')
                    ->searchable(),
                TextColumn::make('step1_title')
                    ->searchable(),
                TextColumn::make('step2_title')
                    ->searchable(),
                TextColumn::make('step3_title')
                    ->searchable(),
                TextColumn::make('step4_title')
                    ->searchable(),
                TextColumn::make('faq_badge')
                    ->searchable(),
                TextColumn::make('faq_title')
                    ->searchable(),
                TextColumn::make('faq1_question')
                    ->searchable(),
                TextColumn::make('faq2_question')
                    ->searchable(),
                TextColumn::make('faq3_question')
                    ->searchable(),
                TextColumn::make('faq4_question')
                    ->searchable(),
                TextColumn::make('faq5_question')
                    ->searchable(),
                TextColumn::make('faq6_question')
                    ->searchable(),
                TextColumn::make('cta_headline')
                    ->searchable(),
                TextColumn::make('contact_badge')
                    ->searchable(),
                TextColumn::make('contact_title')
                    ->searchable(),
                TextColumn::make('contact_phone')
                    ->searchable(),
                TextColumn::make('contact_email')
                    ->searchable(),
                TextColumn::make('contact_address')
                    ->searchable(),
                TextColumn::make('footer_brand')
                    ->searchable(),
                TextColumn::make('quicklink1')
                    ->searchable(),
                TextColumn::make('quicklink2')
                    ->searchable(),
                TextColumn::make('quicklink3')
                    ->searchable(),
                TextColumn::make('quicklink4')
                    ->searchable(),
                TextColumn::make('legallink1')
                    ->searchable(),
                TextColumn::make('legallink2')
                    ->searchable(),
                TextColumn::make('legallink3')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ], position: RecordActionsPosition::BeforeColumns)
            ->toolbarActions([
                BulkActionGroup::make([
                    // DeleteBulkAction::make(),
                ]),
            ]);
    }
}
