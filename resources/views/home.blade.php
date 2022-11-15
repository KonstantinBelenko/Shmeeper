<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            @foreach($posts as $post)
                <div class="mb-8 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 hover:bg-blue-50 transition-all">
                        @if($post->author->id == auth()->id())
                            <livewire:post :post="$post" :owner="true" :wire:key="'item-'.$post->id" />
                        @else
                            <livewire:post :post="$post" :owner="false" :wire:key="'item-'.$post->id" />
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
