<div class="flex flex-col items-center max-w-2xl mx-auto px-6">
    @foreach($paginatedPosts as $paginatedPost)
        <div class="mb-8 min-w-[100%] bg-white overflow-hidden shadow-xl rounded-lg sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200 hover:bg-blue-50 transition-all">
                @if($paginatedPost->author->id == auth()->id())
                    <livewire:post :posts="$posts" :post="$paginatedPost" :owner="true" :wire:key="'item-'.$paginatedPost->id" />
                @else
                    <livewire:post :posts="$posts" :post="$paginatedPost" :owner="false" :wire:key="'item-'.$paginatedPost->id" />
                @endif
            </div>
        </div>
    @endforeach
</div>
