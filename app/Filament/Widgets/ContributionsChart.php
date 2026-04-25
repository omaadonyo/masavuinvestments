<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ContributionsChart extends ChartWidget
{
    protected ?string $heading = 'Contribution Performance Overview';

   protected static ?int $sort = 3;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $userId = auth()->id();

        $data = DB::table('contributions')
            ->join('targets', 'contributions.target_id', '=', 'targets.id')
            // ->where('targets.user_id', 35)
            ->select(
                DB::raw('YEAR(contributions.created_at) as year'),
                DB::raw("SUM(CASE WHEN contributions.status = 'approved' THEN contributions.amount ELSE 0 END) as total_contributions"),
                DB::raw("SUM(CASE WHEN contributions.status = 'approved' THEN contributions.return_fee ELSE 0 END) as returns_earned")
            )
            ->groupBy(DB::raw('YEAR(contributions.created_at)'))
            ->orderBy('year')
            ->get();

        $labels = [];
        $contributions = [];
        $returns = [];
        $percentage = [];

        foreach ($data as $row) {
            $labels[] = (string) $row->year;

            $total = (float) $row->total_contributions;
            $return = (float) $row->returns_earned;

            $contributions[] = $total;
            $returns[] = $return;

            // 📊 Contribution efficiency %
            $percentage[] = $total > 0
                ? round(($return / $total) * 100, 2)
                : 0;
        }

        return [
            'labels' => $labels,

            'datasets' => [
                [
                    'label' => 'Total Contributions',
                    'data' => $contributions,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.7)',
                ],
                [
                    'label' => 'Returns Earned',
                    'data' => $returns,
                    'backgroundColor' => 'rgba(75, 192, 192, 0.7)',
                ],
                [
                    'label' => 'Return %',
                    'data' => $percentage,
                    'type' => 'line',
                    'borderColor' => 'orange',
                    'yAxisID' => 'percentage',
                    'tension' => 0.4,
                ],
            ],
        ];
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,

            'plugins' => [
                'tooltip' => [
                    'callbacks' => [
                        'label' => \Illuminate\Support\Js::from(
                            "function(context) {
                                if (context.dataset.label === 'Return %') {
                                    return context.raw + '%';
                                }
                                return context.dataset.label + ': ' + Number(context.raw).toLocaleString();
                            }"
                        ),
                    ],
                ],
            ],

            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                ],
                'percentage' => [
                    'position' => 'right',
                    'beginAtZero' => true,
                    'max' => 100,
                    'grid' => [
                        'drawOnChartArea' => false,
                    ],
                ],
            ],
        ];
    }
}