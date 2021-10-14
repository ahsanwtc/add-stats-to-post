<?php
/**
 * Plugin Name: Add Stats to the Posts
 * Plugin URI: https://github.com/ahsanwtc/add-stats-to-post
 * Description: A simple plugin to add extra stats to posts
 * Version: 1.0
 * Author: jsan
 * Author URI: https://iamahsan.dev
 */

class PostStatsPlugin {
  function __construct () {
    add_action('admin_menu', array($this, 'adminPage'));
  }
  
  function adminPage () {
    add_options_page(
      // Page title
      'Word Count Settings',
      // Link text
      'Word Count',
      // permissions
      'manage_options',
      // slug
      'word-count-settings-page',
      // function
      array($this, 'adminHTML')
    );
  }
  
  function adminHTML () { ?>
    <div class="wrap">
      <h1>Word Count Settings</h1>
    </div>
  <?php
  }

}

$postStatsPlugin = new PostStatsPlugin();
