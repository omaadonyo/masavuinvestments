<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [

        'brandname',
        'logo',
        'favicon',
        // Hero Section
        'hero_badge',
        'hero_title_line1',
        'hero_title_line2',
        'hero_description',
        'hero_primary_cta_text',
        'hero_primary_cta_link',
        'hero_secondary_cta_text',
        'hero_secondary_cta_link',

        // Features Section
        'features_badge',
        'features_title',
        'features_subtitle',
        'feature1_icon',
        'feature1_title',
        'feature1_description',
        'feature2_icon',
        'feature2_title',
        'feature2_description',
        'feature3_icon',
        'feature3_title',
        'feature3_description',

        // How It Works Section
        'howitworks_badge',
        'howitworks_title',
        'howitworks_subtitle',
        'step1_title',
        'step1_description',
        'step2_title',
        'step2_description',
        'step3_title',
        'step3_description',
        'step4_title',
        'step4_description',

        // FAQ Section
        'faq_badge',
        'faq_title',
        'faq_subtitle',
        'faq1_question',
        'faq1_answer',
        'faq2_question',
        'faq2_answer',
        'faq3_question',
        'faq3_answer',
        'faq4_question',
        'faq4_answer',
        'faq5_question',
        'faq5_answer',
        'faq6_question',
        'faq6_answer',

        // CTA Section
        'cta_headline',
        'cta_body',

        // Contact Section
        'contact_badge',
        'contact_title',
        'contact_subtitle',
        'contact_phone',
        'contact_email',
        'contact_address',

        // Footer Section
        'footer_brand',
        'footer_description',
        'quicklink1',
        'quicklink2',
        'quicklink3',
        'quicklink4',
        'legallink1',
        'legallink2',
        'legallink3',
    ];

    /**
     * Available icon options for features
     */
    public static function getAvailableIcons(): array
    {
        return [
            'briefcase' => 'Briefcase',
            'chart-bar' => 'Chart Bar',
            'lock-closed' => 'Lock Closed',
            'shield-check' => 'Shield Check',
            'globe' => 'Globe',
            'star' => 'Star',
            'heart' => 'Heart',
            'lightning-bolt' => 'Lightning Bolt',
            'users' => 'Users',
            'currency-dollar' => 'Currency Dollar',
            'trending-up' => 'Trending Up',
            'building-office' => 'Building Office',
            'document-chart-bar' => 'Document Chart',
            'banknotes' => 'Banknotes',
            'puzzle-piece' => 'Puzzle Piece',
        ];
    }
}
