<form name="create-post-form" class="flex flex-col items-center justify-center min-w-full mb-8" method="post" action="{{ url('post')}}">
    @csrf
    <textarea
        x-data="{ resize: () => { $el.style.height = '5px'; $el.style.height = $el.scrollHeight + 'px' } }"
        @input="resize()"
        maxlength="512"
        name="body"
        placeholder="♾ New Shmeep"
        required
        class="text-base border-none focus:border-none focus:ring-0 shadow-md rounded box-border p-2 w-full overflow-ellipsis resize-none max-h-[70vh]"
    ></textarea>

    <div class="flex flex-row mt-2 w-[100%]">
        {{--Clicable input with type file with no button or rabel beind a div--}}
        <div class="flex flex-row items-center justify-center w-[100%]">
            <div class="w-[15%]">
                <input type="file" name="image" id="image" class="hidden w-full" />
                <label for="image" class="flex flex-row items-center justify-center w-[100%]">
                    <div class="w-full border-gray-100 text-[#0066ff] flex justify-center items-center text-sm bg-white shadow-md font-bold cursor-pointer hover:bg-[#0066ff] hover:text-white transition-all p-2 mr-2 rounded">🖼️</div>
                </label>
            </div>
        <input type="submit" value="⚡ Shmeep" class="w-[85%] border-gray-100 text-[#0066ff] text-sm bg-white shadow-md font-bold cursor-pointer hover:bg-[#0066ff] hover:text-white transition-all p-2 rounded">
    </div>

    <input type="hidden" name="comment_id" value="{{ $post_id }}">
</form>
