<?php 
class Recruiter{
    protected $model = '';

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index($page)
    {
        return $recruiter = $this->model->getAllRecruiter($page);
        //require 'view/user/list.php';
    }

    public function all_user()
    {
        return $recruiter = $this->model->getAllUser();
        //require 'view/user/list.php';
    }

    public function create()
    {
        if ($_POST) {
            $last_id = $this->model->insert();
            if($last_id)
            {
                $_SESSION['success'] = "Recruteur ajouté avec succès!";
                header('location: recruiter.php');
                exit();
            }
        }
    }

    public function edit($id)
    {
        if ($_POST) {
            $stat = $this->model->update($id);
            if($stat) {
                $_SESSION['success'] = "Recruteur modifié avec succès!";
                header('location: recruiter.php');
            }
        } else {
            return $recruiter = $this->model->getRecruiterById($id);
        }
    }

    public function delete($id)
    {
        if ($id) {
            $status = $this->model->delete($id);
            if ($status) {
                $_SESSION['info'] = "Recruteur supprimé avec succès!";
                header('location: recruiter.php');
            } else {
                $_SESSION['failure'] = "Suppression du recruteur échoué";
                header('location: recruiter.php');
            }
        }
    }
}