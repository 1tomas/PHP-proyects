<?php
class homeProductsModel{

    private $db;

    function __construct(){
        $this->db =  new PDO('mysql:host=localhost;'.'dbname=bruma; charset=utf8' , 'root', '');
    }
    function getProduct(){
        $query = $this->db->prepare( 'SELECT a.*, b.* FROM producto a INNER JOIN vendedor b ON a.id_vendedor_fk = b.id_vendedor;');

        $query->execute();
        
        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }
    function insertProduct($vendedor, $tipo, $descripcion, $precio){

        $query = $this->db->prepare( 'INSERT INTO producto(id_vendedor_fk, tipo, descripcion, precio) VALUES (?,?,?,?)');

        $query->execute([$vendedor, $tipo, $descripcion, $precio]);

    }
    function deleteProductFromDB($id){
        $query = $this->db->prepare("DELETE FROM producto WHERE id_producto=?");
        $query->execute([$id]);
    }

    function updateProductFromDB($tipo ,$descripcion, $precio){
        $query = $this->db->prepare("UPDATE producto SET tipo=?, descripcion=?, precio=? WHERE tipo=?");
        $query->execute([$tipo, $descripcion, $precio, $tipo]); 
    }

    function getProducts($id){
        $query = $this->db->prepare( "SELECT * FROM PRODUCTO WHERE id_producto=?");
        $query->execute([$id]); 
        $producto = $query->fetch(PDO::FETCH_OBJ);   
        return $producto ;
    }

}