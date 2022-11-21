<div>
    <livewire:list-posts key="{{ now() }}" :listOnlyUser="$listOnlyUser" :listOnlyComments="$listOnlyComments" :limitPerPage="$limitPerPage" :posts="$posts" ></livewire:list-posts>
    <script type="text/javascript">
        window.onscroll = function (ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                window.livewire.emit('load-more');
            }
        };
    </script>
</div>
