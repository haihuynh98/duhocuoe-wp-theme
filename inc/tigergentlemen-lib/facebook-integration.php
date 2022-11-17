<?php

function get_like_facebook_post()
{
    ?>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0&appId=2045960872293533&autoLogAppEvents=1"
            nonce="2Pkt2jZx"></script>
    <div class="fb-like" data-href="' . get_permalink() . ' " data-width="" data-height="30px" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>

    <script>
        jQuery(document).ready(function ($) {
            let postWidth = document.querySelector(\'.like-fb-hook\').offsetWidth
            $(\'.fb-like\').attr(\'data-width\', postWidth + \'px\')
        })</script>
    <?php
}

add_action('like-facebook-post', 'get_like_facebook_post');
add_shortcode('like-facebook-post', 'get_like_facebook_post');

function get_like_facebook_home_page()
{
    echo '
            <div id="fb-root"></div>
            <script async="" defer="" crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&amp;version=v8.0" nonce="MmObmoPK"></script>
            
            <div style="width: 600px;">
            <!-- Page plugin\'s width will be 500px -->
            
            <div class="fb-page" data-href="https://www.facebook.com/Kaspersky" data-tabs="timeline" data-width="200" data-height="120" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Kaspersky" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Kaspersky">Neil Music</a></blockquote></div>
            
            </div>';
}

add_action('like-facebook-home-page', 'get_like_facebook_home_page');
add_shortcode('like-facebook-home-page', 'get_like_facebook_home_page');
