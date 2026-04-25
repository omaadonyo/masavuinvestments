<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('landings', function (Blueprint $table) {
            $table->id();

            $table->string('logo')->nullable();
            $table->string('brandname')->nullable();
            $table->string('favicon')->nullable();
            // Hero Section
            $table->string('hero_badge')->default('Trusted by 15+ Members');
            $table->string('hero_title_line1')->default('Build Wealth Faster Through');
            $table->string('hero_title_line2')->default('Trusted Collective Investment');
            $table->text('hero_description')->default('Masavu Investment Club empowers disciplined savers to pool resources, access larger investments, and grow wealth safely through professional management.');
            $table->string('hero_primary_cta_text')->default('Become a Member');
            $table->string('hero_primary_cta_link')->default('#join');
            $table->string('hero_secondary_cta_text')->default('Member Login');
            $table->string('hero_secondary_cta_link')->default('#login');

            // Features Section
            $table->string('features_badge')->default('Why Choose Us');
            $table->string('features_title')->default('Why Join Masavu Investment Club');
            $table->text('features_subtitle')->default('A professional, secure and growth-focused investment community designed for disciplined savers');

            $table->string('feature1_icon')->default('briefcase');
            $table->string('feature1_title')->default('Pooled Capital Power');
            $table->text('feature1_description')->default('Access high-value investments normally reserved for institutions. Our collective strength opens doors to opportunities.');

            $table->string('feature2_icon')->default('chart-bar');
            $table->string('feature2_title')->default('Professional Management');
            $table->text('feature2_description')->default('Licensed fund managers handle your investments with expertise, managing diversified portfolios across multiple asset classes.');

            $table->string('feature3_icon')->default('lock-closed');
            $table->string('feature3_title')->default('Secure & Transparent');
            $table->text('feature3_description')->default('All processes are audited regularly with full visibility. Your money is protected by institutional-grade security.');

            // How It Works Section
            $table->string('howitworks_badge')->default('Getting Started');
            $table->string('howitworks_title')->default('How It Works');
            $table->text('howitworks_subtitle')->default('Start your wealth building journey in four simple steps');

            $table->string('step1_title')->default('Sign Up');
            $table->text('step1_description')->default('Create your account and complete verification');

            $table->string('step2_title')->default('Choose Plan');
            $table->text('step2_description')->default('Select your monthly contribution amount');

            $table->string('step3_title')->default('Invest');
            $table->text('step3_description')->default('Your money gets invested professionally');

            $table->string('step4_title')->default('Grow');
            $table->text('step4_description')->default('Watch your wealth grow over time');

            // FAQ Section
            $table->string('faq_badge')->default('Got Questions?');
            $table->string('faq_title')->default('Frequently Asked Questions');
            $table->text('faq_subtitle')->default('Everything you need to know about joining Masavu');

            $table->string('faq1_question')->default('How much is the monthly contribution?');
            $table->text('faq1_answer')->default('Monthly contributions start from as low as $50. You can choose your preferred amount based on your budget and financial goals.');

            $table->string('faq2_question')->default('Can I withdraw my investment?');
            $table->text('faq2_answer')->default('Yes, you can withdraw your investment with a 30-day notice period. We believe in maintaining flexibility while protecting the collective fund.');

            $table->string('faq3_question')->default('Who manages the funds?');
            $table->text('faq3_answer')->default('All funds are managed by licensed and regulated fund managers with proven track records in institutional investment management.');

            $table->string('faq4_question')->default('What makes Masavu different from other investment options?');
            $table->text('faq4_answer')->default('Masavu combines the power of collective investing with professional management, transparent operations, and community support for disciplined savers.');

            $table->string('faq5_question')->nullable();
            $table->text('faq5_answer')->nullable();

            $table->string('faq6_question')->nullable();
            $table->text('faq6_answer')->nullable();

            // CTA Section
            $table->string('cta_headline')->default('Start Your Wealth Journey Today');
            $table->text('cta_body')->default('Join hundreds of disciplined investors building financial freedom together. Your future self will thank you.');

            // Contact Section
            $table->string('contact_badge')->default('Get In Touch');
            $table->string('contact_title')->default('Contact Us');
            $table->text('contact_subtitle')->default('Have questions? We\'d love to hear from you. Send us a message and we\'ll respond as soon as possible.');
            $table->string('contact_phone')->default('+256 700 123 456');
            $table->string('contact_email')->default('info@masavuinvestments.com');
            $table->string('contact_address')->default('Kampala, Uganda');

            // Footer Section
            $table->string('footer_brand')->default('Masavu Investment Club');
            $table->text('footer_description')->default('Building wealth together through trusted collective investment. Join our community of disciplined savers and grow your financial future.');

            $table->string('quicklink1')->default('Features');
            $table->string('quicklink2')->default('Projects');
            $table->string('quicklink3')->default('FAQ');
            $table->string('quicklink4')->default('Contact');

            $table->string('legallink1')->default('Privacy Policy');
            $table->string('legallink2')->default('Terms of Service');
            $table->string('legallink3')->default('Cookie Policy');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landings');
    }
};
