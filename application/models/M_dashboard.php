<?php

class M_dashboard extends CI_Model {

    function count($table) {
        return $this->db->count_all($table);
    }
    function standard_active(){
        $this->db->select('s.*');
        $this->db->join('company_standard cs', 'cs.id_standard = s.id');
        $this->db->group_by('s.id');
        return $this->db->count_all_results('standard s');
    }
    function terlambat() {
//        $this->db->where('(date < CURDATE() AND file IS NULL) OR (file IS NOT NULL AND date < upload_date)');
//        return $this->db->count_all_results('schedule');
        return 0;
    }
}
