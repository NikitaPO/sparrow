
<?php get_header(); ?>
<?php
  $prev_post = get_previous_post();
  $next_post = get_next_post();
 ?>

   <!-- Content
   ================================================== -->
   <div class="content-outer">

     <?php if (have_posts()) : ?>
     	<?php while (have_posts()) : the_post(); ?>
        <div id="page-content" class="row portfolio">

           <section class="entry cf">

              <div id="secondary"  class="four columns entry-details">

                    <h1><?php the_title() ?></h1>

                    <div class="entry-description">

                       <?php the_field('portfolio-post-description') ?>

                    </div>

                    <ul class="portfolio-meta-list">
  						   <li><span>Date: </span><?php the_field('portfolio-post-date') ?></li>
  						   <li><span>Client </span><?php the_field('portfolio-post-client') ?></li>
  						   <li><span>Skills: </span><?php the_field('portfolio-post-skills') ?></li>
  				      </ul>

                    <a class="button" href="http://behance.net">View project</a>

              </div> <!-- secondary End-->

              <div id="primary" class="eight columns">

                 <div class="entry-media">

                   <?php the_post_thumbnail() ?>

                   <img src="<?php the_field('portfolio-post-photo') ?>" alt="">

                 </div>

                 <div class="entry-excerpt">

  				      <?php the_content(); ?>

  					</div>

              </div> <!-- primary end-->

           </section> <!-- end section -->

           <ul class="post-nav cf">
          <?php
            if ($prev_post != null) {
              ?>
                <li class="prev"><a href="<?php the_permalink( $prev_post ); ?>" rel="prev"><strong>Previous Entry</strong><?php echo $prev_post->post_title ?></a></li>
              <?php
            }
          ?>

          <?php
            if ($next_post != null) {
              ?>
                <li class="next"><a href="<?php the_permalink( $next_post ); ?>" rel="next"><strong>Next Entry</strong><?php echo $next_post->post_title ?></a></li>
              <?php
            }
          ?>


  			</ul>

        </div>
     	<?php endwhile; ?>
     <?php endif; ?>

    </div> <!-- content End-->

   <!-- Tweets Section
   ================================================== -->
   <section id="tweets">

      <div class="row">

         <div class="tweeter-icon align-center">
            <i class="fa fa-twitter"></i>
         </div>

         <ul id="twitter" class="align-center">
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
               <b><a href="#">2 Days Ago</a></b>
            </li>

         </ul>

         <p class="align-center"><a href="#" class="button">Follow us</a></p>

      </div>

   </section> <!-- Tweet Section End-->

<?php get_footer(); ?>
