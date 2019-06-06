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

    public function getAllJobArray($id_recruiter = null){
        if(empty($id_recruiter)){
            $jobs = $this->db->query("SELECT * FROM job NATURAL JOIN company ORDER BY created_at DESC");
        }else{
            $jobs = $this->db->query("SELECT * FROM job NATURAL JOIN company WHERE id_recruiter = $id_recruiter ORDER BY created_at DESC");
        }

        return $jobs;
    }

    public function getStudentsByJob($id_job){
        $etudiants = $this->db->query("SELECT * FROM student NATURAL JOIN user NATURAL JOIN student_job WHERE id_job = $id_job");
        return $etudiants;
    }

    public function getCompanyByUser($id_user){
        $company = $this->db->query("SELECT * FROM `company` WHERE id_company IN (SELECT id_company FROM recruiter_company NATURAL JOIN recruiter NATURAL JOIN user WHERE user.id_user = $id_user)");
        return $company;
    }

    public function getExperiences($id_student){
        $experiences = $this->db->query("SELECT * FROM `experience` WHERE id_student = $id_student");
        return $experiences;
    }

    public function getCompetences($id_student){
        $competences = $this->db->query("SELECT * FROM `skill` NATURAL JOIN student_skill WHERE skill.id_skill IN (SELECT id_skill FROM student_skill NATURAL JOIN student WHERE id_student = $id_student)");
        return $competences;
    }

    public function getEcoles($id_student){
        $ecoles = $this->db->query("SELECT * FROM `school` NATURAL JOIN student_school WHERE school.id_school IN (SELECT id_school FROM student_school NATURAL JOIN student WHERE id_student = $id_student)");
        return $ecoles;
    }

    public function getStudent($id_student){
        $student = $this->db->rawQueryOne("SELECT * FROM `student` NATURAL JOIN user WHERE student.id_student = $id_student");
        return $student;
    }

    public function getAllRecruiters(){
        $recruiters = $this->db->get("recruiter");
        $users = $this->db->get("user");
        $arr = array();
        foreach ($users as $user){
            foreach ($recruiters as $recruiter){
                if ($recruiter['id_user'] == $user['id_user']){
                    $arr[] = array_merge($user, $recruiter);
                }
            }
        }
        return $arr;
    }

    public function getAllStudents(){
        $students = $this->db->get("student");
        $users = $this->db->get("user");
        $arr = array();
        foreach ($users as $user){
            foreach ($students as $student){
                if ($student['id_user'] == $user['id_user']){
                    $arr[] = array_merge($user, $student);
                }
            }
        }
        return $arr;
    }

    public function getAllCompany(){
        $company = $this->db->get("company");
        return $company;
    }

    public function getJobById($id)
    {
        $this->db->where('id_job', $id);
        $job = $this->db->getOne("job");
        return $job;
    }

    public function insert(){
        $data_to_store = array_filter($_POST);

        if(empty($data_to_store['id_recruiter'])){
            unset($data_to_store['id_recruiter']);
        }else{
            unset($data_to_store['id_student']);
        }
        $last_id = $this->db->insert('job', $data_to_store);
        return $last_id;
    }

    public function update(){
        $job_id = filter_input(INPUT_GET, 'job_id', FILTER_SANITIZE_STRING);
        $data_to_update = filter_input_array(INPUT_POST);
        if(empty($data_to_update['id_recruiter'])){
            unset($data_to_update['id_recruiter']);
        }else{
            unset($data_to_update['id_student']);
        }
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