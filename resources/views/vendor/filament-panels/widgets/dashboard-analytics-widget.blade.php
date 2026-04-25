<div>
    <x-filament::tabs>
        <x-filament::tabs.header>
            <x-filament::tabs.tab wire:click="$set('activeTab', 'contributions')" :active="$activeTab === 'contributions'">Contributions</x-filament::tabs.tab>
            <x-filament::tabs.tab wire:click="$set('activeTab', 'targets')" :active="$activeTab === 'targets'">Targets</x-filament::tabs.tab>
        </x-filament::tabs.header>

        <x-filament::tabs.content :active="$activeTab === 'contributions'">
            <x-filament::charts.bar :chart-data="$this->getContributionsData()" />
        </x-filament::tabs.content>

        <x-filament::tabs.content :active="$activeTab === 'targets'">
            <x-filament::charts.bar :chart-data="$this->getTargetsData()" />
        </x-filament::tabs.content>
    </x-filament::tabs>
</div>