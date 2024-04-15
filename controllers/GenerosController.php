<?php

require_once './models/Generos.php';

class GenerosController {
    private $generoModel;

    public function __construct() {
        $this->generoModel = new Generos();
    }

    public function index() {
        $generos = $this->generoModel->obtenerGeneros();
        include './views/generos/index.php';
    }

    public function alta() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $this->generoModel->insertarGeneros($nombre);
        } else {
            include './views/generos/alta.php';
        }
    }

    public function editar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_genero = $_POST['id_genero'];
            $nombre = $_POST['nombre'];
            
            $this->generoModel->actualizarGenero($id_genero, $nombre);
        } else {
            $id_genero = $_GET['id_genero'];
            $genero = $this->generoModel->obtenerGeneroPorID($id_genero);
            include './views/generos/editar.php';
        }
    }

    public function eliminar(){
        $id_genero = $_GET['id_genero'];
        $this->generoModel->eliminarGenero($id_genero);
         
    }

}
?>