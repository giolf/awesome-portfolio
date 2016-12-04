<?php
/**
 * Plugin:   Awesome Portfolio
 * Template Name: Awesome Portoflio - Projects
 * Author:   Giovanni Far
 */
?>

<?php get_header(); ?>

<div class="container">

    <div class="row">

        <div class="twelve columns">

            <div id="slideshow" class="slideshow-page">
                <div id="app-projects">
                    <div v-if="!isAppReady" class="spinner app-loading">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                    <projects></projects>
                    <more></more>
                </div>
            </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>
