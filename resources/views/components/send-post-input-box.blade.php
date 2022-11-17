@props(['post_id'])

<div class="w-full px-6 flex flex-col items-center mb-8 box-border p-4 bg-white overflow-hidden rounded-lg sm:rounded-lg">
    <form name="create-post-form" class="flex items-center justify-center min-w-full" method="post" action="{{ url('post')}}">
        @csrf
        <input maxlength="512" name="body" placeholder="♾ New Shmeep" type="text" required class="shadow-md rounded w-[85%] border-gray-400">
        <input type="submit" value="⚡" class="border-gray-100 w-[15%] text-[#0066ff] text-sm shadow-md font-bold cursor-pointer hover:bg-[#0066ff] hover:text-white transition-all p-2 ml-2 rounded">

        <input type="hidden" name="comment_id" value="{{ $post_id }}" class="border-gray-100 text-[#0066ff] font-bold cursor-pointer hover:bg-[#0066ff] hover:text-white transition-all p-2 ml-2 rounded">
    </form>
</div>
