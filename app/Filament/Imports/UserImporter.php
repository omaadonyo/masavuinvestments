<?php

namespace App\Filament\Imports;

use App\Models\User;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Number;

class UserImporter extends Importer
{
    protected static ?string $model = User::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('uuid')
                ->label('UUID')
                ->rules(['max:255']),
            ImportColumn::make('is_admin')
                ->requiredMapping()
                ->boolean()
                ->rules(['required', 'boolean']),
            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('avatar_url')
                ->rules(['max:255']),
            ImportColumn::make('full_name')
                ->rules(['max:255']),
            ImportColumn::make('email')
                ->requiredMapping()
                ->rules(['required', 'email', 'max:255']),
            ImportColumn::make('email_verified_at')
                ->rules(['email', 'datetime']),
            ImportColumn::make('password')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('application_status')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('status')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('member_account')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('member_number')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('date_of_birth')
                ->rules(['max:255']),
            ImportColumn::make('date_of_joining')
                ->rules(['max:255']),
            ImportColumn::make('place_of_residence')
                ->rules(['max:255']),
            ImportColumn::make('phone_number')
                ->rules(['max:255']),
            ImportColumn::make('email_address')
                ->rules(['email', 'max:255']),
            ImportColumn::make('national_id_passort_number')
                ->rules(['max:255']),
            ImportColumn::make('source_of_income')
                ->rules(['max:255']),
            ImportColumn::make('highest_level_of_education')
                ->rules(['max:255']),
            ImportColumn::make('profession')
                ->rules(['max:255']),
            ImportColumn::make('next_of_kin_name')
                ->rules(['max:255']),
            ImportColumn::make('relationship_next_of_kin')
                ->rules(['max:255']),
            ImportColumn::make('contacts_next_of_kin')
                ->rules(['max:255']),
            ImportColumn::make('active_bank_account_name')
                ->rules(['max:255']),
            ImportColumn::make('active_bank_account_number')
                ->rules(['max:255']),
            ImportColumn::make('national_id_photo')
                ->rules(['max:255']),
            ImportColumn::make('current_photo')
                ->rules(['max:255']),
            ImportColumn::make('agree_tos')
                ->rules(['max:255']),
        ];
    }

    // \App\Models\User::where('id', $record->user_id)->update(['password' => Hash::make('MIC123456')]);

    public function resolveRecord(): User
    {
        return new User();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your user import has completed and ' . Number::format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
