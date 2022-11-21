<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-3xl mx-auto w-full">

            {{-- Main Post --}}
            <div class="flex flex-col items-center min-w-full mx-auto px-6">
                <div class="mb-8 min-w-full bg-white overflow-hidden hover:shadow-xl rounded-lg sm:rounded-lg transition-all">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <livewire:post :posts="$posts" :post="$post" :owner="false" :wire:key="'item-'.$post->id" />
                    </div>
                </div>
            </div>

            {{-- Input --}}
            <livewire:send-post-input-box :post_id="$post_id"></livewire:send-post-input-box>
        </div>

        {{--  Replies  --}}
        <div class="max-w-4xl mx-auto w-full">
            <livewire:paginate-posts :listOnlyComments="$post->id" :posts="$comments"></livewire:paginate-posts>
        </div>

    </div>
</x-app-layout>
