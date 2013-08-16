<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Base URL to the Piwik Install
$config['piwik_url'] = 'http://localhost/sandbox/codeigniter/piwik';

// HTTPS Base URL to the Piwik Install (not required)
$config['piwik_url_ssl'] = 'https://stats.example.com';

// Piwik Site ID for the website you want to retrieve stats for
$config['site_id'] = 1;

// Piwik API token, you can find this on the API page by going to the API link from the Piwik Dashboard
$config['token'] = 'c0e024d9200b5705bc4804722636378a';

// To turn geoip on, you will need to set to TRUE  and GeoLiteCity.dat will need to be in helpers/geoip
$config['geoip_on'] = TRUE;

// Controls whether piwik_tag helper function outputs tracking tag (for production, set to TRUE)
$config['tag_on'] = TRUE;
