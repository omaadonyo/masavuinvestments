<?php


use Filament\Actions\Action;

use App\Mail\NewContactMessage;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Schemas\Concerns\InteractsWithSchemas;
use Filament\Schemas\Contracts\HasSchemas;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
    
new class extends Component implements HasSchemas 
{
    use InteractsWithSchemas;
    
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }
    
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('full_name')
                    ->placeholder('John Doe')
                    ->prefixIcon('heroicon-o-user')
                    ->required(),

                TextInput::make('email')
                    ->placeholder('Kampala, Uganda')
                    ->prefixIcon('heroicon-o-map-pin')
                    ->required(),

                Textarea::make('message')
                    ->placeholder('Your message goes here')
                    ->rows(5)
                    ->required(),
            ])
            ->statePath('data');
    }
    
    public function create(): void
    {
        $contact_message = \App\Models\Contact::create($this->form->getState());

        if($contact_message){

            Mail::to('amazing.chief23@gmail.com')->send(new NewContactMessage($contact_message));

            Notification::make()
                ->title('Saved successfully')
                ->success()
                ->body('Your message has been sent successfully')
                ->send();

        } else {
            // error
        }

        $this->reset();
    }
    

};
?>

<div>
        <form wire:submit="create">

            {{ $this->form }}

            <x-filament::button 
                style="margin-top:1.5rem;"
                type="submit"
                icon="heroicon-m-sparkles">
                Submit
            </x-filament::button>
        </form>
        
        <x-filament-actions::modals />
</div>