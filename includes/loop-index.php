
<div class="post-wrapper">

	<div class="post-img-wrapper">
		<div class="close-post">&times;</div>
		<?php  the_post_thumbnail( 'full' ); ?>
	</div>
	
	<div class="post-left-col">
		<div class="content-wrapper">

			
			<h1><?php the_title();?></h1>
			<?php
			the_content();

		    //tags on single post
			if(has_tag())
			{
		    	echo '<span class="blog-tags minor-meta">';
		    	the_tags('<strong>'.__('Tags:','avia_framework').'</strong><span> ');
		    	echo '</span></span>';
			} ?>
		    
		</div>		
	</div>
	<div class="post-right-col">
		<div class="merattlasa-wrapper">
			<h3>Mer att läsa</h3>
			
			<?php			
			$args = array(
				'numberposts' => 10,
				'offset' => 0,
				'category' => 0,
				'orderby' => 'post_date',
				'order' => 'DESC',
				'include' => '',
				'exclude' => '',
				'meta_key' => '',
				'meta_value' =>'',
				'post_type' => 'post',
				'post_status' => 'draft, publish, future, pending, private',
				'suppress_filters' => true
			);	

			$the_query = new WP_Query( $args );
			// The Loop
			if ( $the_query->have_posts() ) {

				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					echo '<p><span class="link-decoration">>></span><a class="merattlasa-link" href="' . get_permalink() . '">' . get_the_title() . '</a></p>';
				}
				/* Restore original Post Data */
				wp_reset_postdata();
				
			} else {
				// no posts found
			}	
			wp_reset_query();
			?>		
		</div>
	</div>

	<div class="post-contact-wrapper">

		<div class="contact-col-left">
			<h2><?php the_field('kontakta_oss_titel', $_POST['postId']);?></h2>
			<p class="p1"><?php the_field('kontakta_oss_text', $_POST['postId']);?></p>

			<div class="contact-img-wrapper">

				<div id="contact1-wrapper">
					<?php
					if(get_field('kontakta_oss_kontaktperson_1_bild', $_POST['postId'])) { ?>
						<img src="<?php the_field('kontakta_oss_kontaktperson_1_bild', $_POST['postId']);?>"/>
					<?php 
					} else { ?>
						<img src="/urkraft/wp-content/uploads/2018/10/patrick.png"/>
					<?php
					} ?>
					<h4><?php the_field('kontakta_oss_kontaktperson_1_namn', $_POST['postId']);?></h4>
					<p><?php the_field('kontakta_oss_kontaktperson_1_tel', $_POST['postId']);?></p>
					<p><a href="mailto:<?php the_field('kontakta_oss_kontaktperson_1_epostadress', $_POST['postId']);?>"><?php the_field('kontakta_oss_kontaktperson_1_epostadress', $_POST['postId']);?></a></p>	
				</div>

				<div id="contact2-wrapper">
					<?php
					if(get_field('kontakta_oss_kontaktperson_2_bild', $_POST['postId'])) { ?>
						<img src="<?php the_field('kontakta_oss_kontaktperson_2_bild', $_POST['postId']);?>"/>
					<?php 
					} else { ?>
						<img src="/urkraft/wp-content/uploads/2018/10/anders.png"/>
					<?php
					} ?>
					<h4><?php the_field('kontakta_oss_kontaktperson_2_namn', $_POST['postId']);?></h4>
					<p><?php the_field('kontakta_oss_kontaktperson_2_tel', $_POST['postId']);?></p>
					<p><a href="mailto:<?php the_field('kontakta_oss_kontaktperson_2_epostadress', $_POST['postId']);?>"><?php the_field('kontakta_oss_kontaktperson_2_epostadress', $_POST['postId']);?></a></p>				
				</div>

			</div>

		</div>

		<div class="contact-col-right">
			<h2>Kontakta oss</h2>
			<?php echo do_shortcode("[contact-form-7 id='533' title='Kontakta Oss']"); ?>
		</div>

	<div class="clear"></div>

	</div> <!-- End of contact wrapper -->

</div>

