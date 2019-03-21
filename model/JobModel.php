<?php
/**
 * Created by PhpStorm.
 * User: raimon
 * Date: 17/03/2019
 * Time: 20:10
 */

class JobModel
{
    protected $db;

    public function __construct($database){
        $this->db = $database;
    }

    public function getAllJob($page){
        $jobs = $this->db->arraybuilder()->paginate("job", $page);
        return $jobs;
    }

    public function getJobById($id)
    {
        $this->db->where('id_job', $id);
        $job = $this->db->getOne("job");
        return $job;
    }

    public function insert(){
        $data_to_store = array_filter($_POST);
        $last_id = $this->db->insert('job', $data_to_store);
        return $last_id;
    }

    public function update(){
        $job_id = filter_input(INPUT_GET, 'job_id', FILTER_SANITIZE_STRING);
        $data_to_update = filter_input_array(INPUT_POST);
        $this->db->where('id_job',$job_id);
        $stat = $this->db->update('job', $data_to_update);
        return $stat;
    }

    public function delete(){
        $del_id = filter_input(INPUT_POST, 'del_id');
        $this->db->where('id_job', $del_id);
        $status = $this->db->delete('job');
        return $status;
    }
}