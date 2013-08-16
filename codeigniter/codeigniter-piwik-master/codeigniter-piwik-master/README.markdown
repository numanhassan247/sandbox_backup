CodeIgniter-Piwik
============

CodeIgniter Library for retrieving stats from Piwik Open Source Analytics. Also a helper is included for generating a piwik tracking tag based on the piwik settings defined in the piwik config file.


Requirements
------------

1. CodeIgniter 1.7.2 - 2.1.3  
2. Piwik Install  
3. For GeoIP capabilities: MaxMind GeoLiteCity  

Helpful Links
-------------

- <a href="http://piwik.org/latest.zip">Piwik Download</a>
- <a href="http://dev.piwik.org/trac/wiki/API/Reference">Piwik API Reference</a>
- <a href="http://geolite.maxmind.com/download/geoip/database/GeoLiteCity.dat.gz">MaxMind GeoLiteCity Database</a>

Usage
-----
	
	// --- CONFIGURATION ( config/piwik.php ) ------------------------------------------ //
	
	// Base URL to the Piwik Install
	$config['piwik_url'] = 'http://stats.example.com';

	// HTTPS Base URL to the Piwik Install (not required)
	$config['piwik_url_ssl'] = 'https://stats.example.com';

	// Piwik Site ID for the website you want to retrieve stats for
	$config['site_id'] = 1;

	// Piwik API token, you can find this on the API page by going to the API link from the Piwik Dashboard
	$config['token'] = '0b3b2sdgsd7e82385avdfgde44dsfgd5g';

	// To turn geoip on, you will need to set to TRUE  and GeoLiteCity.dat will need to be in helpers/geoip
	$config['geoip_on'] = FALSE;

	// Controls whether piwik_tag helper function outputs tracking tag (for production, set to TRUE)
	$config['tag_on'] = FALSE;
	
	
	// --- LIBRARY Usage --------------------------------------------------------------- //
	
	// Load Libary
	$this->load->library('piwik');

	// Get Actions for Today
	$data['actions'] = $this->piwik->actions('day', 'today');
	// Get Actions for Last 10 Days
	$data['actions'] = $this->piwik->actions('day', 10);
	// Get Actions for Last 6 months
	$data['actions'] = $this->piwik->actions('month', 6);
    
	// Get Today's 20 Last Visitors
	$data['visitors'] = $this->piwik->last_visits('today', 20);

	// Get Today's Last 20 Visitors Formatted 
	// Eliminates needs from parsing whats returned from the last_visits function, does GeoIP lookup if enabled
	$data['visitors'] = $this->piwik->last_visits_parsed('today', 20);

	// If GeoIP enabled, and you want to get geoip information, pass it an IP Address
	$geoip = $this->piwik->get_geoip('127.0.0.1');
	
	
	// --- HELPER Usage ---------------------------------------------------------------- //
	
	// Load the helper to use to generate tracking tag
	$this->load->helper('piwik');
	
	// Call the helper function before the closing body tag in your view
	...
	<?php echo piwik_tag(); ?>
	</body>
	</html>


	// --- Controller Usage ------------------------------------------------------------ //

	// See the included example controller

To-do
-----

- Add more library functions for other API methods
- Finish documentation for all existing library functions and add user guide
- Improve the way data is returned in some of the functions
- Integrate GeoIP with Google Maps API to build a visitor map