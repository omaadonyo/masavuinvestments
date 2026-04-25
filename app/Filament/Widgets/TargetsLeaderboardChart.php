<?php

namespace App\Filament\Widgets;

use App\Models\Target;
use App\Models\User;
use Filament\Widgets\ChartWidget;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Widgets\ChartWidget\Concerns\HasFiltersSchema;
use Carbon\Carbon;

class TargetsLeaderboardChart extends ChartWidget
{
    use HasFiltersSchema;

    protected static ?int $sort = 1;

    protected ?string $heading = '🏆 Performance Leaderboard';

    protected function getData(): array
    {
        $startDate = $this->filters['startDate'] ?? null;
        $endDate = $this->filters['endDate'] ?? null;
        $status = $this->filters['status'] ?? null;

        // 🔥 Aggregate scores PER USER (REAL LEADERBOARD)
        $query = Target::query()
            ->selectRaw('user_id, SUM(target_scores) as total_score')
            ->when($startDate, fn ($q) =>
                $q->whereDate('starts_on', '>=', $startDate)
            )
            ->when($endDate, fn ($q) =>
                $q->whereDate('ends_on', '<=', $endDate)
            )
            ->when($status, fn ($q) =>
                $q->where('status', $status)
            )
            ->groupBy('user_id')
            ->orderByDesc('total_score')
            ->limit(55)
            ->get();

        $labels = [];
        $scores = [];

        foreach ($query as $row) {
            $user = User::find($row->user_id);

            $labels[] = $user?->name ?? 'Unknown';
            $scores[] = (float) $row->total_score;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Total Score',
                    'data' => $scores,
                    'backgroundColor' => '#d69809',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'indexAxis' => 'y', // horizontal leaderboard

            'plugins' => [
                'legend' => [
                    'display' => true,
                ],
                'tooltip' => [
                    'callbacks' => [
                        'label' => "function(context) {
                            return 'Score: ' + context.raw;
                        }",
                    ],
                ],
            ],

            'scales' => [
                'x' => [
                    'beginAtZero' => true,
                ],
            ],
        ];
    }

    public function filtersSchema(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('status')
                ->options([
                    'ongoing' => 'Ongoing',
                    'completed' => 'Completed',
                ])
                ->placeholder('All Status')
                ->live()
                ->native(false),

            DatePicker::make('startDate')
                ->live()
                ->native(false),

            DatePicker::make('endDate')
                ->live()
                ->native(false),
        ]);
    }
}