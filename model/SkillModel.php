<?php
/**
 * Created by PhpStorm.
 * User: raimon
 * Date: 17/03/2019
 * Time: 20:10
 */

class SkillModel
{
    protected $db;

    public function __construct($database){
        $this->db = $database;
    }

    public function getAllSkill($page){
        $skills = $this->db->arraybuilder()->paginate("skill", $page);
        return $skills;
    }

    public function getSkillById($id)
    {
        $this->db->where('id_skill', $id);
        $skill = $this->db->getOne("skill");
        return $skill;
    }

    public function insert(){
        $data_to_store = array_filter($_POST);
        $last_id = $this->db->insert('skill', $data_to_store);
        return $last_id;
    }

    public function update(){
        $skill_id = filter_input(INPUT_GET, 'skill_id', FILTER_SANITIZE_STRING);
        $data_to_update = filter_input_array(INPUT_POST);
        $this->db->where('id_skill',$skill_id);
        $stat = $this->db->update('skill', $data_to_update);
        return $stat;
    }

    public function delete(){
        $del_id = filter_input(INPUT_POST, 'del_id');
        $this->db->where('id_skill', $del_id);
        $status = $this->db->delete('skill');
        return $status;
    }
}