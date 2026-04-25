<?php

namespace App\Models;

use App\Models\Contribution;
use Filament\Auth\MultiFactor\App\Concerns\InteractsWithAppAuthentication;
use Filament\Auth\MultiFactor\App\Contracts\HasAppAuthentication;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable  implements FilamentUser, HasAppAuthentication, MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, SoftDeletes, InteractsWithAppAuthentication, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $fillable = [
        'name',
        'email',
        'full_name',
        'avatar_url',
        'is_admin',
        'uuid',
        'phone_number',
        'application_status',
        'status',
        'password',
        'email_verified_at',
        'member_account',
        'member_number',
        'date_of_birth',
        'date_of_joining',
        'place_of_residence',
        'email_address',
        'national_id_passort_number',
        'source_of_income',
        'highest_level_of_education',
        'profession',
        'next_of_kin_name',
        'relationship_next_of_kin',
        'contacts_next_of_kin',
        'active_bank_account_name',
        'active_bank_account_number',
        'national_id_photo',
        'current_photo',
        'agree_tos',
        'initial_investment',
        'email_verified_at',
        'deleted_at'
    ];

    public function contributions()
    {
        return $this->hasMany(Contribution::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return ($this->email == 'masavuinvestmentclub@gmail.com') && $this->hasVerifiedEmail();
    }


    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url;
    }
}
