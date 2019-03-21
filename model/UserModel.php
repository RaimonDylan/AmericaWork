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
}