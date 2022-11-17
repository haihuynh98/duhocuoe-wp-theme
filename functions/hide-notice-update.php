<?php

function hide_core_update_notifications_from_users() {
    if ( ! current_user_can( 'update_core' ) || ! is_super_admin()) {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}
add_action( 'admin_head', 'hide_core_update_notifications_from_users', 1 );