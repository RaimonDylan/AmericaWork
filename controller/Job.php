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

    public function create()
    {
        if ($_POST) {
            $last_id = $this->model->insert();
            if($last_id)
            {
                $_SESSION['success'] = "Annonce ajouté avec succès!";
                header('location: job.php');
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