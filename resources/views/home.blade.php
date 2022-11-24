<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto w-full">
            <livewire:paginate-posts wire:poll :posts="$posts"></livewire:paginate-posts>
        </div>
    </div>
</x-app-layout>
