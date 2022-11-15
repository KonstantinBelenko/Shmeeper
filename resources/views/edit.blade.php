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
                <div class="flex flex-row justify-between bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                    <div class="flex flex-row">
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
                            <input maxlength="16" type="text" name="username" required value="{{ $user->name }}" class="w-10/12 h-14 pl-2 text-[2.5em] box-border rounded-md shadow-sm p-1">
                            <div>
                                <p class="inline-block transition-all hover:text-[#0066ff] cursor-pointer">&#64;{{ $user->tag }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Save Button --}}
                    <div>
                        <input type="submit" value="Save" class="shadow-md box-border p-2 px-4 rounded-md cursor-pointer hover:scale-200 transition-all hover:text-[#0066ff]">
                    </div>

                </div>

                @foreach($posts as $post)
                    <div class="mt-4 bg-white overflow-hidden shadow-xl sm:rounded-lg pointer-events-none">
                        <div class="p-6 bg-white border-b border-gray-200 bg-gray-50 transition-all filter blur-sm">
                            <livewire:post :post="$post" :owner="false" :wire:key="'item-'.$post->id" />
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
