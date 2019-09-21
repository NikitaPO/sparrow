
  <?php get_header('page'); ?>
   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1>Category <?php wp_title('')?><span>.</span></h1>

            <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
            enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. </p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row">

         <div id="primary" class="eight columns">

            <?php if (have_posts()) { while (have_posts()) { the_post();?>
            <article class="post">

               <div class="entry-header cf">

                  <h1><a href="<?php the_permalink(); ?>"  ><?php echo the_title(); ?></a></h1>

                  <p class="post-meta">

                     <time class="date"><?php the_time('M j, Y'); ?></time>
                     /
                     <span class="categories">
                       <?php the_category(' / ') ?>
                     </span>

                  </p>

               </div>

               <div class="post-thumb">
                  <a href="<?php the_permalink(); ?>"  >
                    <?php if ( has_post_thumbnail() ) {
	                       the_post_thumbnail('post-thumb');
                    }?>
                  </a>
               </div>

               <div class="post-content">
                  <?php echo the_excerpt()?>
               </div>

            </article> <!-- post end -->

            <?php } //while end?>

              <?php the_posts_pagination(
                array(
              	'show_all'     => false, // показаны все страницы участвующие в пагинации
              	'end_size'     => 4,     // количество страниц на концах
              	'mid_size'     => 4,     // количество страниц вокруг текущей
              	'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
              	'prev_text'    => __('« Prev'),
              	'next_text'    => __('Next »'),
              	'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
              	'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
              	'screen_reader_text' => __( 'Posts navigation' ),
                )
              ); ?>

          <?php } //if end?>

         </div> <!-- Primary End-->

         <div id="secondary" class="four columns end">

            <?php get_sidebar('right') ?>

         </div> <!-- Secondary End-->

      </div>

   </div> <!-- Content End-->

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
            <!--
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
               <b><a href="#">3 Days Ago</a></b>
            </li>
            -->
         </ul>

         <p class="align-center"><a href="#" class="button">Follow us</a></p>

      </div>

   </section> <!-- Tweets Section End-->

   <!-- footer
   ================================================== -->
   <?php get_footer(); ?>
