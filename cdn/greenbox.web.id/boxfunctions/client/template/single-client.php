<?php
/*
* Single Template Profile client
* Author: Albert Sukmono
* Description: "Single Template client" for view content post profile
*/

get_header(); ?>

<div class="container">
        <div class="row">
            <div class="span12">
                <?php if (function_exists('bootstrapwp_breadcrumbs_projectbase')) {
                bootstrapwp_breadcrumbs_projectbase();
                } ?>
            </div><!--/.span12 -->
        </div><!--/.row -->
		<div class="row content">
		<!-- Cycle through all posts -->
		<?php while ( have_posts() ) : the_post(); ?>
			<!-- Display featured image in right-aligned floating div -->
			<div class="pic-profile">
				<div class="image-post-single">
				<?php if ( has_post_thumbnail() ) {
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
				echo '<a rel="gallery" class="fancybox" href="' . $large_image_url[0] . '" title="' . the_title_attribute( 'echo=0' ) . '">';
				the_post_thumbnail( 'full', array('class' => 'profile'));
				echo '</a>';
				//the_post_thumbnail('full', array('class' => 'profile'));
				} else { ?>
				<img style="width:330px;height:auto;" src="<?php bloginfo('template_directory'); ?>/assets/img/no-image-thumb.svg" alt="<?php the_title(); ?>" />
				<?php } ?>
				</div>
				<!-- display image multi image metabox -->
				<div class="image-metabox-thumb">
				<?php
				$imgs  = get_images_src('full');
				foreach( $imgs as $i )
				echo '<a rel="gallery" class="fancybox" href="'.$i[0].'" title="' . the_title_attribute( 'echo=0' ) . '"><img src="' . $i[0] . '" /></a>';
				?>
				</div>
				<!-- end of display image multi image metabox -->
			</div>
			<div class="isi-profile">
			<!-- Display Title and Metabox -->
				<div class="deskripsi-profile"><i class="fa fa-briefcase"></i> <?php the_title(); ?></div>
				<table>
					<tr>
						<td style="width: 47%">Nama Ketua</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'nama', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Tahun Jabatan/ Periode</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'tahun_jabatan', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Universitas</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'universitas', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Jurusan</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'jurusan', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Angkatan Mahasiswa</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'angkatan', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Komisariat</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'komisariat', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Alamat Kantor</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'alamat_sekarang', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Kontak/ Telp</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'kontak', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Email</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'email', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Facebook</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'facebook', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Twitter</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'twitter', true ) ); ?></td>
					</tr>
					<tr>
						<td style="width: 47%">Website/ Blog</td>
						<td>: <?php echo esc_html( get_post_meta( get_the_ID(), 'website', true ) ); ?></td>
					</tr>
				<!-- Display yellow stars based on rating -->
					<tr>
						<td style="width: 47%">Work Rating</td>
						<td>: <?php
								$nb_stars = intval( get_post_meta( get_the_ID(), 'user_rating', true ) );
								for ( $star_counter = 1; $star_counter <= 5; $star_counter++ ) {
									if ( $star_counter <= $nb_stars ) {
										echo '<img src="https://e3377e01d4421b3c3f9b15592a72ecefdbd3680c.googledrive.com/host/0B3rJx3lThGYPflBFS1duSHdBRndtZDRwTDJBUXozX2dsWXI1NU1oMTR6MVp6VEN1WV9rYlE/greenbox.web.id/img/images/icon.png" />';
									} else {
										echo '<img src="https://e3377e01d4421b3c3f9b15592a72ecefdbd3680c.googledrive.com/host/0B3rJx3lThGYPflBFS1duSHdBRndtZDRwTDJBUXozX2dsWXI1NU1oMTR6MVp6VEN1WV9rYlE/greenbox.web.id/img/images/grey.png" />';
									}
								}
								?>
						</td>
					</tr>
				</table>
				<br />
				<!-- Display description "lembaga" contents -->
				<div class="deskripsi-profile"><i class="fa fa-newspaper-o"></i> Sekilas</div>
				<div class="entry-content"><?php the_content(); ?></div>
				<br />
				<hr/>
				<?php comments_template(); ?>
			</div><!--- /.isi-profile --->
			<?php endwhile; ?>
		</div><!-- .row content -->
</div><!--/.container -->
<?php wp_reset_query(); ?>
<?php get_footer(); ?>
