<?php get_header(); ?>
<main class="main-contents contents" id="js-main-contents">
	<h1 class="archive-title"><?php the_archive_title(); ?></h1>
	<div class="post-list">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article class="post-item">
					<div class="post-img">
						<a href="<?php echo esc_url(get_permalink()); ?>">
							<?php if (has_post_thumbnail()) : ?>
								<?php the_post_thumbnail('medium'); ?>
							<?php else : ?>
								<img src="<?php echo esc_url(get_theme_file_uri() . '/img/img_no-image.jpg'); ?>" alt="">
							<?php endif; ?>
						</a>
					</div>
					<header class="post-header">
						<time class="post-date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
						<ul class="post-categories">
							<?php
							$category = get_the_category();
							if ($category[0]) : ?>
								<li><a href="<?php echo get_category_link($category[0]->term_id); ?>"><?php echo $category[0]->cat_name; ?></a></li>
						</ul>
					<?php endif; ?>
					<h2 class="post-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h2>
					</header>
				</article>
			<?php endwhile;
		else : ?>
			<p>記事はありません。</p>
		<?php endif; ?>
	</div>
	<div class="nav-links">
		<?php posts_nav_link(' ', '&lt; 新しい投稿', '過去の記事 &gt;'); ?>
	</div>
</main>
<?php get_footer(); ?>