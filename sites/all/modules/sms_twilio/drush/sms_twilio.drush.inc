<?php
// $Id$

/**
 * @file
 * Drush integration for the sms_twilio module.
 */

/**
 * Implements hook_drush_command().
 */
function sms_twilio_drush_command() {
  $items['sms_twilio-download'] = array(
    'callback' => 'sms_twilio_drush_download',
    'description' => dt('Downloads the required twilio helper library from github.'),
    'arguments' => array(
      'path' => dt('Optional. A path to the download folder. If omitted Drush will use the default location (sites/all/libraries/twilio).'),
    ),
  );
  return $items;
}

/**
 * Downloads
 */
function sms_twilio_drush_download() {
  $args = func_get_args();
  if ($args[0]) {
    $path = $args[0];
  }
  else {
    $path = drush_get_context('DRUSH_DRUPAL_ROOT') . '/sites/all/libraries/twilio';
  }
  if (drush_shell_exec('git clone https://github.com/twilio/twilio-php.git ' . $path)) {
    @drush_shell_exec('find ' . $path . ' -name ".git" -type d -exec rm -rf {} \;');
    drush_log(dt('Twilio has been downloaded to @path.', array('@path' => $path)), 'success');
  }
  else {
    drush_log(dt('Drush was unable to download the Twilio to @path.', array('@path' => $path)), 'error');
  }
}

/**
 * Implements drush_MODULE_post_COMMAND().
 */
function drush_sms_twilio_post_enable() {
  $modules = func_get_args();
  if (in_array('sms_twilio', $modules)) {
    sms_twilio_drush_download();
  }
}
