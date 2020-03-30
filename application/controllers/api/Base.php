<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Base extends REST_Controller {

    protected $base_response = array(
        'status' => 200,
        'message' => '',
        'data' => null
    );

    protected $jquery_datatable_response = array(
        'status' => 200,
        'draw' => 1,
        'recordsTotal' => 0,
        'recordsFiltered' => 0,
        'data' => []
    );

    public function __construct(){
        parent::__construct();
    }

    public function set_datatable_response($draw, $record_total, $data){
        $this->jquery_datatable_response['draw'] = $draw;
        $this->jquery_datatable_response['recordsTotal'] = $record_total;
        $this->jquery_datatable_response['recordsFiltered'] = $record_total;
        $this->jquery_datatable_response['data'] = $data;

        return $this->jquery_datatable_response;
    }

  
    public function success_response_datatable(){
        return $this->response($this->jquery_datatable_response, 200);
    }

  
    public function success_response($data = ""){
        $this->base_response['data'] = $data;
        $this->base_response['status'] = 200;
        return $this->show_response();
    }

    public function error_response($message = ""){
        $this->base_response['message'] = $message;
        $this->base_response['status'] = 500;
        return $this->show_response();
    }

  
    private function show_response(){
        return $this->response($this->base_response, $this->base_response['status']);
    }
}