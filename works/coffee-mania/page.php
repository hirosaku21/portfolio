<?php get_header(); ?>

<main class="main-contents contents" id="js-main-contents">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article class="post-wrapper">
				<header class="post-header">
					<h1 class="post-title"><?php the_title(); ?></h1>
				</header>
				<div class="post-img">
					<?php if (has_post_thumbnail()) : ?>
						<?php the_post_thumbnail('medium_large'); ?>
					<?php endif; ?>
				</div>
				<?php the_content(); ?>
			</article>
	<?php endwhile;
	endif; ?>
</main>

<?php get_footer(); ?>