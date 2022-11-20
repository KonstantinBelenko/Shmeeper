<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <form name="edit-profile-form" method="post" action="{{url('/profile/save')}}" enctype="multipart/form-data">
                @csrf
                @method('POST')

                {{-- Profile Block --}}
                <div class="mb-8 w-[100%] flex flex-col bg-white overflow-hidden shadow-xl rounded-lg sm:rounded-lg px-8 py-6">
                    <div class="flex flex-row">

                        {{-- Save Button --}}
                        <div class="absolute bg-white shadow-md box-border ml-[-50px] mt-[-40px] p-2 px-4 rounded-md cursor-pointer hover:scale-200 transition-all hover:text-[#0066ff]">
                            <input type="submit" value="Save">
                        </div>

                        {{-- Avatar --}}
                        <input type="file" id="imgupload" style="display:none"/>

                        @if($user->avatar_type == 'css')
                            <input name="image" type="file" class="w-[100px] h-[100px] mr-2 rounded-full" style="background: linear-gradient(0deg, {{ $user->avatar_color_1  }}, {{ $user->avatar_color_2 }})"></input>
                        @else
                            <img src="{{ asset('/storage/images/'.$user->avatar_url) }}" class="w-[100px] h-[100px] mr-2 rounded-full" \>
                            <input name="image" type="file" class="absolute w-[100px] h-[100px]" >
                        @endif

                        {{-- Name & Tag --}}
                        <div class="ml-4 box-borderflex flex-col justify-start">
                            <input maxlength="16" type="text" name="username" required value="{{ $user->name }}" class="w-full h-14 text-[2.5em] box-border rounded-md shadow-sm">
                            <div>
                                <p class="inline-block transition-all hover:text-[#0066ff] cursor-pointer">&#64;{{ $user->tag }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <input maxlength="128" type="text" name="about" placeholder="About..." value="{{ $user->about }}" class="w-full rounded">
                    </div>

                </div>

                @foreach($posts as $post)
                    <div class="mb-8 bg-white overflow-hidden shadow-xl sm:rounded-lg pointer-events-none">
                        <div class="p-6 bg-white border-b border-gray-200 bg-gray-50 transition-all filter blur-sm">
                            <livewire:post :posts="$posts" :post="$post" :owner="false" :wire:key="'item-'.$post->id" />
                        </div>
                    </div>
                @endforeach

            </form>
        </div>

        <script>
            function openModal(e) {
                e.preventDefault()
            }
        </script>
    </div>
</x-app-layout>
