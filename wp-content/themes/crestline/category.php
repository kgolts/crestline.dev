<?php get_header(); ?>

<div id="primary" class="content-area page category-landing projects">

        	<div class="container-fluid three-col header-txt">            
        <div class="row">
            
            <div class="col-sm-8">
            <div class="txt full-width">
                <h4 class="top"><a href="/news/">News</a></h4>
                
                <?php
                      $request_path = $_SERVER['REQUEST_URI'];
                        $path = explode("/", $request_path); // splitting the path
                        $last = end($path);
                        $last = prev($path);
                    if ( $last == 'news' )  : ?>
                     <h1 class="entry-title">
                         Latest
                    </h1>
                        <?php echo category_description( get_category_by_slug('news')->term_id ); ?> 
                   <?php else: ?>
                         <h1 class="entry-title">
                             
                         <?php echo get_cat_name ( get_category_by_slug($last)->term_id ); ?>
                    </h1>
                        <?php echo category_description( get_category_by_slug($last)->term_id ); ?> 
                   <?php endif; // end of the loop. ?>
                
                
            </div>    
            </div>
            
            <div class="col-sm-4">
                  <div class="txt full-width top news-categories">
                <?php wp_list_categories('child_of=6&title_li=Categories:'); ?> 
                </div>
            </div>
         
        </div>
    </div>
            
         <div class="container-fluid three-col">
		                  
                              <div class="row col-padding">
                                  
                            <?php

                                if ( $last == 'news' || $last == 'latest') {
                                    $thisCatName = 'news';
                                }else{
                                     $thisCatName = $last;
                                }

                                $mypages = get_posts ( array( 'category_name' => $thisCatName, 'sort_column' => 'date', 'sort_order' => 'asc' ) );
                                //col vars
                                $colnum = 3;
                                $counter = 0;
                            

                                foreach( $mypages as $page ) {	
                                   
                                    $content = $page->post_content;
                                    if ( ! $content ) // Check for empty page
                                        // continue;

                                    $content = apply_filters( 'the_content', $content );
                                     $url = wp_get_attachment_url( get_post_thumbnail_id($page->ID) );
                                  
                                ?>
                                    
                                    <div class="col-sm-4">
                                        <a href="<?php echo get_page_uri( $page->ID ); ?>"><div class="bg-img relatedprojects" style="background-image: url('<?php echo $url ?>')">
                                            <div class="img-overlay"><span class="link">Read Full Article &gt;</span></div>
                                            </div> </a>
                                       <div class="txt"> 
                                        <h2><a href="<?php echo get_page_uri( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
                                       
                                        <p><?php echo wp_trim_words( $content, 40 )  ?></p>
                                         <a href="<?php echo get_page_uri( $page->ID ); ?>" class="link">Read full Article</a>
                                        </div>
                                    </div>
                                <?php
                                    $counter++;
                  if ($counter % $colnum == 0) {
                  echo '</div><div class="row col-padding">';
                }
            
                                }	
                            ?>
                        </div>
                    </div>
                    
					
            
	</div><!-- /container -->
</div><!-- #primary -->

<script>
    $(function() {
    var num_cols = 2,
    container = $('.categories > ul'),
    listItem = 'li.cat-item',
    listClass = 'sub-list';
        
    items_count = $(this).find(listItem);    
   if(items_count.length > 4){
     
    container.each(function() {
        var items_per_col = new Array(),
        items = $(this).find(listItem),
        min_items_per_col = Math.floor(items.length / num_cols),
        difference = items.length - (min_items_per_col * num_cols);
        for (var i = 0; i < num_cols; i++) {
            if (i < difference) {
                items_per_col[i] = min_items_per_col + 1;
            } else {
                items_per_col[i] = min_items_per_col;
            }
        }
        for (var i = 0; i < num_cols; i++) {
            $(this).append($('<ul ></ul>').addClass(listClass));
            for (var j = 0; j < items_per_col[i]; j++) {
                var pointer = 0;
                for (var k = 0; k < i; k++) {
                    pointer += items_per_col[k];
                }
                $(this).find('.' + listClass).last().append(items[j + pointer]);
            }
        }
    });
   };
});
</script>

<?php get_footer();