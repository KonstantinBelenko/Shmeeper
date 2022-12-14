@props(['post_id'])

{{--<div class="w-full px-6 flex flex-col items-center mb-8 box-border p-4 bg-white overflow-hidden break-all rounded-lg sm:rounded-lg">--}}
<form name="create-post-form" class="flex flex-col items-center justify-center min-w-full mb-8" method="post" action="{{ url('post')}}">
    @csrf
    <textarea
        x-data="{ resize: () => { $el.style.height = '5px'; $el.style.height = $el.scrollHeight + 'px' } }"
        @input="resize()"
        maxlength="512"
        name="body"
        placeholder="♾ New Shmeep"
        required
        class="text-base border-none shadow-md rounded box-border p-2 w-full border-gray-400 overflow-ellipsis resize-none max-h-[70vh]"
    ></textarea>

    <input type="submit" value="⚡ Shmeep" class="w-full border-gray-100 text-[#0066ff] text-sm bg-white shadow-md font-bold cursor-pointer hover:bg-[#0066ff] hover:text-white transition-all p-2 m-2 rounded">
    <input type="hidden" name="comment_id" value="{{ $post_id }}">
</form>
{{--</div>--}}
