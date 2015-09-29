
<?php if( have_rows('slide') ): ?>
    <div id="fullscreen_slider" class="flexslider">
    <ul class="slides">
    <?php while( have_rows('slide') ): the_row(); ?>
        <li>
            <img src="<?php the_sub_field('slide-image'); ?>" alt="" />
            <p class="flex-caption"><?php the_sub_field('slide-content'); ?></p>
        </li>
    <?php endwhile; ?>
    </ul>
    </div>
<?php endif; ?>

 