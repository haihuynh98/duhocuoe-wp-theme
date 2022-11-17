<?php
if (function_exists('tg_get_posts_most_view')):
    $queryPosts = tg_get_posts_most_view('post', ' DESC');
    ?>

    <div id="sidebar-posts-popular">
        <div class="sidebar widget">
            <h3>Nổi bật</h3>
            <ul>
                <?php foreach ($queryPosts as $post): ?>
                    <li>
                        <div class="sidebar-thumb">
                            <img class="animated rollIn"
                                 src="<?php echo get_the_post_thumbnail_url($post->ID) ?>"
                                 onerror="if (this.src != 'error.jpg') this.src = '/wp-content/themes/duhocuoe/images/Flag_of_None.png';"
                                 alt="<?php echo $post->post_title ?>"/>
                        </div><!-- .Sidebar-thumb -->
                        <div class="sidebar-content">
                            <h5 class="animated bounceInRight text-overflow-3-line"><a
                                        href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_title ?></a>
                            </h5>
                        </div><!-- .Sidebar-thumb -->
                        <div class="sidebar-meta">
                            <span class="time"><i
                                        class="fa fa-clock-o"></i> <?php echo get_the_date('m/d/Y', $post->ID) ?></span>
                            <span class="comment"><i
                                        class="fa fa-eye"></i> <?php echo tg_get_post_view($post->ID) ?></span>
                        </div><!-- .Sidebar-meta ends here -->
                    </li><!-- .Li ends here -->
                <?php endforeach; ?>
            </ul><!-- .Ul ends here -->
        </div><!-- .Widget ends here -->
    </div>

<?php endif; ?>