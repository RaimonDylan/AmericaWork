<?php
/**
 * Created by PhpStorm.
 * User: raimon
 * Date: 17/03/2019
 * Time: 20:10
 */

class RecruiterModel
{
    protected $db;

    public function __construct($database){
        $this->db = $database;
    }

    public function getAllRecruiter($page){
        $Recruiters = $this->db->arraybuilder()->paginate("Recruiter", $page);
        $users = $this->db->arraybuilder()->paginate("user", $page);
        $superRecruiter = array();
        foreach ($users as $user){
            foreach ($Recruiters as $Recruiter){
                if ($user['id_user'] == $Recruiter['id_user']){
                    $superRecruiter[] = array_merge($user, $Recruiter);
                }
            }
        }
        return $superRecruiter;
    }

    public function getAllUser(){
        $users = $this->db->arraybuilder()->paginate("user", 1);
        return $users;
    }

    public function getRecruiterById($id)
    {
        $this->db->where('id_recruiter', $id);
        $recruiter = $this->db->getOne("recruiter");
        return $recruiter;
    }

    public function insert(){
        $data_to_store = array_filter($_POST);
        $last_id = $this->db->insert('recruiter', $data_to_store);
        return $last_id;
    }

    public function update(){
        $recruiter_id = filter_input(INPUT_GET, 'recruiter_id', FILTER_SANITIZE_STRING);
        $data_to_update = filter_input_array(INPUT_POST);
        $this->db->where('id_recruiter',$recruiter_id);
        $stat = $this->db->update('recruiter', $data_to_update);
        return $stat;
    }

    public function delete(){
        $del_id = filter_input(INPUT_POST, 'del_id');
        $this->db->where('id_recruiter', $del_id);
        $status = $this->db->delete('recruiter');
        return $status;
    }
}