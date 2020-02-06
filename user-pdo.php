<?php   

    class userpdo
    {
        private $id = "";
        public $login = "";
        public $email = "";
        public $firstname = "";
        public $lastname = "";

        public function register($login, $password, $email, $firstname, $lastname)
        {
            $bdd = $bdd = new PDO('mysql:host=localhost;dbname=utilisateur;charset=utf8', 'root', '');
            $query = $bdd->query("SELECT *FROM utilisateurs WHERE login='$login'");
            $row = $query->rowCount();

            if($row == 0)
            {
                $mdp = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
                $queryy = $bdd->query("INSERT INTO utilisateurs VALUES(NULL, '$login', '$mdp', '$email','$firstname','$lastname')");
                return array($login, $password, $email, $firstname, $lastname);
            }

            else
            {
                return "Login déjà existant";
            }
        }

        public function connect($login,$password)
        {
            $bdd = new PDO('mysql:host=localhost;dbname=utilisateur', "root", "");
            $query = $bdd->query("SELECT * from utilisateurs WHERE login='$login'");
            $result = $query->fetch();

            if(password_verify($password,$result['password']))
            {
                $this->id = $result['id'];
                $this->login = $login;
                $this->email = $result['email'];
                $this->firstname = $result['firstname'];
                $this->lastname = $result['lastname'];

                $_SESSION['login']=$login;
                $_SESSION['password']=$password;
                return $_SESSION['login']. " vous êtes bien connecté <br>";
    
            }
            else
                return "Login ou mot de passe incorrect";	

        }

        public function disconnect()
        {
            session_destroy();
            session_unset();
            return("Vous êtes bien déconnecté !");
        }

        public function delete()
        {
            $bdd = new PDO('mysql:host=localhost;dbname=utilisateur', "root", "");
            $query = $bdd->query("DELETE * FROM utilisateurs Where login = '$login'");
            session_destroy();
            session_unset();
            return 'Les données supprimés';
        }

        public function update($login,$email,$firstname,$lastname)
        {
            if(isset($_SESSION['login']))
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=utilisateur', "root", "");
                    $log = $_SESSION['login'];
                    $query = $bdd->query("UPDATE utilisateurs SET login='$login',email='$email', firstname='$firstname', lastname='$lastname' WHERE login='$log'");
                    return "Données mises à jour";
                }
        }
        
        public function isConnected()
        {

            if(isset($_SESSION['login']))
            {
                return $bool= true;
                return "Vous êtes bien connecté";
            }  
            else
            {
                $bool = false;
                return "Vous n'êtes pas connecté";
            }
        }

        public function delete() {

        session_start();
        $bdd = new PDO('mysql:host=localhost;dbname=utilisateur', 'root', '');
        $query= "DELETE FROM utilisateurs WHERE login = '$login'";
        $prepare = $bdd->prepare($query);
        $prepare->execute();
        session_destroy();
        }
    }


    public function update($login, $password, $email, $firstname, $lastname) {

        $bdd = new PDO('mysql:host=localhost;dbname=utilisateur', 'root', '');
        $query = "UPDATE utilisateurs SET login='".$login."' ,  password='".$password."' , email ='".$email."' , firstname ='".$firstname."', lastname='".$lastname."' WHERE login = '".$this->login."'";
        $prepare = $bdd->prepare($query);
        $prepare->execute();
        }
    }

    public function getAllInfos() {
            $bdd = new PDO('mysql:host=localhost;dbname=utilisateur', 'root', '');
            $query = "SELECT * FROM utilisateur";
            $prepare = $pdo->prepare($query);
            $prepare->execute();
            $resultat = $prepare->fetchAll(); 
            return($resultat);
    }

    public function getLogin()
    {
            $bdd = new PDO('mysql:host=localhost;dbname=utilisateur', 'root', '');
            $query = "SELECT * FROM utilisateurs WHERE login = '".$this->login."'";
            $prepare = $bdd->prepare($queryGetInfosConnected);
            $prepare->execute();
            $resultat = $prepare->fetchAll();
            return($resultat[0][1]);
    }
    public function getEmail()
    {
            $bdd = new PDO('mysql:host=localhost;dbname=utilisateur', 'root', '');
            $query = "SELECT * FROM utilisateurs WHERE login = '".$this->login."'";
            $prepare = $bdd->prepare($queryGetInfosConnected);
            $prepare->execute();
            $resultat = $prepare->fetchAll();
            return($resultat[0][2]);
    }
    public function getFirstname()
    {
            $bdd = new PDO('mysql:host=localhost;dbname=utilisateur', 'root', '');
            $query = "SELECT * FROM utilisateurs WHERE login = '".$this->login."'";
            $prepare = $bdd->prepare($queryGetInfosConnected);
            $prepare->execute();
            $resultat = $prepare->fetchAll();
            return($resultat[0][3]);
    }
    public function getLastname()
    {
            $bdd = new PDO('mysql:host=localhost;dbname=utilisateur', 'root', '');
            $query = "SELECT * FROM utilisateurs WHERE login = '".$this->login."'";
            $prepare = $bdd->prepare($queryGetInfosConnected);
            $prepare->execute();
            $resultat = $prepare->fetchAll();
            return($resultat[0][4]);
    }



    public function refresh()
    {

        $bdd = new PDO('mysql:host=localhost;dbname=utilisateur', 'root', '');
        $query = "SELECT * FROM utilisateurs";
        $prepare = $bdd->prepare($query);
        $prepare->execute();
        $resultat = $prepare->fetchAll();

        $login->$resultat[0]['login'];
        $email->$resultat[0]['email'];
        $firstname->$resultat[0]['firstname'];
        $lastname->$resultat[0]['lastname'];

    }
}



?>