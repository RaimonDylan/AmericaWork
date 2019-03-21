<?php 
class Company{
    protected $model = '';

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index($page)
    {
        return $users = $this->model->getAllCompany($page);
        //require 'view/user/list.php';
    }

    public function create()
    {
        if ($_POST) {
            $last_id = $this->model->insert();
            if($last_id)
            {
                $_SESSION['success'] = "Entreprise ajouté avec succès!";
                header('location: company.php');
                exit();
            }
        }
    }

    public function edit($id)
    {
        if ($_POST) {
            $stat = $this->model->update($id);
            if($stat) {
                $_SESSION['success'] = "Utilisateur modifié avec succès!";
                header('location: company.php');
            }
        } else {
            return $company = $this->model->getCompanyById($id);
        }
    }

    public function delete($id)
    {
        if ($id) {
            $status = $this->model->delete($id);
            if ($status) {
                $_SESSION['info'] = "Entreprise supprimé avec succès!";
                header('location: company.php');
            } else {
                $_SESSION['failure'] = "Suppression de l'entreprise échoué";
                header('location: company.php');
            }
        }
    }
}