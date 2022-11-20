<div>

    {{--  If is_reply  --}}
{{--    @if($post->is_reply == true)--}}
{{--        <div class="mb-4">--}}
{{--            <a href="{{ '/post/' . $post->reply_id }}">--}}
{{--                @php($repy_post = $post->replyingTo())--}}
{{--                <div class="text-[#0066ff] text-xs">Replying to {{ $repy_post->author->name }}</div>--}}
{{--                <div class="text-xs">{{ substr($repy_post->body, 0, 32) }}...</div>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    @endif--}}

    {{--    Author Name / Author Tag / Post Timestamp    --}}
    <div class="flex flex-row items-center justify-start">

        {{-- Avatar --}}
        @if($post->author->avatar_type == 'css')
            <a href="{{ '/profile/' . $post->author->id }}" >
                <div class="w-[50px] h-[50px] mr-2 rounded-full" style="background: linear-gradient(0deg, {{ $post->author->avatar_color_1  }}, {{ $post->author->avatar_color_2 }})"></div>
            </a>
        @else
            <a href="{{ '/profile/' . $post->author->id }}" >
                <img src="{{ asset('/storage/images/'.$post->author->avatar_url) }}" class="w-[50px] h-[50px] mr-2 rounded-full" \>
            </a>
        @endif

        <div class="flex flex-col items-start justify-center">




            <div class="font-medium">{{ $post->author->name }}</div>
            <div class="flex flex-row font-medium text-[12px]">
                {{-- Author Tag --}}
                <a href="{{ '/profile/' . $post->user_id }}" class="hover:text-[#0066ff] transition-all rounded">&#64;{{ $post->author->tag }}</a>

                {{-- Post timestamp--}}
                &nbsp;&nbsp;{{ date('H:m m-d-Y', strtotime($post->created_at)) }}
            </div>
        </div>

    </div>

    {{--    Post Body    --}}
    <div class="mt-4">
        <a href="{{'/post/' . $post->id}}">
            {{ $post->body }}
        </a>
    </div><br/>

    {{-- Post Like / Post Delete --}}
    <div class="flex justify-between">

        {{--      Like button      --}}
        <div class="flex">
            <div class="flex">
                <button wire:click="like" class="inline-flex space-x-2 focus:outline-none focus:ring-0 hover:scale-125 transition-all rounded">
                    @if($isLiked)
                        ✅
                    @else
                        👍
                    @endif
                </button>
                 {{ $likeCounter }}
            </div>

            {{--- N of Comments ---}}
            <div class="ml-4 hover:scale-110 transition-all">
                <a href="{{'/post/' . $post->id}}">💬 {{ $commentCounter }}</a>
            </div>
        </div>


        {{-- Delete button --}}
        @if($owner)
        <form method="POST" action="{{url("/post/$post->id")}}">
            @method('DELETE')
            @csrf
            <input type="submit" value="⛔" class="font-bold text-red-500 cursor-pointer hover:scale-125 transition-all rounded">
        </form>
        @endif

    </div>
</div>
