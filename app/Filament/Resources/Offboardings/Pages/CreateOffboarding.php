<?php

namespace App\Filament\Resources\Offboardings\Pages;

use App\Filament\Resources\Offboardings\OffboardingResource;
use App\Mail\ContributionSubmittedMail;
use App\Models\Transaction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class CreateOffboarding extends CreateRecord
{
    protected static string $resource = OffboardingResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $cbn = \App\Models\Contribution::where('user_id', auth()->id())->sum('amount');

        $data['user_id'] = auth()->id();
        $data['total_contribution'] = $cbn;
        $data['total_contribution_withdraw_charges'] = 12000;
        $data['total_contribution_interest'] = (($cbn * 0.1));
        $data['status'] = 'pending';

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Offboarding started successfully';
    }

    protected function afterCreate(): void
    {  
        //create transcation record of the, plus activity
        // dd($this->record);
        $mgtfee = \App\Models\Contribution::where(['user_id' => auth()->id()])->sum('managment_fee');

        Transaction::create([
            'txn_id' => Str::uuid(),
            'txn_reference' => 'TXN_WDN_'.rand(1000000, 1000000000),
            'user_id' => $this->record->user_id,
            'txn_type' => 'withdrawal',
            'total_deposit' => $this->record->total_contribution,
            'amount' => $this->record->total_contribution,
            'management_fees' => $mgtfee,
            'status' => $this->record->status,
            'payment_proof' => null,
            'return_fee' => 0,
            'notes'  => ' Member withdrawal from club',
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

        // //send a copy to client
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
