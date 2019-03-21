<?php
/**
 * Created by PhpStorm.
 * User: raimon
 * Date: 17/03/2019
 * Time: 20:10
 */

class CompanyModel
{
    protected $db;

    public function __construct($database){
        $this->db = $database;
    }

    public function getAllCompany($page){
        $companys = $this->db->arraybuilder()->paginate("company", $page);
        return $companys;
    }

    public function getCompanyById($id)
    {
        $this->db->where('id_company', $id);
        $company = $this->db->getOne("company");
        return $company;
    }

    public function insert(){
        $data_to_store = array_filter($_POST);
        $last_id = $this->db->insert('company', $data_to_store);
        return $last_id;
    }

    public function update(){
        $company_id = filter_input(INPUT_GET, 'company_id', FILTER_SANITIZE_STRING);
        $data_to_update = filter_input_array(INPUT_POST);
        $this->db->where('id_company',$company_id);
        $stat = $this->db->update('company', $data_to_update);
        return $stat;
    }

    public function delete(){
        $del_id = filter_input(INPUT_POST, 'del_id');
        $this->db->where('id_company', $del_id);
        $status = $this->db->delete('company');
        return $status;
    }
}