<?php 
class Skill{
    protected $model = '';

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index($page)
    {
        return $users = $this->model->getAllSkill($page);
        //require 'view/user/list.php';
    }

    public function create()
    {
        if ($_POST) {
            $last_id = $this->model->insert();
            if($last_id)
            {
                $_SESSION['success'] = "Compétences ajouté avec succès!";
                header('location: skill.php');
                exit();
            }
        }
    }

    public function edit($id)
    {
        if ($_POST) {
            $stat = $this->model->update($id);
            if($stat) {
                $_SESSION['success'] = "Compétences modifié avec succès!";
                header('location: skill.php');
            }
        } else {
            return $skill = $this->model->getSkillById($id);
        }
    }

    public function delete($id)
    {
        if ($id) {
            $status = $this->model->delete($id);
            if ($status) {
                $_SESSION['info'] = "Compétences supprimé avec succès!";
                header('location: skill.php');
            } else {
                $_SESSION['failure'] = "Suppression des compétences échoué";
                header('location: skill.php');
            }
        }
    }
}