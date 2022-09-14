<?php 
  class Post {

    private $conn;
    private $table = 'users';


    public $id;
    public $name;
    public $username;
    public $email;
    public $password;
    

    public function __construct($db) {
      $this->conn = $db;
    }

    public function create() {

          $query = 'INSERT INTO ' . $this->table . ' SET name = :name, username = :username, email = :email, password = :password';


          $stmt = $this->conn->prepare($query);

          $this->name = htmlspecialchars(strip_tags($this->name));
          $this->username = htmlspecialchars(strip_tags($this->username));
          $this->email = htmlspecialchars(strip_tags($this->email));
          $this->password = htmlspecialchars(strip_tags($this->password));
          

  
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':username', $this->username);
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':password', $this->password);
          
         


          if($stmt->execute()) {
            return true;
      }

 
      printf("Error: %s.\n", $stmt->error);

      return false;
    }


   
     public function login() {
 
      $query = 'SELECT * FROM ' . $this->table . ' WHERE username = :username AND password = :password';

      $stmt = $this->conn->prepare($query);

    
      $this->username = htmlspecialchars(strip_tags($this->username));
      $this->password = htmlspecialchars(strip_tags($this->password));
      

 
      $stmt->bindParam(':username', $this->username);
      $stmt->bindParam(':password', $this->password);
      


     $stmt->execute();

     return $stmt;

      
}
    
  }