<div class="wp-loan-container">
	<?php echo do_shortcode('[loan_calculator]'); ?>
</div>
<!-- <div class="slider-container">
	<div>
		<?php $query = new WP_Query( 'post_type=cpo_slide&posts_per_page=-1&order=ASC&orderby=menu_order' ); ?>
		<?php
		if ( $query->posts ) :
			$slide_count = 0;
		?>
		<?php wp_enqueue_script( 'cpotheme_cycle' ); ?>
		<div id="slider" class="slider">
			<div class="slider-slides cycle-slideshow" data-cycle-pause-on-hover="true" data-cycle-slides=".slide" data-cycle-prev=".slider-prev" data-cycle-next=".slider-next" data-cycle-pager=".slider-pages" data-cycle-timeout="8000" data-cycle-speed="1000" data-cycle-fx="fade">
				<?php
					foreach ( $query->posts as $post ) :
						setup_postdata( $post );
				?>
				<?php $slide_count++; ?>
				<?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), array( 1500, 7000 ), false, '' ); ?>
				<div id="slide_<?php echo $slide_count; ?>" class="slide cycle-slide-active" style="background-image:url(<?php echo $image_url[0]; ?>);">
				</div>
				<?php endforeach; ?>
			</div>
			<?php if ( sizeof( $query->posts ) > 1 ) : ?>
			<div class="slider-prev" data-cycle-cmd="pause"></div>
			<div class="slider-next" data-cycle-cmd="pause"></div>
			<?php endif; ?>
		</div> 			
		<?php endif; ?>
	</div> -->
	<!-- <div class="slider-loan-calculator container"> -->
		<!-- <app-loan-calculator></app-loan-calculator>
		<?php
			$scripts = array('runtime.js', 'es2015-polyfills.js', 'polyfills.js', 'styles.js', 'vendor.js', 'main.js');
			$dist_path = 'LoanCalculator/dist/LoanCalculator';
			foreach ($scripts as $script) {
				echo "<script src='{$dist_path}/$script'></script>";
			}
		?> -->
	<!-- </div>
</div> -->
