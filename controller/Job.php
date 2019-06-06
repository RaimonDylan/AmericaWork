<?php 
class Job{
    protected $model = '';

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index($page)
    {
        return $jobs = $this->model->getAllJob($page);
        //require 'view/user/list.php';
    }

    public function getAllJob($id_recruiter = null){
        return $jobs = $this->model->getAllJobArray($id_recruiter);
    }

    public function getAllStudents(){
        return $students = $this->model->getAllStudents();
    }

    public function getStudentsByJob($id_job){
        return $students = $this->model->getStudentsByJob($id_job);
    }

    public function getAllRecruiters(){
        return $recruiters = $this->model->getAllRecruiters();
    }

    public function getAllCompany(){
        return $recruiters = $this->model->getAllCompany();
    }

    public function getCompanyByUser($id_user){
        return $company = $this->model->getCompanyByUser($id_user);
    }

    public function getExperiences($id_student){
        return $experiences = $this->model->getExperiences($id_student);
    }

    public function getCompetences($id_student){
        return $competences = $this->model->getCompetences($id_student);
    }

    public function getEcoles($id_student){
        return $ecoles = $this->model->getEcoles($id_student);
    }

    public function getStudent($id_student){
        return $student = $this->model->getStudent($id_student);
    }


    public function create()
    {
        if ($_POST) {
            $last_id = $this->model->insert();
            if($last_id)
            {
                $_SESSION['success'] = "Annonce ajouté avec succès!";
                if($_SESSION['admin_type']=="super"){
                    header('location: job.php');
                }else{
                    header('location: ../../index.php');
                }

                exit();
            }
        }
    }

    public function edit($id)
    {
        if ($_POST) {
            $stat = $this->model->update($id);
            if($stat) {
                $_SESSION['success'] = "Annonce modifié avec succès!";
                header('location: job.php');
            }
        } else {
            return $company = $this->model->getJobById($id);
        }
    }

    public function delete($id)
    {
        if ($id) {
            $status = $this->model->delete($id);
            if ($status) {
                $_SESSION['info'] = "Annonce supprimé avec succès!";
                header('location: job.php');
            } else {
                $_SESSION['failure'] = "Suppression de l'annonce échoué";
                header('location: job.php');
            }
        }
    }
}