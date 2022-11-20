<div class="">
    <x-postlist :posts="$posts"></x-postlist>
    @livewireScripts
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 100) {
                window.livewire.emit('load-more');
            }
        };
    </script>
</div>
