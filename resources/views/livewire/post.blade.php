<div class="min-w-full">
    <a href="{{ '/post/' . $post->id }}">

        {{-- If is_reply --}}
        @if($post->is_reply == true)
            <div class="mb-2 opacity-50">
                <a href="{{ '/post/' . $originalPost->id }}" >
                    <div class="text-white text-xs">
                        Replying to {{ $originalPost->author->name }} - {{ substr($originalPost->body, 0, 16) }}...
                    </div>
                </a>
            </div>
        @endif

        {{--    Author Name / Author Tag / Post Timestamp    --}}
        <div class="flex flex-row items-start justify-start">

            {{-- Avatar --}}
            @if($post->author->avatar_type == 'css')
                <a href="{{ '/profile/' . $post->author->id }}" >
                    <div class="w-[50px] h-[50px] mr-2 rounded-full" style="background: linear-gradient(0deg, {{ $post->author->avatar_color_1  }}, {{ $post->author->avatar_color_2 }})"></div>
                </a>
            @else
                <a href="{{ '/profile/' . $post->author->id }}" >
                    <img src="{{ asset('/storage/images/'.$post->author->avatar_url) }}" class="w-16 mr-2 rounded-full" \>
                </a>
            @endif

            <div class="flex-col">
                <div class="flex flex-row items-center gap-2">
                    {{-- Author Name --}}
                    <div class="font-bold">{{ $post->author->name }}</div>

                    {{-- Author Tag --}}
                    <a href="{{ '/profile/' . $post->user_id }}" class="text-nowrap hover:text-[#FF6B00] text-gray-400 text-sm transition-all rounded">• &#64;{{ $post->author->tag }}</a>

                    {{-- Post timestamp--}}
                    <div class="flex flex-row text-sm text-gray-400">
                        • {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                    </div>
                </div>

                {{--    Post Body    --}}
                <div class="w-full break-all ">
                    <a href="{{'/post/' . $post->id}}">
                        {{ $post->body }}
                    </a>
                </div><br/>
            </div>

        </div>

        {{-- Post Like / Post Delete --}}
        <div class="flex justify-between">

            <div class="flex">
                <div class="flex">

                    {{-- Like button --}}
                    <button wire:click="like" class="inline-flex space-x-2 focus:outline-none focus:ring-0 transition-all rounded">
                        <x-like-svg width="21" height="21" fill="{{$isLiked ? '#FF6B00' : 'white'}}"></x-like-svg>
                    </button>
                     {{ $likeCounter }}
                </div>

                {{--- N of Comments ---}}
                <div class="ml-4 transition-all space-x-2">
                    <a href="{{'/post/' . $post->id}}" class="flex flex-row gap-1">
                        <x-box-svg width="21" height="21" fill="white"></x-box-svg>
                        {{ $commentCounter }}
                    </a>
                </div>
            </div>


            {{-- Delete button --}}
            @if($owner)
            <form method="POST" action="{{url("/post/$post->id")}}">
                @method('DELETE')
                @csrf
                <input type="submit" value="⛔" class="font-bold cursor-pointer hover:scale-125 transition-all rounded">
            </form>
            @endif

        </div>
    </a>
</div>
