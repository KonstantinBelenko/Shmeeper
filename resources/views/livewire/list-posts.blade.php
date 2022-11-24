<div class="flex flex-col items-center min-w-full mx-auto">
    @foreach($paginatedPosts as $paginatedPost)
            <div class="min-w-full p-6 overflow-hidden hover:shadow-xl rounded-lg sm:rounded-lg transition-all text-white">
            @if($paginatedPost->author->id == auth()->id())
                <livewire:post :posts="$posts" :post="$paginatedPost" :owner="true" :wire:key="'item-'.$paginatedPost->id" />
            @else
                <livewire:post :posts="$posts" :post="$paginatedPost" :owner="false" :wire:key="'item-'.$paginatedPost->id" />
            @endif
        </div>
    @endforeach
</div>
