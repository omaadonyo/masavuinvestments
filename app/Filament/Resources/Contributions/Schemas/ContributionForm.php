<?php

namespace App\Filament\Resources\Contributions\Schemas;


use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Schema;

class ContributionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                  

            Section::make([

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

                                              Select::make('target_id')
    ->label('Contribute Towards')
    ->required()
    ->native(false)
    ->reactive()
    ->options(function (callable $get) {
        $userId = $get('user_id');

        if (!$userId) {
            return [];
        }

        return \App\Models\Target::where('user_id', $userId)
            ->pluck('title', 'id');
    }),
                          



 FusedGroup::make([
                   TextInput::make('amount')
                        ->required()
                        ->prefix('UGX')
                        // ->mask(RawJs::make('$money($input)'))
                        ->stripCharacters(',')
                        ->numeric()
                        ->live(debounce: 800)
                        ->afterStateUpdated(function ($state, callable $get, callable $set) {
                            $set('total_deposit', ($state ?? 0) + ($get('management_fee') ?? 0));
                        }),

                  Select::make('month')
    ->label('Select Month')
    ->options([
        'January' => 'January',
        'February' => 'February',
        'March' => 'March',
        'April' => 'April',
        'May' => 'May',
        'June' => 'June',
        'July' => 'July',
        'August' => 'August',
        'September' => 'September',
        'October' => 'October',
        'November' => 'November',
        'December' => 'December',
    ])
    ->native(false)
    ->required()

])->columns(2),

                          



                    Textarea::make('notes')
                        ->default('Payment made via mobile money')
                        ->columnSpanFull(),
                ])->description('Please add your contribution, you wont be able to edit this after the submission.'),

                Section::make([
                    TextInput::make('management_fee')
                        ->required()
                        ->live(debounce: 800)
                        ->afterStateUpdated(function ($state, callable $get, callable $set) {
                            $set('total_deposit', ($get('amount') ?? 0) + ($state ?? 0));
                        }),

                    TextInput::make('total_deposit')
                        ->required()
                        ->numeric()
                        ->dehydrated()
                        ->default(0),
                ])->grow(false),

                FileUpload::make('payment_proof')
                    ->label('Upload Payment Proof'),
            ]);
    }
}
