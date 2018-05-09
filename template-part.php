<?php if( have_rows('flexible_content') ): ?>
  <div class="flexible-content-container">
  <?php while ( have_rows('flexible_content') ) : the_row();?>

    <?php if( get_row_layout() == '1_column' ): ?>
      <div class="one-column flexible-content">
        <?php if (get_sub_field('add_heading')) { ?>
          <h2 class="secondary-header"><?= get_sub_field('heading'); ?></h2>
        <?php } ?>
        <div class="columns">
          <div class="column"><?= get_sub_field('content'); ?></div>
        </div>
      </div>
    <?php endif; ?>

    <?php if( get_row_layout() == '2_column' ): ?>
      <div class="two-columns flexible-content">
        <?php if (get_sub_field('add_heading')) { ?>
          <h2 class="secondary-header"><?= get_sub_field('heading'); ?></h2>
        <?php } ?>
        <div class="columns">
          <div class="column"><?= get_sub_field('column_1'); ?></div>
          <div class="column"><?= get_sub_field('column_2'); ?></div>
        </div>
      </div>
    <?php endif; ?>

    <?php if( get_row_layout() == '3_column' ): ?>
      <div class="three-columns flexible-content">
        <?php if (get_sub_field('add_heading')) { ?>
          <h2 class="secondary-header"><?= get_sub_field('heading'); ?></h2>
        <?php } ?>
        <div class="columns">
          <div class="column"><?= get_sub_field('column_1'); ?></div>
          <div class="column"><?= get_sub_field('column_2'); ?></div>
          <div class="column"><?= get_sub_field('column_3'); ?></div>
        </div>
      </div>
    <?php endif; ?>

    <?php if( get_row_layout() == 'full_width_image' ): ?>
      <div class="full-width-image flexible-content">
        <?php if (!get_sub_field('disable_cropping')) { ?>
          <img src="<?= get_sub_field('image')['sizes']['flex_large']; ?>">
        <?php } else { ?>
          <img src="<?= get_sub_field('image')['sizes']['flex_large_no_crop']; ?>">
        <?php } ?>
      </div>
    <?php endif; ?>

    <?php if( get_row_layout() == '2_images' ): ?>
      <div class="two-images flexible-content">
        <div class="image">
          <img src="<?= get_sub_field('image_1')['sizes']['flex_half']; ?>">
        </div>
        <div class="image">
          <img src="<?= get_sub_field('image_2')['sizes']['flex_half']; ?>">
        </div>
      </div>
    <?php endif; ?>

    <?php if( get_row_layout() == '3_images' ): ?>
      <div class="three-images flexible-content">
        <div class="image">
          <img src="<?= get_sub_field('image_1')['sizes']['flex_small']; ?>">
        </div>
        <div class="image">
          <img src="<?= get_sub_field('image_2')['sizes']['flex_small']; ?>">
        </div>
        <div class="image">
          <img src="<?= get_sub_field('image_3')['sizes']['flex_small']; ?>">
        </div>
      </div>
    <?php endif; ?>

    <?php if( get_row_layout() == 'image_and_content' ): ?>
      <div class="image-and-content flexible-content">
        <div class="columns">
          <?php if (get_sub_field('order') == 'image_right') { ?>
            <div class="column content"><?= get_sub_field('content'); ?></div>
            <div class="column image"><?= wp_get_attachment_image(get_sub_field('image')['id'], 'flex_half'); ?></div>
          <?php } else { ?>
            <div class="column image"><?= wp_get_attachment_image(get_sub_field('image')['id'], 'flex_half'); ?></div>
            <div class="column content"><?= get_sub_field('content'); ?></div>
          <?php } ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if( get_row_layout() == 'highlighted_section' ): ?>
      <div class="highlighted-section flexible-content">
        <?php if (get_sub_field('add_heading')) { ?>
          <h2 class="secondary-header"><?= get_sub_field('heading'); ?></h2>
        <?php } ?>
        <div class="content"><?= get_sub_field('content'); ?></div>
      </div>
    <?php endif; ?>

    <?php if( get_row_layout() == 'youtube_video' ): ?>
      <div class="youtube-video flexible-content">
        <div class="wrapper">
          <?= get_sub_field('embed_code'); ?>
        </div>
      </div>
    <?php endif; ?>

  <?php endwhile; ?>
  </div>
<?php endif; ?>
