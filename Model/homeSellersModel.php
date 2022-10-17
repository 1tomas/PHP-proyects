<?php
class sellersProductsModel{

    private $db;

    function __construct(){
        $this->db =  new PDO('mysql:host=localhost;'.'dbname=bruma; charset=utf8' , 'root', '');
    }
    function getSeller(){
        $query = $this->db->prepare( 'SELECT * FROM vendedor');

        $query->execute();
        
        $sellers = $query->fetchAll(PDO::FETCH_OBJ);

        return $sellers;
    }
    function insertSeller($vendedor, $nombre, $legajo){

        $query = $this->db->prepare( 'INSERT INTO vendedor(id_vendedor, nombre, legajo) VALUES (?,?,?)');

        $query->execute([$vendedor, $nombre, $legajo]);

    }
    function deleteSellerFromDB($id){
        $query = $this->db->prepare("DELETE FROM vendedor WHERE id_vendedor=?");
        $query->execute([$id]);
    }

 

    function getSellers($id){
        $query = $this->db->prepare( "SELECT * FROM vendedor WHERE id_vendedor=?");
        $query->execute([$id]); 
        $seller = $query->fetch(PDO::FETCH_OBJ);   
        return $seller ;
    }

    function updateSellerFromDB($nombre,$legajo, $id){
        $query = $this->db->prepare("UPDATE vendedor SET nombre=?, legajo=? WHERE id_vendedor=?");
        $query->execute([$nombre, $legajo, $id]); 
    }
}
