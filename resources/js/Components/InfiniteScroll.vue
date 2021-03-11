<template>
    <slot></slot>
</template>

<script>
    import {debounce} from 'lodash/function'

export default {
    props: {
        load: Function
    },
    mounted() {
        window.addEventListener('scroll',debounce(
                (e) => {
                let pixelsFromBottom = document.documentElement.offsetHeight - document.documentElement.scrollTop - window.innerHeight;
                // console.log(pixelsFromBottom);
                if(pixelsFromBottom < 500)
                {
                    this.load();
                }
            }, 50
            ));
    }
}
</script>