<script>
    import { mapGetters } from 'vuex';

    export default {
        computed: {
            ...mapGetters([
                'isAppLoading',
                'isAppReady'
            ])
        }
    }
</script>

<template>
    <div v-show="!isAppLoading && isAppReady" class="aw-load-more uk-width-medium-1-1 uk-text-center">
        <button class="uk-button">
            <i class="uk-icon-cloud-download"></i>
            More
        </button>
    </div>
</template>

<style>
    .aw-load-more {
        margin-top: 15px;
        font-family: "Proxima Nova", "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
    .aw-load-more button {
        font-size: 13px;
        border-radius: 5px;
    }
    .aw-load-more button:hover {
        background-color: #eee;
    }
    .aw-load-more button:focus {
        background-color: #eee;
        color: #444;
        text-decoration: none;
    }

    .aw-load-more button:active {
        background-color: #ddd;
        color: #444;
    }
</style>
