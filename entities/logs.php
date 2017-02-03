<?php
/**
 * Adds a new top-level page to the administration menu.
 */
function logs_add_page() {
    add_menu_page(
        __( 'Logs','wpduf' ),
        __( 'Logs', 'wpduf' ),
        'edit_pages',
        'logs_list',
        'logs_list_callback',
        'dashicons-clock',
        26
    );
}
add_action('admin_menu', 'logs_add_page');



/**
 * Display callback for the Logs List page.
 */
function logs_list_callback() {
    //Prepare Table of elements
    $logs_table = new \MGWPCL\ListTable\Logs();
    $logs_table->prepare_items(); ?>

    <div class="wrap">
        <h1><?php _e('Registro de Logs','mgwpcl'); ?></h1>

        <form method="post">
            <?php

            //$logs_table->search_box(__("Buscar por referencia", "mgdbq2json"), "mgwpcl");
            $logs_table->views();
            $logs_table->display();
            ?></form>
    </div><!-- END .wrap -->
    <?php
}