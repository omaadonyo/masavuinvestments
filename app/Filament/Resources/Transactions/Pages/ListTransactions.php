<?php

namespace App\Filament\Resources\Transactions\Pages;

use App\Filament\Exports\TransactionExporter;
use App\Filament\Resources\Transactions\TransactionResource;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Actions\ExportAction;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\Pdf;

class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExportAction::make()->exporter(TransactionExporter::class)->icon('heroicon-s-cloud-arrow-down')->columnMappingColumns(4),
            CreateAction::make()->icon('heroicon-s-plus'),
            
            Action::make('export_transactions_pdf')
                ->label('Export Transactions PDF')
                ->color('danger')
                ->icon('heroicon-o-document-arrow-down')
                ->action(function ($livewire) {

                    $records = $livewire->getFilteredTableQuery()
                        ->with(['user', 'approver', 'reviewer'])
                        ->get();

                    $pdf = Pdf::loadView('filament.pdfs.transactions', [
                        'transactions' => $records,
                    ])->setPaper('a4', 'landscape'); // ✅ Landscape

                    return response()->streamDownload(
                        fn () => print($pdf->output()),
                        'transactions-' . now()->format('Y-m-d_H-i-s') . '.pdf'
                    );
                }),
        ];
    }


    
}
