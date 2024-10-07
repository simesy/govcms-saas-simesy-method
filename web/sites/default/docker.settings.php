<?php

/**
 * @file
 * Local development settings, with dynamic settings for some dev environments.
 */

if (getenv('IS_DDEV_PROJECT') == 'true') {
  $databases['default']['default'] = [
    'driver' => 'mysql',
    'database' => 'db',
    'username' => 'db',
    'password' => 'db',
    'host' => 'db',
    'port' => 3306,
  ];
}

// Overrides so that Lagoon Solr works with DDEV plugin.
$solr = &$config['search_api.server.lagoon_solr']['backend_config'];
$solr['connector'] = 'solr_cloud_basic_auth';
$solr['connector_config']['core'] = 'solr9';
$solr['connector_config']['checkpoints_collection'] = '';
$solr['connector_config']['stats_cache'] = 'org.apache.solr.search.stats.LRUStatsCache';
$solr['connector_config']['distrib'] = 'true';
$solr['connector_config']['context'] = 'solr';
$solr['connector_config']['username'] = 'solr';
$solr['connector_config']['password'] = 'SolrRocks';

$settings['skip_permissions_hardening'] = TRUE;
$settings['container_yamls'][] = DRUPAL_ROOT . '/sites/default/docker.services.yml';

$settings['twig_debug'] = FALSE;
$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;
$config['system.logging']['error_level'] = ERROR_REPORTING_DISPLAY_VERBOSE;

// Beware of xdebug slowness.
$settings['cache']['bins']['render'] = 'cache.backend.null';
$settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';
$settings['cache']['bins']['page'] = 'cache.backend.null';
// // Extreme debugging.
// $settings['cache']['bins']['discovery'] = 'cache.backend.null';
// $settings['cache']['bins']['container'] = 'cache.backend.null';
// $settings['cache']['bins']['bootstrap'] = 'cache.backend.null';

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$settings['update_free_access'] = FALSE;
$settings['rebuild_access'] = FALSE;
$settings['govcms_security_super_ui'] = TRUE;

// $config['user.role.civictheme_site_administrator']['is_admin'] = TRUE;

$config['shield.settings']['shield_enable'] = FALSE;
$config['clam.settings']['enabled'] = FALSE;
$config['reroute_email.settings']['enabled'] = FALSE;

// Disabled TFA - reverse both of these settings to enable.
$config['tfa.settings']['reset_pass_skip_enabled'] = TRUE;
$config['tfa.settings']['enabled'] = FALSE;

