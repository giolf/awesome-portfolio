<script>
    import { mapGetters } from 'vuex';
    import { mapActions } from 'vuex';

    export default {
        props: {
            configuration: {
                type: Object,
                required: true
            }
        },
        mounted() {
            this.config(this.configuration);
        },
        computed: {
            ...mapGetters([
                'isAppLoading',
                'isAppReady'
            ])
        },
        methods: {
            ...mapActions([
                'more',
                'config'
            ])
        }
    }
</script>

<template>
    <div v-cloak class="awesome-portoflio more">
        <div v-show="isAppLoading" class="aw-load-spinner uk-width-medium-1-1 uk-text-center">
            <div class="spinner app-loading">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <div v-show="!isAppLoading && isAppReady" class="aw-load-more uk-width-medium-1-1 uk-text-center">
            <button @click="more" class="uk-button">
                <i class="uk-icon-cloud-download"></i>
                More
            </button>
        </div>
    </div>
</template>

<style>
    .aw-load-spinner {
        margin-top: 15px;
    }

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
