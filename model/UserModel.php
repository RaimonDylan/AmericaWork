<?php
/**
 * Created by PhpStorm.
 * User: raimon
 * Date: 17/03/2019
 * Time: 20:10
 */

class UserModel
{
    protected $db;

    public function __construct($database){
        $this->db = $database;
    }

    public function getAllUser($page){
        $users = $this->db->arraybuilder()->paginate("user", $page);
        return $users;
    }

    public function getUserById($id)
    {
        $this->db->where('id_user', $id);
        $user = $this->db->getOne("user");
        return $user;
    }

    public function insert(){
        $data_to_store = array_filter($_POST);
        $data_to_store['password'] = password_hash($data_to_store['password'],PASSWORD_DEFAULT);
        $last_id = $this->db->insert('user', $data_to_store);
        return $last_id;
    }

    public function insertNew(){
        $data_to_store = array_filter($_POST);
        $infoUser['login'] = $data_to_store['login'];
        $infoUser['password'] = password_hash($data_to_store['password'],PASSWORD_DEFAULT);
        $infoUser['l_name'] = $data_to_store['l_name'];
        $infoUser['f_name'] = $data_to_store['f_name'];
        $infoUser['phone'] = $data_to_store['phone'];
        $infoUser['email'] = $data_to_store['email'];
        $infoUser['address'] = $data_to_store['address'];
        $infoUser['city'] = $data_to_store['city'];
        $infoUser['pc'] = $data_to_store['pc'];
        $last_id = $this->db->insert('user', $infoUser);
        if(isset($data_to_store['siteweb'])){
            $infoStudent['id_user'] = $last_id;
            $infoStudent['siteweb'] = $data_to_store['siteweb'];
            $infoStudent['description'] = $data_to_store['description'];
            $infoStudent['twitter'] = $data_to_store['twitter'];
            $infoStudent['facebook'] = $data_to_store['facebook'];
            $infoStudent['hobbies'] = $data_to_store['hobbies'];
            $last_id = $this->db->insert('student', $infoStudent);
        }else{
            $infoRecruiter['id_user'] = $last_id;
            $last_id = $this->db->insert('recruiter', $infoRecruiter);
        }
        return $last_id;
    }

    public function update(){
        $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_STRING);
        $data_to_update = filter_input_array(INPUT_POST);
        $this->db->where('id_user',$user_id);
        $stat = $this->db->update('user', $data_to_update);
        return $stat;
    }

    public function delete(){
        $del_id = filter_input(INPUT_POST, 'del_id');
        $this->db->where('id_user', $del_id);
        $status = $this->db->delete('user');
        return $status;
    }

    public function reinit($username, $mdp){
        $pwd = password_hash($mdp,PASSWORD_DEFAULT);
        $jobs = $this->db->Query("UPDATE user SET password = '$pwd' WHERE login = '$username' ");
        return $jobs;
    }
}