<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-green-300">
        <div class="max-w-2xl mx-auto px-6 bg-pink-200">
            <div class="flex flex-col items-center overflow-hidden rounded-lg bg-blue-200">

                <div class="mb-8 w-[100%] p-6 bg-white rounded-md border-gray-200 transition-all bg-yellow-300 break-words">
                    <livewire:post :posts="$comments" :post="$post" :owner="false" :wire:key="'item-'.$post->id" />
                </div>

                {{-- Input --}}
                <x-send-post-input-box :post_id="$post_id"></x-send-post-input-box>
            </div>

        </div>

        {{--  Replies  --}}
        <x-postlist :posts="$comments"></x-postlist>

    </div>
</x-app-layout>
