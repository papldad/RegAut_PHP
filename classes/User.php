<?php
class User
{
    private $id;
    private $login;
    private $password;
    private $email;
    private $name;

    public function __construct($login, $password, $email, $name)
    {
        require_once("../classes/Database.php");
        $database = new Database();

        $this->id = $database->get_new_id();
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->name = $name;
    }
    public function get_data()
    {
        return array(
            'id' => $this->id,
            'login' => $this->login,
            'password' => $this->password,
            'email' => $this->email,
            'name' => $this->name,
        );
    }
}
