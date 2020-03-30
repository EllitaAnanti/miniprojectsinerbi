<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Index_api extends REST_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index_get(){
        $this->response("Mini Project Sinerbi API");
    }

    public function generate_hash_get(){
        $string = $this->get('string');
        $this->response(sha1($string));
    }
}
