<?php 
	/* Template Name: custom home-page */
?>
<?php get_header(); ?>

<?php get_template_part( 'template-parts/element', 'page-header' ); ?>

<div class="container">
	<?php the_content(); ?>
</div>

<?php get_footer(); ?>
