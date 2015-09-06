<?php
function copy_post_to_blog($post_id, $target_blog_id) {
   $post = get_post($post_id, ARRAY_A); // get the original post
   $meta = get_post_meta($post_id);
   $post['ID'] = ''; // empty id field, to tell wordpress that this will be a new post
   switch_to_blog($target_blog_id); // switch to target blog
   $inserted_post_id = wp_insert_post($post); // insert the post
   foreach($meta as $key=>$value) {
  	 update_post_meta($inserted_post_id,$key,$value[0]);
   }
   restore_current_blog(); // return to original blog
}