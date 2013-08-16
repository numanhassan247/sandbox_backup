<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Codeigniter Piwik Stat Example Controller
 *
 * Example Functions for dashboard displaying of Piwik Stats
 *
 * @author        Bryce Johnston < bryce@wingdspur.com >
 * @license       MIT
 */

class PiwikStats extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('piwik');
    }
    
    // Get unique, visits stats to display in a flot graph.
    public function index()
    {
        $visits = $this->piwik->actions('day', 10);
        $unique = $this->piwik->unique_visitors('day', 10);
        // Recommend using sometype of caching for this, example:
        // $visits = $this->piwik->actions('day', 10);
        // $unique = $this->piwik->unique_visitors('day', 10);
        
        foreach($visits as $date => $visit)
        { 
            $date_arr = explode('-', $date);
            $year = $date_arr[0];
            $month = $date_arr[1];
            $day = $date_arr[2];

            $utc = mktime(date('h') + 1, NULL, NULL, $month, $day, $year) * 1000;

            $flot_visits[] = '[' . $utc . ',' . $visit . ']';
            $flot_unique[] = '[' . $utc . ',' . $unique[$date] . ']';
        }

        $data['visits'] = '[' . implode(',', $flot_visits) . ']';
        $data['unique'] = '[' . implode(',', $flot_unique) . ']';
        $this->load->view('index', $data);
    }

    public function top_pages()
    {
        $data['page_titles'] = $this->piwik->page_titles('day', 'today');
        $this->load->view('top_pages', $data);
    }

    public function last_visitors()
    {
        $data['last_visits'] = $this->piwik->last_visits_parsed('today', 20);
        $this->load->view('last_visitors', $data);
    }

    public function downloads()
    {
        $data['downloads'] = $this->piwik->downloads('day', 10);
        $this->load->view('downloads', $data);
    }

    public function outlinks()
    {
        $data['outlinks'] = $this->piwik->outlinks('day', 10);
        $this->load->view('outlinks', $data);
    }

    public function keywords()
    {
        $data['keywords'] = $this->piwik->keywords('day', 'today');
        $this->load->view('keywords', $data);
    }

    public function refering_sites()
    {
        $data['websites'] = $this->piwik->websites('day', 'today');
        $this->load->view('refering_sites', $data);
    }

    public function search_engines()
    {
        $data['search_engines'] = $this->piwik->search_engines('day', 10);
        $this->load->view('search_engines', $data);
    }
    

}

/* End of file piwik_stats.php */
