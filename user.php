<?php  

class user
	{
		private $id = "";
		public $email = "";
		public $login = "";
		public $firstname = "";
		public $lastname = "";

		public function register($login, $email, $firstname, $lastname){

        $connexion = mysqli_connect("localhost", "root", "", "utilisateur");

        $query = "INSERT INTO utilisateur( login, password, email, firstname, lastname) VALUES ('" . $login . "','" . $password . "','" . $email . "','". $firstname . "','" . $lastname . "')";

        $result =  mysqli_query($connexion, $query);

        $this->login = $resultat['login'];
        $this->email = $resultat['email'];
        $this->firstname = $resultat['firstname'];
        $this->lastname = $resultat['lastname'];
		}

		public function connect($login, $mdp){

			$bdd = mysqli_connect("localhost","root","","utilisateur");
			$request = "SELECT * FROM utilisateur WHERE login = '".$login."' ";
			$query = mysqli_query($bdd, $request);
			$resultat = mysqli_fetch_assoc($query);
			$this->login = $resultat['login'];
            $this->email = $resultat['email'];
            $this->firstname = $resultat['firstname'];
            $this->lastname = $resultat['lastname'];
		}

        public function disconnect()
        {
        	session_start();
			session_destroy();
			session_unset();
        }
        public function delete()
        {
			$bdd = mysqli_connect("localhost","root","","utilisateur");
			$query = "DELETE FROM utilisateur WHERE $login = '".$login."' ";

			if (mysqli_query($bdd, $query)) {
			    echo "La base de donnée a bien été supprimé";
			} else {
			    echo "La base de donnée n'a pas bien été supprimé: " . mysqli_error($bdd);
			}

			mysqli_close($bdd);
        }

        public function update($login, $email, $firstname, $lastname)
        {
			$login = $_POST['login'];
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
        	$login = $_SESSION['login'];
			$bdd = mysqli_connect("localhost","root","","utilisateur");
			$query = "UPDATE utilisateur(login, email, firstname, lastname) SET login = '".$login ."', email = '". $email ."', firstname = '". $firstname ."', lastname = '" . $lastname ."' WHERE login = '". $login ."' ";

			if (mysqli_query($bdd, $query)) {
			    echo "La base de donnée a bien été mis à jour";
			} 
			else {
			    echo "La base de donnée n'a pas été mis à jour: " . mysqli_error($bdd);
			}

			mysqli_close($bdd);
        }

        public function isConnected()
        {
        	if (isset($_session['login'])) {
        		$bool = true;
        	}
        	else{
        		$bool = false;
        	}
        	return $bool;

        }

        public function getAllInfos()
        {
        	if (isset($_session['login'])) {

        	return ($this);

        	}
        	else
        	{
        		echo "Vous n'êtes pas connecté(e).";
        	}
        }

        public function getLogin()
        {
        	if (isset($_session['login'])) {

        	return ($this->login);
        	}
        	
        }

        public function getEmail()
        {
        	if (isset($_session['login'])) {
			return ($this->email);
        	}
        }

        public function getFirstname()
        {
        	if (isset($_session['login'])) {

			return ($this->firstname);
			}
        }

        public function getLastname()
        {
        	if (isset($_session['login'])) {

			return ($this->lastname);
			}
        }

        public function refresh()
        {
            $bdd = mysqli_connect("localhost","root","","utilisateur");
			$request = "SELECT * FROM utilisateur WHERE login = '".$login."' ";
			$query = mysqli_query($bdd, $request);
			$resultat = mysqli_fetch_all($query);
			$this->login = $resultat['login'];
            $this->email = $resultat['email'];
            $this->firstname = $resultat['firstname'];
            $this->lastname = $resultat['lastname'];
        }


	$chloe = new user();
	echo $chloe;

?>