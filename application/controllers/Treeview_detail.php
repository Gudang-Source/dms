<?php

class Treeview_detail extends MY_Controller {

    protected $module = 'treeview_detail';

    function __construct() {
        parent::__construct();
        $this->load->model('m_treeview_detail', 'model');
    }

    function index() {
        $this->load->model('m_company');
        $this->data['company'] = $this->m_company->get();
        $this->render('read');
    }

    function tabs() {
        if (empty($this->input->post('idStandar'))) {
            die('NO ACCESS');
        }
        $this->data['data'] = $this->model->reads();
//        die($this->db->last_query());
        $this->render('tab', TRUE, TRUE);
    }

    function standard() {
        if (!$this->input->is_ajax_request()) {
            redirect('404');
        }
        echo json_encode($this->model->standard());
    }

    function form2() {
        $this->data['data'] = $this->model->reads();
        $this->data['member'] = $this->model->member();
        $this->render('form2', TRUE, TRUE);
    }

    function form2_send() {
        if ($this->model->form2_submit()) {
            if ($this->model->anggota_submit()) {
                echo 'success';
            } else {
                echo $this->db->error()['message'];
            }
        } else {
            echo $this->db->error()['message'];
        }
    }
    function upload() {
        $this->render('upload');
    }
}
