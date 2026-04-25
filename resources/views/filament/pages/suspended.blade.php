<x-filament-panels::page>
    <div style="max-width: 700px; margin: 90px auto; text-align: center; padding: 40px;">

    <!-- ICON -->
    <div style="width: 90px; height: 90px; margin: 0 auto 20px; border-radius: 50%; background: #fef2f2; display: flex; align-items: center; justify-content: center;">
        <span style="font-size: 40px; color: #dc2626;">⛔</span>
    </div>

    <!-- TITLE -->
    <h1 style="font-size: 24px; font-weight:bold;margin-bottom: 10px;">
        Account Suspended
    </h1>

    <!-- DESCRIPTION -->
    <p style="font-size: 15px; line-height: 1.6; margin-bottom: 25px;">
        Your account has been temporarily suspended and access to the platform is currently restricted.
        If you believe this is a mistake or need further clarification, please contact the administrator for assistance.
    </p>

    <div style="font-size: 2.2rem;font-weight: bold;text-transform: uppercase;">
        {{ number_format(auth()->user()->member_account) }} Ugx
    </div>

    <!-- STATUS BOX -->
    <div style="display: inline-block; background: #f9fafb; padding: 12px 18px; border-radius: 100px; font-size: 13px; color: #555; margin-bottom: 25px;">
        Current: <strong style="color: #dc2626;">Balance</strong>
    </div>

    <!-- ACTION BUTTON (FILAMENT) -->
    <div>
        <x-filament::button
            tag="a"
            href="mailto:info@masavuinvestments.com"
            color="danger"
            icon="heroicon-o-phone"
            size="lg"
        >
            Contact Administrator
        </x-filament::button>
    </div>

    <!-- FOOT NOTE -->
    <p style="margin-top: 20px; font-size: 12px; color: #999;">
        Access will remain restricted until reviewed by the support team.
    </p>

</div>
</x-filament-panels::page>
