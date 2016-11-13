<?php
/**
 * Plugin:   Awesome Portfolio
 * Template: single-project
 * Author:   Giovanni Far
 */
?>
<?php $prj_data = apply_filters( 'display_single_project', false ); ?>

<?php get_header(); ?>

<div class="container">

    <div class="row">

        <div class="twelve columns">

            <div id="slideshow" class="slideshow-page">

                <?php if ($prj_data['main_file_type'] == 'img') : ?>
                    <div class="single-prj-img uk-cover-background"
                        style="height: 400px; background-image: url(<?php echo $prj_data['featured_prj_image'] ?>">
                    </div>
                <?php else : ?>
                    <video controls class="uk-responsive-width" width="900">
                        <source src="<?php echo $prj_data['featured_prj_video'] ?>" type="video/mp4">
                    </video>
                <?php endif; ?>
                <div class="single-prj-gallery uk-slidenav-position" data-uk-slider="{infinite: false}">

                    <div class="uk-slider-container">
                        <ul class="uk-slider uk-grid uk-grid-width-1-6"
                            data-uk-grid="{gutter: 5}">
                            <?php foreach ($prj_data['gallery'] as $link) : ?>
                                <a id="single-prj-thumb" href="<?php echo $link['full'] ?>" data-uk-lightbox>
                                    <li>
                                        <img src="<?php echo $link['thumb'] ?>">
                                    </li>
                                </a>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous"
                        data-uk-slider-item="previous">
                    </a>
                    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next"
                        data-uk-slider-item="next">
                    </a>

                </div>

                <div class="uk-grid">

                    <div class="uk-width-1-1">
                        <h1 class="single-prj-title headline uk-text-center">
                            <?php echo $prj_data['title'] ?>
                        </h1>
                    </div>
                    <div class="uk-width-1-1">
                        <h1 class="single-prj-date headline uk-text-center">
                            <?php echo $prj_data['date'] . ' | ' . $prj_data['place'] ?>
                        </h1>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>
