<?php
// import service
require_once("../services/srvPerson.php");
require_once("../entities/Person.php");

// new service
$srvPerson = new SrvPerson($database);
//requete GET ALL et Get By ID
	if($method=='GET'){
		if(!isset($url_array[1]) || $url_array[1] == NULL ){ // if parameter not exist
			// METHOD : GET api/person
			$data=$srvPerson->getAll();
			$response['status'] = 200;
			$response['data'] = $data;
		}else{ // if parameter ID exist
			// METHOD : GET api/person/:ID
			$ID=$url_array[1];
			$data=$srvPerson->get($ID);
			if(empty($data)) {
				$response['status'] = 404;
				$response['data'] = array('error' => 'Introuvable');	
			}else{
				$response['status'] = 200;
				$response['data'] = $data;	
			}
		}
	}
	elseif($method=='POST'){
		// METHOD : POST api/person
		// get post from client
		$json = file_get_contents('php://input');
		$post = json_decode($json); // decode to object
		// check input completeness
		if($post->namaBarang=="" || $post->kategori=="" || $post->stok=="" || $post->hargaBeli=="" || $post->hargaJual==""){
			$response['status'] = 400;
			$response['data'] = array('error' => 'Champ obligatoire');
		}else{
			      
			$status = $srvPerson->insert($post->namaBarang, $post->kategori, $post->stok, $post->hargaBeli, $post->hargaJual);
			if($status==1){
				$response['status'] = 201;
				$response['data'] = array('success' => 'Données inserée avec success');
			}else{
				$response['status'] = 400;
				$response['data'] = array('error' => 'Erreur Serveur');
			}
		}
	}
	elseif($method=='PUT'){
		// METHOD : PUT api/person/:ID
		if(isset($url_array[1])){
			$ID = $url_array[1];
			// check if ID exist in database
			$data=$srvPerson->get($ID);
			if(empty($data)) { 
				$response['status'] = 404;
				$response['data'] = array('error' => 'Introuvable');	
			}else{
				// get post from client
				$json = file_get_contents('php://input');
				$post = json_decode($json); // decode to object
				// check input completeness
				if($post->namaBarang=="" || $post->kategori=="" || $post->stok=="" || $post->hargaBeli=="" || $post->hargaJual==""){
					$response['status'] = 400;
					$response['data'] = array('error' => 'Requete incorrect');
				}else{
					$status = $srvPerson->update($idBarang, $post->namaBarang, $post->kategori, $post->stok, $post->hargaBeli, $post->hargaJual);
					if($status==1){
						$response['status'] = 200;
						$response['data'] = array('success' => 'Données mise a jour avec success');
					}else{
						$response['status'] = 400;
						$response['data'] = array('error' => 'Erreur serveur');
					}
				}
			}
		}
	}
	elseif($method=='DELETE'){
		// METHOD : DELETE api/person/:ID
		if(isset($url_array[1])){
			$ID = $url_array[1];
			// check if ID exist in database
			$data=$srvPerson->get($ID);
			if(empty($data)) {
				$response['status'] = 404;
				$response['data'] = array('error' => 'Introuvable');	
			}else{
				$status = $srvPerson->delete($ID);
				if($status==1){
					$response['status'] = 200;
					$response['data'] = array('success' => 'Supprimée');
				}else{
					$response['status'] = 400;
					$response['data'] = array('error' => 'Erreur serveur');
				}
			}
		}
	}
?>