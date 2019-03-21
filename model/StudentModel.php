<?php
/**
 * Created by PhpStorm.
 * User: raimon
 * Date: 17/03/2019
 * Time: 20:10
 */

class StudentModel
{
    protected $db;

    public function __construct($database){
        $this->db = $database;
    }

    public function getAllStudent($page){
        $students = $this->db->arraybuilder()->paginate("student", $page);
        $users = $this->db->arraybuilder()->paginate("user", $page);
        $superStudent = array();
        foreach ($users as $user){
            foreach ($students as $student){
                if ($user['id_user'] == $student['id_user']){
                    $superStudent[] = array_merge($user, $student);
                }
            }
        }
        return $superStudent;
    }

    public function getAllUser(){
        $users = $this->db->get("user");
        return $users;
    }

    public function getStudentById($id)
    {
        $this->db->where('id_student', $id);
        $student = $this->db->getOne("student");
        return $student;
    }

    public function insert(){
        $data_to_store = array_filter($_POST);
        $last_id = $this->db->insert('student', $data_to_store);
        return $last_id;
    }

    public function update(){
        $student_id = filter_input(INPUT_GET, 'student_id', FILTER_SANITIZE_STRING);
        $data_to_update = filter_input_array(INPUT_POST);
        $this->db->where('id_student',$student_id);
        $stat = $this->db->update('student', $data_to_update);
        return $stat;
    }

    public function delete(){
        $del_id = filter_input(INPUT_POST, 'del_id');
        $this->db->where('id_student', $del_id);
        $status = $this->db->delete('student');
        return $status;
    }
}