<?php

namespace App\Filament\Resources\AnnualReturns\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AnnualReturnForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                Section::make('Contribution Details')
    ->schema([

        Grid::make(2)->schema([

            /** YEAR SELECT */
Select::make('year')
    ->label('Year')
    ->options([
        2026 => '2026',
        2025 => '2025',
        2024 => '2024',
    ])
    ->native(false)
    ->default(2026)
    ->reactive()
    ->required()
    ->afterStateUpdated(fn (callable $set) => $set('user_id', null)),

/** USER SELECT */
Select::make('user_id')
    ->label('Member')
    ->placeholder('Select a member')
    ->required()
    ->native(false)
    ->allowHtml()
    ->reactive()

    ->options(function (callable $get) {

        $year = $get('year') ?? 2026;

        return \App\Models\User::where('status', 'active')
            ->with(['contributions' => function ($query) use ($year) {
                $query->whereYear('created_at', $year);
            }])
            ->get()
            ->mapWithKeys(function ($user) use ($year) {

                $avatar = $user->avatar_url
                    ? 'https://masavuinvestments.com/storage/' . $user->avatar_url
                    : 'https://masavuinvestments.com/default-user.png';

                $total = $user->contributions->sum('amount') ?? 0;

                // ✅ Check if already has contributions for this year
                $hasRecord = $user->contributions->isNotEmpty();

                $badge = $hasRecord
                    ? "<span style='color:green;font-size:14px;'>✔</span>"
                    : "";

                return [
                    $user->id => "
                        <div style='display:flex;align-items:center;gap:8px;justify-content:space-between;width:100%;'>
                            
                            <div style='display:flex;align-items:center;gap:8px;'>
                                <img src='{$avatar}' style='width:28px;height:28px;border-radius:50%;object-fit:cover;border:1px solid #ddd;'>

                                <div>
                                    <div style='font-weight:600;'>{$user->name}</div>
                                    <div style='font-size:11px;color:#6b7280;'>
                                        {$year} — UGX " . number_format($total) . "
                                    </div>
                                </div>
                            </div>

                            {$badge}
                        </div>
                    "
                ];
            });
    })

    ->searchable()

    ->getOptionLabelUsing(function ($value, callable $get) {

        $year = $get('year') ?? 2026;

        $user = \App\Models\User::find($value);
        if (!$user) return null;

        $total = $user->contributions()
            ->whereYear('created_at', $year)
            ->sum('amount');

        $exists = $user->contributions()
            ->whereYear('created_at', $year)
            ->exists();

        $mark = $exists ? '✔' : '';

        return "{$mark}{$user->name} — {$year} UGX " . number_format($total);
    }),

            TextInput::make('amount')
                ->label('Interest Amount (UGX)')
                ->numeric()
                ->required()
                ->default(0)
                ->prefix('UGX')
                ->minValue(0)
                ->placeholder('Enter amount'),

            Select::make('status')
                ->label('Status')
                ->options([
                    'approved' => 'Approved',
                    'pending' => 'Pending',
                    'cancelled' => 'Cancelled',
                ])
                ->default('pending')
                ->required()
                ->native(false),
        ]),

        Textarea::make('notes')
            ->label('Additional Notes')
            ->placeholder('Optional notes or remarks...')
            ->rows(3)
            ->columnSpanFull(),

    ])
    ->columns(1)
                
            ]);
    }
}
