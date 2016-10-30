<?php
add_action('init', 'checker');
function checker(){
    if(is_admin()){
        include_once( WP_PLUGIN_DIR . "/awesome-portfolio/pl-checker/pl-checker.php" );
        if (!piklist_checker::check(WP_PLUGIN_DIR . "/awesome-portfolio/awesome-portfolio.php")) {
            return;
        }
    }
}
