<div>
    <livewire:list-posts key="{{ now() }}" :listOnlyUser="$listOnlyUser" :listOnlyComments="$listOnlyComments" :limitPerPage="$limitPerPage" :posts="$posts" ></livewire:list-posts>
    <script type="text/javascript">
        var can_scroll = true;
        window.onscroll = function (ev) {
        //  console.log((window.innerHeight + window.scrollY) >= document.body.offsetHeight);
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 450 && can_scroll) {
                // you're at the bottom of the page

                // emit load-more to livewire and wait for it to finish
                can_scroll = false;
                window.livewire.emit('load-more')
                // change can_scroll to true after livewire ended loading
                window.livewire.on('load-more-finished', () => {
                    can_scroll = true;
                })
            }
        };
    </script>
</div>
