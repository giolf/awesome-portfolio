<script>
    import  { mapActions } from 'vuex';
    import { mapGetters } from 'vuex';

    export default {
        mounted() {
            this.getProjects({ page: 1 }).then(
                () => { this.appReady(true); },
                (errors) => { console.log(errors); }
            );
        },
        computed: {
            ...mapGetters([
                'projectsList',
                'isAppReady'
            ])
        },
        methods: {
            ...mapActions([
                'getProjects',
                'appReady'
            ])
        }
    }
</script>

<template>
    <div v-cloak v-if="isAppReady" class="awesome-portfolio projects-table">
        <div class="uk-grid">
            <div v-for="(project, index) in projectsList"
            class="uk-grid-margin uk-width-small-1-2 uk-width-medium-1-3 uk-width-large-1-4">
                <figure class="uk-overlay uk-overlay-hover"
                data-uk-scrollspy="{cls:'uk-animation-fade', repeat: false, delay:1}">
                    <img class="uk-overlay-scale" :src="project.f_img" width="600" height="400" alt="Image">
                    <figcaption
                    class="uk-overlay-panel uk-text-center uk-overlay-background uk-overlay-bottom uk-ignore">
                        <div class="project-title">
                            {{ project.post_title }}
                        </div>
                        <div class="project-info">
                            {{ project.date }} | {{ project.place }}
                        </div>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
</template>

<style>
    .projects-table .uk-grid {
        margin-top: -20px;
        margin-left: -20px;
    }
    .projects-table .uk-grid > * {
        padding-left: 20px
    }
    .projects-table .uk-grid-margin {
        margin-top: 20px;
    }
    figure {
        box-shadow: 0px 1px 10px #888;
    }
    figcaption {
        font-family: "Proxima Nova", "Helvetica Neue", Helvetica, Arial, sans-serif;
        padding: 10px !important;
    }
    .project-title {
        padding-bottom: 10px;
        font-size: 14px;
    }
    .project-info {
        font-size: 12px;
    }
</style>
