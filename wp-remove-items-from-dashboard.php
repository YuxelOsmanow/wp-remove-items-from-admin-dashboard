<?php
add_action( 'admin_menu', 'mm_remove_dashboard_menu_items' );
function mm_remove_dashboard_menu_items() {
    remove_menu_page( 'upload.php' );                 //Media
    remove_menu_page( 'edit-comments.php' );          //Comments
    remove_menu_page( 'themes.php' );                 //Appearance
    remove_menu_page( 'profile.php' );                 //Appearance
    remove_menu_page( 'edit.php?post_type=page' );    //Pages

    if ( mm_restrictly_get_current_user_role() !== 'administrator' ) {
        remove_menu_page( 'options-general.php' );        //Settings
        remove_menu_page( 'plugins.php' );              //Plugins
        remove_menu_page( 'users.php' );                  //Users
        remove_menu_page( 'tools.php' );                  //Tools
    }
};

function mm_restrictly_get_current_user_role() {
    if( is_user_logged_in() ) {
        $user = wp_get_current_user();
        $role = ( array ) $user->roles;

        if ( isset( $role[ 0 ] ) ) {
            return $role[0];
        }

    } else {
      return false;
    }
}
