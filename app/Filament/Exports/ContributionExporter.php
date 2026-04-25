<?php

namespace App\Filament\Exports;

use App\Models\Contribution;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class ContributionExporter extends Exporter
{
    protected static ?string $model = Contribution::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('user_id'),
            ExportColumn::make('reference'),
            ExportColumn::make('amount'),
            ExportColumn::make('managment_fee'),
            ExportColumn::make('return_fee'),
            ExportColumn::make('management_fee'),
            ExportColumn::make('total_deposit'),
            ExportColumn::make('payment_proof'),
            ExportColumn::make('notes'),
            ExportColumn::make('status'),
            ExportColumn::make('approved_by'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
            ExportColumn::make('deleted_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your contribution export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
