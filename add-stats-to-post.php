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
    add_action('admin_init', array($this, 'settings'));
  }
  
  function settings () {
    add_settings_section('wcp_first_section', null, null, 'word-count-settings-page');

    add_settings_field('wcp_location', 'Display Location', array($this, 'locationHTML'), 'word-count-settings-page', 'wcp_first_section');
    register_setting(
      // group which this belong to
      'wordcountplugin',
      // key
      'wcp_location',
      // value
      array('sanitize_callback' => 'sanitize_text_field', 'default' => '0')
    );


  }

  function locationHTML () { ?>
    <select name="wcp_location">
      <option value="0">Beginning of post</option>
      <option value="1">End of post</option>
    </select>

  <?php
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
      <form action="options.php" method="POST">
        <?php
          settings_fields('wordcountplugin');
          do_settings_sections('word-count-settings-page');
          submit_button();
        ?>
      </form>
    </div>
  <?php
  }

}

$postStatsPlugin = new PostStatsPlugin();
