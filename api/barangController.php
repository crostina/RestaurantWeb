<?php
// import service
require_once("../services/barang.php");
// new service
$barang = new Barang($database);
//requete GET ALL et Get By ID
	if($method=='GET'){
		if(!isset($url_array[1])){ // if parameter not exist
			// METHOD : GET api/barang
			$data=$barang->getAll();
			$response['status'] = 200;
			$response['data'] = $data;
		}else{ // if parameter idBarang exist
			// METHOD : GET api/barang/:idBarang
			$idBarang=$url_array[1];
			$data=$barang->get($idBarang);
			if(empty($data)) {
				$response['status'] = 404;
				$response['data'] = array('error' => 'Barang tidak ditemukan');	
			}else{
				$response['status'] = 200;
				$response['data'] = $data;	
			}
		}
	}
	elseif($method=='POST'){
		// METHOD : POST api/barang
		// get post from client
		$json = file_get_contents('php://input');
		$post = json_decode($json); // decode to object
		// check input completeness
		if($post->namaBarang=="" || $post->kategori=="" || $post->stok=="" || $post->hargaBeli=="" || $post->hargaJual==""){
			$response['status'] = 400;
			$response['data'] = array('error' => 'Data tidak lengkap');
		}else{
			$status = $barang->insertBarang($post->namaBarang, $post->kategori, $post->stok, $post->hargaBeli, $post->hargaJual);
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
		// METHOD : PUT api/barang/:idBarang
		if(isset($url_array[1])){
			$idBarang = $url_array[1];
			// check if idBarang exist in database
			$data=$barang->get($idBarang);
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
					$status = $barang->updateBarang($idBarang, $post->namaBarang, $post->kategori, $post->stok, $post->hargaBeli, $post->hargaJual);
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
		// METHOD : DELETE api/barang/:idBarang
		if(isset($url_array[1])){
			$idBarang = $url_array[1];
			// check if idBarang exist in database
			$data=$barang->getBarang($idBarang);
			if(empty($data)) {
				$response['status'] = 404;
				$response['data'] = array('error' => 'Data tidak ditemukan');	
			}else{
				$status = $barang->delete($idBarang);
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