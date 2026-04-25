<?php

namespace App\Filament\Resources\Contributions\Pages;

use App\Filament\Resources\Contributions\ContributionResource;
use App\Mail\ContributionSubmittedMail;
use App\Models\Transaction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CreateContribution extends CreateRecord
{
    protected static string $resource = ContributionResource::class;

    protected string $view = 'filament.pages.create-contribution';

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['management_fee'] = 2000;
        $data['reference'] = 'TXN_CBN_'.rand(1000000, 1000000000);
        $data['status'] = 'pending';

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Contribution added successfully';
    }

    protected function afterCreate(): void
    {  
        //create transcation record of the, plus activity
        Transaction::create([
            'txn_id' => Str::uuid(),
            'txn_reference' => $this->record->reference,
            'user_id' => $this->record->user_id,
            'txn_type' => 'contribution',
            'total_deposit' => $this->record->total_deposit,
            'amount' => $this->record->amount,
            'management_fees' => $this->record->management_fee,
            'status' => $this->record->status,
            'payment_proof' => null,
            'return_fee' => 0,
            'notes'  => $this->record->notes,
            'approved_by' => $this->record->approved_by,
            'reviewed_by' => null,
        ]);

        Notification::make()->title('Transaction recorded successfully')->success()->send();

        $admins = \App\Models\User::where('is_admin', true)->get();

        foreach ($admins as $admin) {
           Notification::make()
            ->title(auth()->user()->name. ' made a contribution')
            ->success()
            ->body(auth()->user()->name.' made a total contribution of '. $this->data['total_deposit']. ', kindly review and approved, he will receive an confirmation email from you.')
            ->sendToDatabase($admin);
        }

        // send email to admins
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new ContributionSubmittedMail($this->data));
            Mail::to('amazing.chief23@gmail.com')->send(new ContributionSubmittedMail($this->data));
        }

        //send a copy to client
        Mail::to(auth()->user()->email)->send(new ContributionSubmittedMail($this->data));

        // notifiy the user
        $recipient = auth()->user();
        Notification::make()
            ->title('Contribution submitted successfully')
            ->success()
            ->body('Once your contribution is acknowledged, you will be able to use the other apps. Check your email for approval in a few')
            ->sendToDatabase($recipient);
    }
}
