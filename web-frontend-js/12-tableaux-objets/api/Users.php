<?php 

class Users 
{
    private string $file;
    private string $json;
    private array $users;

    public function __construct() 
    {
        $this->file = (dirname(__DIR__).'/data/users.json');
        $this->json = file_get_contents($this->json);
        $this->users = json_decode($this->json, true);;
    }

    public function find(string $login) {
        foreach($this->users as $u) {
            if($u[])
        }
    }
}