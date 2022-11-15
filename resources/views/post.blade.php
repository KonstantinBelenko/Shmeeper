<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">

                <div class="p-6 bg-white rounded-md border-gray-200 transition-all">
                    <livewire:post :post="$post" :owner="false" :wire:key="'item-'.$post->id" />

                    {{-- Input --}}
                    <form name="create-post-form" class="mt-6 flex items-center justify-center" method="post" action="{{url('post')}}">
                        @csrf
                        <input maxlength="512" name="body" placeholder="♾ Comment" type="text" required class="shadow-md rounded w-[90%] border-gray-400">
                        <input type="submit" value="Shmeep" class="border-gray-100 w-[10%] text-sm shadow-md text-[#0066ff] font-bold cursor-pointer hover:bg-[#0066ff] hover:text-white transition-all p-2 ml-2 rounded">

                        <input type="hidden" name="comment_id" value="{{ $post->id }}" class="border-gray-100 w-[10%] text-[#0066ff] font-bold cursor-pointer hover:bg-[#0066ff] hover:text-white transition-all p-2 ml-2 rounded">
                    </form>

                </div>

                {{--  Replies  --}}
                <div class="mt-4">
                    <span class="ml-2 text-xl font-medium">{{ __('Replies') }}</span>

                    @foreach($comments as $comment)
                        <div class="max-w-3xl mt-4 bg-white border-b rounded-md shadow-sms p-6 hover:bg-blue-50 transition-all">
                            @if($comment->author->id == auth()->id())
                                <livewire:post :post="$comment" :owner="true" :wire:key="'item-'.$post->id" />
                            @else
                                <livewire:post :post="$comment" :owner="false" :wire:key="'item-'.$post->id" />
                            @endif
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
