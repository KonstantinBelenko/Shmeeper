<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-3xl mx-auto w-full">
            <livewire:paginate-posts wire:poll :posts="$posts"></livewire:paginate-posts>
        </div>
    </div>
</x-app-layout>
