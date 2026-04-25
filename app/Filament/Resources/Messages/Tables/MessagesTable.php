<?php

namespace App\Filament\Resources\Messages\Tables;

use App\Mail\SendEmail;
use App\Models\Message;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Mail;

class MessagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->emptyStateDescription('Messages you send to members appear here.')
            ->emptyStateActions([
                Action::make('create')
                    ->label('Create message')
                    ->url('/account/messages/create')
                    ->icon('heroicon-m-plus')
                    ->button(),
            ])
            ->columns([
                TextColumn::make('subject')
                    ->searchable(),
                TextColumn::make('content')
                    ->limit(50),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'sent' => 'success',
                    })
                    ->icon(fn (string $state): Heroicon => match ($state) {
                        'draft' => Heroicon::OutlinedPencil,
                        'sent' => Heroicon::OutlinedCheckCircle,
                    }),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ActionGroup::make([
                    
                    
                    Action::make('send')
                        ->icon('heroicon-s-paper-airplane')
                        ->action(function (Message $message){

                            $members = \App\Models\User::where(['application_status' => 'approved', 'status' => 'active'])->get();
                            foreach( $members as $member){
                                Mail::to($member->email)->send(new SendEmail($message));
                            }

                            Notification::make()
                                ->title('Sent successfully')
                                ->success()
                                ->body('Your message has been sent successfully')
                                ->send();

                            $message->update([
                                'status' => 'sent',
                            ]);
                            
                        }),
                    ViewAction::make()->slideOver(),
                    EditAction::make(),
                    DeleteAction::make(),

                ]),


            ], position: RecordActionsPosition::BeforeColumns)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
