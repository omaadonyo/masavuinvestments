<?php

namespace App\Filament\Resources\Onboardings\Pages;

use App\Filament\Resources\Onboardings\OnboardingResource;
use App\Models\Onboarding;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;

class ListOnboardings extends ListRecords
{
    protected static string $resource = OnboardingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),

            Action::make('export_pdf')
                ->label('Export PDF')
                ->color('danger')
                ->icon('heroicon-o-document-arrow-down')
                ->action(function () {

                    $records = Onboarding::all();

                    $pdf = Pdf::loadView('filament.pdfs.onboardings', [
                        'onboardings' => $records,
                    ])->setPaper('a4', 'landscape'); // ✅ LANDSCAPE HERE;

                    return response()->streamDownload(
                        fn () => print($pdf->output()),
                        'onboardings-' . now()->format('Y-m-d_H-i-s') . '.pdf'
                    );
                })

        ];
    }

    public function getTabs(): array
    {
        //['pending', 'approved', 'review', 'rejected'
        return [
            'all' => Tab::make(),
            'Pending' => Tab::make()->icon(Heroicon::Bell)->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'pending')),
            'Approved' => Tab::make()->icon(Heroicon::Check)->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'approved')),
            'Review' => Tab::make()->icon('heroicon-s-shield-check')->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'review')),
            'Rejected' => Tab::make()->icon('heroicon-s-x-mark')->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'rejected')),
        ];
    }
}
