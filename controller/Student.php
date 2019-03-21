<?php 
class Student{
    protected $model = '';

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index($page)
    {
        return $student = $this->model->getAllStudent($page);
        //require 'view/user/list.php';
    }

    public function all_user()
    {
        return $student = $this->model->getAllUser();
        //require 'view/user/list.php';
    }

    public function create()
    {
        if ($_POST) {
            $last_id = $this->model->insert();
            if($last_id)
            {
                $_SESSION['success'] = "Utilisateur ajouté avec succès!";
                header('location: student.php');
                exit();
            }
        }
    }

    public function edit($id)
    {
        if ($_POST) {
            $stat = $this->model->update($id);
            if($stat) {
                $_SESSION['success'] = "Étudiant modifié avec succès!";
                header('location: student.php');
            }
        } else {
            return $student = $this->model->getStudentById($id);
        }
    }

    public function delete($id)
    {
        if ($id) {
            $status = $this->model->delete($id);
            if ($status) {
                $_SESSION['info'] = "Étudiant supprimé avec succès!";
                header('location: student.php');
            } else {
                $_SESSION['failure'] = "Suppression de l'étudiant échoué";
                header('location: student.php');
            }
        }
    }
}