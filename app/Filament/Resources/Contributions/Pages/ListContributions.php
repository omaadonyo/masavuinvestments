<?php

namespace App\Filament\Resources\Contributions\Pages;

use App\Filament\Exports\ContributionExporter;
use App\Filament\Resources\Contributions\ContributionResource;
use App\Livewire\ContributionsOverview;
use App\Models\Contribution;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;
use Barryvdh\DomPDF\Facade\Pdf;

class ListContributions extends ListRecords
{
    protected static string $resource = ContributionResource::class;

    
    protected function getHeaderWidgets(): array
    {
        return [
            ContributionsOverview::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make()->exporter(ContributionExporter::class)->icon('heroicon-s-cloud-arrow-down')->columnMappingColumns(4),
            CreateAction::make()->icon('heroicon-s-plus'),
            
            Action::make('export_pdf')
                ->label('Export PDF')
                ->color('danger')
                ->icon('heroicon-o-document-arrow-down')
                ->action(function () {

                    $records = Contribution::with(['user', 'target', 'approvedBy'])->get();

                    $pdf = Pdf::loadView('filament.pdfs.contributions', [
                        'contributions' => $records,
                    ])->setPaper('a4', 'landscape'); // ✅ LANDSCAPE HERE;

                    return response()->streamDownload(
                        fn () => print($pdf->output()),
                        'contributions-' . now()->format('Y-m-d_H-i-s') . '.pdf'
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
