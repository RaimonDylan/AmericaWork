<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 15/03/2019
 * Time: 08:55
 */

//NE PAS OUBLIER LES CLEFS ETRANGERES
//RENOMER LES TABLES ASSOCIATIVES

class User extends Mysql
{
    private $id_user;
    private $login;
    private $password;
    private $dt_ins;
    private $surname;
    private $name;
    private $tel;
    private $mail;
    private $addr;
    private $city;
    private $pc;

    function __construct($id_user,$login, $password, $dt_ins, $surname,$name, $tel, $mail, $addr, $city, $pc)
    {
        $this->id_user = $id_user;
        $this->login =  $login;
        $this->setPassword($password);
        $this->dt_ins = $dt_ins;
        $this->surname = $surname;
        $this->name = $name;
        $this->setTel($tel);
        $this->setMail($mail);
        $this->addr = $addr;
        $this->city = $city;
        $this->setPc($pc);
    }

    function insert()
    {
        $variable = $this->base->prepare("INSERT INTO user (login,password,dt_ins,surname,name,tel,mail,addr,city,pc) VALUES (:login, :password, :dt_ins, :surname, :name, :tel, :mail, :addr, :city, :pc)");
        $variable->execute(array("login" => $this->login, "password" => $this->password, "dt_ins" => $this->dt_ins, "surname" => $this->surname, "name" => $this->name, "tel" => $this->tel, "mail" => $this->mail, "addr" => $this->addr, "city" => $this->city, "pc" => $this->pc));
    }

    function update()
    {
        $variable = $this->base->prepare("UPDATE user SET login = :login, password = :password, dt_ins = :dt_ins, surname = :surname, name = :name, tel = :tel, mail = :mail, addr = :addr, city = :city, pc = :pc WHERE id_user = :id_user");
        $variable->execute(array("login" => $this->login, "password" => $this->password, "dt_ins" => $this->dt_ins, "surname" => $this->surname, "name" => $this->name, "tel" => $this->tel, "mail" => $this->mail, "addr" => $this->addr, "city" => $this->city, "pc" => $this->pc, "id_user" => $this->id_user));
    }

    function show()
    {
        echo "<tr>
                <td>$this->login</td>
                <td>$this->dt_ins</td>
                <td>$this->surname</td>
                <td>$this->name</td>
                <td>$this->tel</td>
                <td>$this->mail</td>
                <td>
                    <i data-id = '$this->id_user' class='fa fa-edit update' style='cursor: pointer;margin-right:3%;'></i>
                    <i data-id = '$this->id_user' class='fa fa-trash-alt delete' style='cursor: pointer;margin-left:3%;'></i>
                </td>
              </tr>";
    }

    function delete()
    {
        $variable = $this->base->prepare("DELETE FROM user WHERE id_user = :id_user");
        $variable->execute(array('id_user'=> $this->id_user));
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
        /*
        $uppercase = preg_match('@[A-Z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $letter = preg_match('@[a-z]@', $password);
        if($uppercase && $number && $letter)
        {
            $this->password = $password;
        }
        */
    }

    /**
     * @return mixed
     */
    public function getDtIns()
    {
        return $this->dt_ins;
    }

    /**
     * @param mixed $dt_ins
     */
    public function setDtIns($dt_ins)
    {
        $this->dt_ins = $dt_ins;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $number = preg_match('@[0-9]@', $tel);

        if ($number && strlen($tel) == 10)
        {
            $this->tel = $tel;
        }
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

        if(preg_match($pattern,$mail) === 1){
            $this->mail = $mail;
        }
    }

    /**
     * @return mixed
     */
    public function getAddr()
    {
        return $this->addr;
    }

    /**
     * @param mixed $addr
     */
    public function setAddr($addr)
    {
        $this->addr = $addr;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getPc()
    {
        return $this->pc;
    }

    /**
     * @param mixed $pc
     */
    public function setPc($pc)
    {
        $number = preg_match('@[0-9]@', $pc);
        if($number && strlen($pc) == 5)
        {
            $this->pc = $pc;
        }
    }
}