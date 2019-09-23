<article class="post">

   <div class="entry-header cf">


      <p class="post-meta">

         <time class="date"><?php the_time('M j, Y'); ?></time>

      </p>

   </div>

   <div class="post-thumb">
        <?php if ( has_post_thumbnail() ) {
             the_post_thumbnail('post-thumb');
        }?>
   </div>

   <div class="post-content">
      <?php
        echo the_content();
      ?>
   </div>

</article> <!-- post end -->
