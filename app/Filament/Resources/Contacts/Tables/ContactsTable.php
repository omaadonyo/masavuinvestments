<?php

namespace App\Filament\Resources\Contacts\Tables;

use App\Mail\NewContactMessageReply;
use App\Models\Contact;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Mail;

class ContactsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->emptyStateDescription('Messages from anonymous visitors appear here.')
            ->emptyStateActions([
                Action::make('create')
                    ->label('Create message')
                    ->url('/account/messages/create')
                    ->icon('heroicon-m-plus')
                    ->button(),
            ])
            ->columns([
                TextColumn::make('full_name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                ToggleColumn::make('read')
                    ->label('read'),
                TextColumn::make('message')
                    ->limit(50)
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
                 ActionGroup::make([
                Action::make('reply')
                    ->icon('heroicon-s-arrow-path-rounded-square')
                    ->color('info')
                    ->schema([
                        Textarea::make('reply'),
                        ])
                    ->action(function (Contact $contact, $data){
                        
                        //create reply
                        $contact_message_reply = \App\Models\Reply::create([
                            'contact_id' => $contact->id,
                            'message' => $data['reply'],
                        ]);

                        //send response to client
                        $newMsg = [
                            'contact_id' => $contact->id,
                            'message' => $data['reply'],
                            'previous_msg' => $contact->message
                        ];
                        Mail::to($contact->email)->send(new NewContactMessageReply($newMsg));

                        $contact->update([
                            'read' => true
                        ]);

                        Notification::make()->title('Saved successfully')->success()->body('Your response has been sent successfully')->send();
                    }),
                EditAction::make(),
            ]),
                
            ], position: RecordActionsPosition::BeforeColumns)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
