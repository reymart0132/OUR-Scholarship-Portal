<?php

class config{
    private $user = 'root';
    private $password = '';
    // private $user = 'ceumnlre_root';
    // private $password = 'Eg5c272klko5';
    public $pdo = null;

    public function con(){
        try {
            $this->pdo = new PDO('mysql:host=127.0.0.1;dbname=ceumnlre_ourscholar', $this->user, $this->password);
            // $this->pdo = new PDO('mysql:local=109.106.254.187;dbname=ceumnlre_ourscholar', $this->user, $this->password);
            } catch (PDOException $e) {
                die($e->getMessage());
        }
        return $this->pdo;

    }
}

 ?>
