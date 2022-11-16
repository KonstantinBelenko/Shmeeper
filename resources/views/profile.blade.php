<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" flex flex-col items-center max-w-3xl mx-auto sm:px-6 lg:px-8">

            {{-- Profile Block --}}
            <div class="mb-8 min-w-[90%] max-w-[90%] flex flex-col  bg-white overflow-hidden shadow-xl rounded-lg sm:rounded-lg p-8">

                <div class="flex flex-row justify-between">
                    <div class="flex flex-row">

                        {{-- Edit Button --}}
                        @if($owner)
                            <div class="absolute bg-white shadow-md box-border ml-[-20px] mt-[-20px] p-2 px-4 rounded-md cursor-pointer hover:scale-200 transition-all hover:text-[#0066ff]">
                                <a href="{{ url('/profile/edit') }}">
                                    Edit
                                </a>
                            </div>
                        @endif

                        {{-- Avatar --}}
                        @if($user->avatar_type == 'css')
                            <a href="{{ '/profile/' . $user->id }}" >
                                <div class="w-[100px] h-[100px] mr-2 rounded-full" style="background: linear-gradient(0deg, {{ $user->avatar_color_1  }}, {{ $user->avatar_color_2 }})"></div>
                            </a>
                        @else
                            <a href="{{ '/profile/' . $user->id }}" >
                                <img src="{{ asset('/storage/images/'.$user->avatar_url) }}" class="bg-cover bg-center bg-no-repeat min-w-[100px] max-w-[100px] min-h-[100px] max-h-[100px] mr-2 rounded-full" \>
                            </a>
                        @endif

                        {{-- Name & Tag & About --}}
                        <div class="ml-4 box-borderflex flex-col justify-start overflow-hidden">
                            <div class="text-[2.5em]">{{ $user->name }}</div>
                            <div>
                                <p class="inline-block transition-all hover:text-[#0066ff] cursor-pointer">&#64;{{ $user->tag }}</p>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- About --}}
                <div class="mt-8">
                    SOON: 🧑‍🦽💨 ABOUT SECTION
                </div>

            </div>

            {{-- Send Post --}}
            @if($owner)
                <div class="min-w-[90%] max-w-[90%] flex flex-col items-center mb-8 box-border p-4 bg-white overflow-hidden shadow-xl rounded-lg sm:rounded-lg">
                    <form name="create-post-form" class="flex items-center justify-center min-w-full" method="post" action="{{ url('post')}}">
                        @csrf
                        <input maxlength="512" name="body" placeholder="♾ New Shmeep" type="text" required class="shadow-md rounded w-[90%] border-gray-400">
                        <input type="submit" value="⚡" class="border-gray-100 w-[10%] text-[#0066ff] text-sm shadow-md font-bold cursor-pointer hover:bg-[#0066ff] hover:text-white transition-all p-2 ml-2 rounded">

                        <input type="hidden" name="comment_id" value="-1" class="border-gray-100 text-[#0066ff] font-bold cursor-pointer hover:bg-[#0066ff] hover:text-white transition-all p-2 ml-2 rounded">
                    </form>
                </div>
            @endif

            @foreach($posts as $post)
                <div class="min-w-[90%] max-w-[90%] flex flex-col items-center mb-8 bg-white overflow-hidden shadow-xl rounded-lg sm:rounded-lg">
                    <div class="min-w-full p-6 bg-white border-b border-gray-200 hover:bg-gray-50 transition-all">
                        <livewire:post :post="$post" :owner="$owner" :wire:key="'item-'.$post->id" />
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
