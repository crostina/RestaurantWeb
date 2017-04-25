<?php
// import service
require_once("../services/Person.php");
// new service
$person = new Person($database);
//requete GET ALL et Get By ID
	if($method=='GET'){
		if(!isset($url_array[1])){ // if parameter not exist
			// METHOD : GET api/person
			$data=$person->getAll();
			$response['status'] = 200;
			$response['data'] = $data;
		}else{ // if parameter ID exist
			// METHOD : GET api/person/:ID
			$ID=$url_array[1];
			$data=$person->get($ID);
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
			$status = $person->insert($post->namaBarang, $post->kategori, $post->stok, $post->hargaBeli, $post->hargaJual);
			if($status==1){
				$response['status'] = 201;
				$response['data'] = array('success' => 'Data berhasil disimpan');
			}else{
				$response['status'] = 400;
				$response['data'] = array('error' => 'Terjadi kesalahan');
			}
		}
	}
	elseif($method=='PUT'){
		// METHOD : PUT api/person/:ID
		if(isset($url_array[1])){
			$ID = $url_array[1];
			// check if ID exist in database
			$data=$person->get($ID);
			if(empty($data)) { 
				$response['status'] = 404;
				$response['data'] = array('error' => 'Data tidak ditemukan');	
			}else{
				// get post from client
				$json = file_get_contents('php://input');
				$post = json_decode($json); // decode to object
				// check input completeness
				if($post->namaBarang=="" || $post->kategori=="" || $post->stok=="" || $post->hargaBeli=="" || $post->hargaJual==""){
					$response['status'] = 400;
					$response['data'] = array('error' => 'Data tidak lengkap');
				}else{
					$status = $person->update($idBarang, $post->namaBarang, $post->kategori, $post->stok, $post->hargaBeli, $post->hargaJual);
					if($status==1){
						$response['status'] = 200;
						$response['data'] = array('success' => 'Data berhasil diedit');
					}else{
						$response['status'] = 400;
						$response['data'] = array('error' => 'Terjadi kesalahan');
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
			$data=$person->get($ID);
			if(empty($data)) {
				$response['status'] = 404;
				$response['data'] = array('error' => 'Data tidak ditemukan');	
			}else{
				$status = $person->delete($ID);
				if($status==1){
					$response['status'] = 200;
					$response['data'] = array('success' => 'Data berhasil dihapus');
				}else{
					$response['status'] = 400;
					$response['data'] = array('error' => 'Terjadi kesalahan');
				}
			}
		}
	}
?>