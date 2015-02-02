<?php
/**
 * Created by PhpStorm.
 * User: Ibrahim
 * Date: 12/4/2014
 * Time: 3:41 PM
 */

class Pages extends CI_Controller {

    public function view($page = 'home')
    {
        $this->load->helper('url');
        $this->load->library('session');

        // If no view page exists for the requested URL, show 404 error page
        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        if($page == 'home') {
            $this->load->view('pages/'.$page, $data);
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer', $data);
        }
    }
}
