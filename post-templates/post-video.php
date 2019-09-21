<article class="post">

   <div class="entry-header cf">

      <h1><?php the_title(); ?></h1>

      <p class="post-meta">

         <time class="date"><?php the_time('M j, Y'); ?></time>
         /
         <span class="categories">
           <?php the_category(' / ') ?>
         </span>

      </p>

   </div>

   <div class="post-thumb">
        <?php if ( has_post_thumbnail() ) {
             the_post_thumbnail('post-thumb');
        }?>
   </div>

   <div class="post-content">
      <?php
        the_post();
        echo the_content();
      ?>
   </div>

</article> <!-- post end -->
