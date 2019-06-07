<?php 
class User{
    protected $model = '';

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index($page)
    {
        return $users = $this->model->getAllUser($page);
        //require 'view/user/list.php';
    }

    public function create()
    {
        if ($_POST) {
            $last_id = $this->model->insert();
            if($last_id)
            {
                $_SESSION['success'] = "Utilisateur ajouté avec succès!";
                header('location: user.php');
                exit();
            }
        }
    }
    public function createNew()
    {
        if ($_POST) {
            $last_id = $this->model->insertNew();
            if($last_id)
            {
                $_SESSION['signup_success'] = "Utilisateur ajouté avec succès!";
                header('location: ../../login.php');
                exit();
            }else{
                $_SESSION['fail'] = "Echec de la création de l'utilisateur";
                header('location: ../../signup.php');
            }
        }
    }

    public function edit($id)
    {
        if ($_POST) {
            $stat = $this->model->update($id);
            if($stat) {
                $_SESSION['success'] = "Utilisateur modifié avec succès!";
                header('location: user.php');
            }
        } else {
            return $user = $this->model->getUserById($id);
        }
    }

    public function delete($id)
    {
        if ($id) {
            $status = $this->model->delete($id);
            if ($status) {
                $_SESSION['info'] = "Utilisateur supprimé avec succès!";
                header('location: user.php');
            } else {
                $_SESSION['failure'] = "Suppression de l'utilisateur échoué";
                header('location: user.php');
            }
        }
    }

    public function reinit($username, $mdp){
        $this->model->reinit($username, $mdp);
    }
}