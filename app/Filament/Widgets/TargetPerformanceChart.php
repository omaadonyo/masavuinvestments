<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class TargetPerformanceChart extends ChartWidget
{
    protected ?string $heading = 'Target Performance Overview';

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getData(): array
    {
        $userId = auth()->id();

        $data = DB::table('targets')
            ->where('user_id', 35)
            ->select(
                DB::raw('YEAR(starts_on) as year'),
                DB::raw('SUM(final_target) as target'),
                DB::raw('SUM(target_scores) as score')
            )
            ->groupBy(DB::raw('YEAR(starts_on)'))
            ->orderBy('year')
            ->get();

        $labels = [];
        $targets = [];
        $scores = [];
        $performance = [];
        $statusColors = [];
        $expectedProgress = [];

        foreach ($data as $row) {
            $labels[] = (string) $row->year;

            $target = (float) $row->target;
            $score = (float) $row->score;

            $targets[] = $target;
            $scores[] = $score;

            // 📈 Performance %
            $percent = $target > 0
                ? round(($score / $target) * 100, 2)
                : 0;

            $performance[] = $percent;

            // 🎯 Status coloring
            $statusColors[] = match (true) {
                $percent >= 80 => 'rgba(75, 192, 192, 0.7)', // green
                $percent >= 50 => 'rgba(255, 206, 86, 0.7)', // yellow
                default => 'rgba(255, 99, 132, 0.7)',        // red
            };

            // 📈 Expected linear progress (simple benchmark)
            $expectedProgress[] = 80; // 80% baseline expectation per year
        }

        return [
            'labels' => $labels,

            'datasets' => [
                [
                    'label' => 'Target',
                    'data' => $targets,
                    'backgroundColor' => 'rgba(200,200,200,0.5)',
                ],
                [
                    'label' => 'Score',
                    'data' => $scores,
                    'backgroundColor' => $statusColors,
                ],
                [
                    'label' => 'Performance %',
                    'data' => $performance,
                    'type' => 'line',
                    'borderColor' => 'orange',
                    'yAxisID' => 'percentage',
                    'tension' => 0.4,
                ],
                [
                    'label' => 'Expected (80%)',
                    'data' => $expectedProgress,
                    'type' => 'line',
                    'borderColor' => 'blue',
                    'borderDash' => [5, 5],
                    'yAxisID' => 'percentage',
                ],
            ],
        ];
    }

  protected function getOptions(): array
{
    return [
        'responsive' => true,

        'interaction' => [
            'mode' => 'index',
            'intersect' => false,
        ],

        'plugins' => [
            'tooltip' => [
                'enabled' => true,
                'mode' => 'index',
                'intersect' => false,

                'callbacks' => [
                    'label' => \Illuminate\Support\Js::from(
                        "function(context) {
                            const label = context.dataset.label || '';
                            const value = context.raw;

                            if (label === 'Performance %') {
                                return label + ': ' + value + '%';
                            }

                            return label + ': ' + Number(value).toLocaleString();
                        }"
                    ),

                    // 🔥 Adds extra info line in tooltip
                    'afterBody' => \Illuminate\Support\Js::from(
                        "function(context) {
                            let index = context[0].dataIndex;
                            let score = context[0].chart.data.datasets[1].data[index];
                            let target = context[0].chart.data.datasets[0].data[index];

                            if (!target) return '';

                            let percent = (score / target) * 100;

                            return 'Progress: ' + percent.toFixed(2) + '%';
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