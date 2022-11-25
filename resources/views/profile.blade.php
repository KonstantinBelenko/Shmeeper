<x-app-layout>
    <div class="py-12">
        <div class="flex flex-col max-w-3xl mx-auto w-full items-center">

            {{-- Profile Block --}}
            <div class="flex flex-col mb-8 w-full text-white border-[1px] rounded-md">

                <div class="flex flex-row justify-between min-w-full mx-auto p-6">
                    <div class="flex flex-row">

                        {{-- Edit Button --}}
                        @if($owner)
                            <div class="absolute bg-black text-white shadow-md box-border top-20 left-5 p-2 px-4 rounded-md cursor-pointer hover:scale-200 transition-all hover:text-[#FF6B00]">
                                <a href="{{ url('/profile/edit') }}">
                                    Edit
                                </a>
                            </div>
                        @endif

                        @if($user->avatar_type == 'css')
                            <a href="{{ '/profile/' . $user->id }}" >
                                <div class="w-[100px] h-[100px] mr-2 rounded-full" style="background: linear-gradient(0deg, {{ $user->avatar_color_1  }}, {{ $user->avatar_color_2 }})"></div>
                            </a>
                        @else
                            <a href="{{ '/profile/' . $user->id }}" >
                                <img src="{{ asset('/storage/images/'.$user->avatar_url) }}" class="bg-cover bg-center bg-no-repeat min-w-[100px] max-w-[100px] min-h-[100px] max-h-[100px] mr-2 rounded-full" \>
                            </a>
                        @endif

                        <div class="ml-4 box-borderflex flex-col justify-start overflow-hidden">
                            <div class="text-[1.5em]">{{ $user->name }}</div>
                            <div>
                                <p class="inline-block transition-all hover:text-[#FF6B00] cursor-pointer">&#64;{{ $user->tag }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="break-all px-6 pb-6">
                    {{ $user->about }}
                </div>

            </div>

            {{-- Send Post --}}
            @if($owner)
                <div class="max-w-3xl mx-auto w-full">
                    <livewire:send-post-input-box :post_id="-1"></livewire:send-post-input-box>
                </div>
            @endif

        </div>

        <div class="max-w-3xl mx-auto w-full">
            <livewire:paginate-posts :listOnlyUser="$user->id" :posts="$posts"></livewire:paginate-posts>
        </div>
    </div>
</x-app-layout>
