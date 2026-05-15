<?php

class password_page_selector{
    
    public function render() {
       ob_start();
        
       ?>
         <div class="wrap">
           
         <h1>Password Page Protector Configuration</h1>
         <p>Use Shortcode [password_protector_form] to display the password 
          protection form on any page or post.</p>
           
         <div class="pp-content-wrapper">

              <form method="post" action="pp_save_settings" id="ppp-settings-form">
                <input type="hidden" name="ppp_action" value="save_settings">
                 
                <!-- Password Field -->
                 <div class="pp-password-field">
                  <label for='ppp_password'>Your Password</label>
                  <p>Add a password to protect your content.</p>
                  <input type='password' id='ppp_password' name='password' required>
                  <button type="button" id="ppp-show-password" class="button">Show Password</button>
                 </div>
                 
                 <!-- Password Page Selector -->
                 
                 <div class="pp-password-page-selector">
                  <label for="ppp_protection_page">Select Protection Page</label>
                  <p>If You don't have a password-protected page yet, 
                    create one using the [password_protector_form] shortcode.</p>
                  
                    <select name="protection_page_id" id="ppp_protection_page">
                      <?php
                          $pages = get_pages(array('numberpages'=>-1));
                            foreach ( $pages as $page ) {

                            if (has_shortcode($page->post_content, 'password_protector_form')) {
                                  echo "<option value='{$page->ID}'>{$page->post_title}</option>";
                            }
                        }
                      ?>
                    </select>
                 </div>

                 <!--Password Protected Page Selector -->
                 
                 <div class="pp-protection-page-to-protect-selector">

                     <label for="ppp_page_id">Select Page You Want To Protect  </label>
                      <p>Select a page from the list below to apply password protection.</p>
                      <select name="page_id" id="ppp_page_id">
                      
                        <!-- Default option -->
                        <option value="">--No Page--</option>
                      
                        <?php
                        $pages = get_pages(array('numberpages'=>-1));
                          foreach ( $pages as $page ) {
                            if (!has_shortcode($page->post_content, 'password_protector_form')) {
                                    echo "<option value='{$page->ID}'>{$page->post_title}</option>";
                              }
                        }

                      ?>

                      </select>

                 </div>

                  <!--Password Protected Post Selector -->
                  
                  <div class="pp-protection-post-to-protect-selector">

                    <label for="ppp_post_id">Select Post You Want to Protect:</label>
                     <p>select a post from the list below to apply password protection.</p>
                    <select name="post_id" id="ppp_post_id">
                      
                       <!-- Default option -->
                       <option value="">-- No Post --</option>
                      
                      <?php
                      $posts = get_posts( array( 'numberposts' => -1 ) );
                      foreach ( $posts as $post ) {
                          if ( ! has_shortcode( $post->post_content, 'password_protector_form' ) ) {
                              echo "<option value='{$post->ID}'>{$post->post_title}</option>";
                          }
                      }
                      ?>
                    </select>

                  </div>
                 
                  
                <button type="submit"  id="ppp-save-btn" class="button button-primary">Save Settings</button>
              </form>


         </div>
             
       <?php

       return ob_get_clean();
    } 

}


