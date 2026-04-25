<?php

namespace App\Filament\Widgets;

use App\Models\Contribution;
use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $lastContribution = Contribution::where('user_id', auth()->id())->latest()->first();
        $lastTransaction = Transaction::where('user_id', auth()->id())->latest()->first();
        // dd($lastContribution);

        $user = auth()->user();

        $totalContributions = $user->is_admin
        ? Contribution::where('status', 'approved')->sum('amount') // 👈 admin sees all
        : Contribution::where('user_id', $user->id)->sum('amount'); // 👈 user sees own

        return [
            Stat::make('Total Contributions', number_format($totalContributions) . ' UGX')
                ->description(number_format($lastContribution->amount ?? 0) . ' UGX last contribution')
                ->descriptionIcon('heroicon-m-plus')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Total Interest', \App\Models\Contribution::where('user_id', auth()->id())->sum('return_fee'). ' Ugx')
                ->description('2% last earning')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('danger'),
            Stat::make('Account Balance', number_format(\App\Models\User::where('id', auth()->id())->sum('member_account')). ' Ugx')
                ->description(number_format($lastTransaction->amount ?? 0) . 'Ugx last transaction')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('primary'),
        ];
    }
}
