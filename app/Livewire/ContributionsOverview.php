<?php

namespace App\Livewire;

use App\Models\Contribution;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ContributionsOverview extends StatsOverviewWidget
{
    
    protected function getStats(): array
    {

        
        // Get total contributions
        $totalContributions = \App\Models\Contribution::where(['status' => 'approved'])->sum('amount');

        // Investment assumptions
        $annualReturnRate = 0.18; // 18% expected annual return
        $years = 5;

        // Profit Calculations
        $estimatedAnnualProfit = $totalContributions * $annualReturnRate;
        $estimatedMonthlyProfit = $estimatedAnnualProfit / 12;
        $estimatedFiveYearValue = $totalContributions * pow((1 + $annualReturnRate), $years);
        $estimatedFiveYearProfit = $estimatedFiveYearValue - $totalContributions;

        $user = auth()->user();

        $totalContributions = Contribution::where('status', 'approved')->sum('amount'); // 👈 admin sees all
        
        // : Contribution::where('user_id', $user->id)->sum('amount'); // 👈 user sees own

        $pendingContributions =  Contribution::where('status', 'pending')->sum('amount');
        // ? Contribution::where('status', 'pending')->sum('amount') // 👈 admin sees all
        // : Contribution::where(['user_id' => $user->id, 'status' => 'pending'])->sum('amount'); // 👈 user sees own
 

        return [
            
            Stat::make('Total Contributions', number_format($totalContributions). ' UGX')
                ->description(number_format($lastContribution->amount ?? 0) . 'Ugx last contribution')
                ->descriptionIcon('heroicon-m-plus')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),

            Stat::make('Pending Contributions', number_format($pendingContributions). ' UGX')
                ->description('18%')
                ->descriptionIcon('heroicon-m-bell')
                ->chart([7, 2, 10, 25, 3, 8, 10])
                ->color('primary'),

            Stat::make('Estimated Monthly Profit', number_format($estimatedMonthlyProfit) . ' UGX')
                ->description('12 Months')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->chart([7, 2, 10, 25, 3, 8, 10])
                ->color('info'),

            Stat::make('25-Year Projected Profit', number_format($estimatedFiveYearProfit) . ' UGX')
                ->description('10%')
                ->descriptionIcon('heroicon-m-chart-bar-square')
                ->chart([7, 2, 10, 25, 3, 8, 10])
                ->color('danger'),
        ];
    }
}
