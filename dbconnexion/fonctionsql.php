<?php

	function getDatabaseConnexion() {
		try {
		    $user = "root";
			$pass = "";
			$pdo = new PDO('mysql:host=localhost;dbname=db_formulaire', $user, $pass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
			
		} catch (PDOException $e) {
		    echo "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}
	}
 
	
	// récupere tous les users
	function getAllUsers() {
		try{
			$con = getDatabaseConnexion();
			$requete = 'SELECT * from tb_formulaire';
			$rows = $con->query($requete);
			return $rows;
			$requete -> closeCursor();
		}
			catch(PDOException $e) {
	    	echo $requete . "<br>" . $e->getMessage();
	    }
	}
 
	// creer un user
	function createUser($pseudo, $age, $sexe, $mobile, $email) {
		try {
			$con = getDatabaseConnexion();
			$sql = "INSERT INTO tb_formulaire (pseudo, age, sexe, mobile, email) 
					VALUES ('$pseudo', '$age', '$sexe' ,'$mobile', '$email')";
	    	$con->query($sql);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}
 
	//recupere un user
	function readUser($id) {
		try{
			$con = getDatabaseConnexion();
			$requete = "SELECT * from tb_formulaire where id_formulaire = '$id' ";
			$stmt = $con->query($requete);
			$row = $stmt->fetchAll();
			if (!empty($row)) {
				return $row[0];
			}
		}

		catch(PDOException $e) {
	    	echo $requete . "<br>" . $e->getMessage();
	    }
	}
 
	//met à jour le user
	function updateUser($id, $pseudo, $age, $sexe, $mobile, $email) {
		try {
			$con = getDatabaseConnexion();
			$requete = "UPDATE tb_formulaire set 
						pseudo = '$pseudo',
						age = '$age',
						sexe = '$sexe',
						mobile = '$mobile',
						email = '$email'
						where id_formulaire = '$id' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $requete . "<br>" . $e->getMessage();
	    }
	}
 
	// supprime un user
	function deleteUser($id) {
		try {
			$con = getDatabaseConnexion();
			$requete = "DELETE from tb_formulaire where id_formulaire = '$id' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $requete . "<br>" . $e->getMessage();
	    }
	}

	// récupere tous les articles
	function getAllArticles() {
		try{
			$con = getDatabaseConnexion();
			$requete = 'SELECT id, title from tb_article order by id desc';
			$articles = $con->query($requete);
			return $articles;
			$requete -> closeCursor();
		}
			catch(PDOException $e) {
	    	echo $requete . "<br>" . $e->getMessage();
	    }
	}

	// récupere un article
	//function getArticle($id){
		//try{
		/*	$con = getDatabaseConnexion();
			$requete = "SELECT * from tb_article where id = '$id' ";
			$stmt = $con->query($id);
			$article = $stmt->rowCount();
			if ($article == 1) {
				$req = $requete->fetchAll();
			}else{
				header("Location:../index.php");
			}
		}

		catch(PDOException $e) {
	    	echo $requete . "<br>" . $e->getMessage();
	    }

	}*/
?>