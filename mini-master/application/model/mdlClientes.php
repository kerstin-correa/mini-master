<?php
//heredar del modelo principal para nuestro caso mdlPersona - Diego 
require_once("mdlClientes.php");
class mdlCliente extends mdlCliente{
        //creamos los atributos
        private $idCliente;
        private $tipoCliente;

        //crear el método para fijar los datos
    public function __SET($atributo,$valor){
        $this->$atributo = $valor;
    }

    //metodo para reclamar los datos cuando sea necesarios
    public function __GET($atributo){
        return $this->$atributo;
    }

    public function customerRegister(){
        //crear la consulta
        $sql = "INSERT INTO clientes(tipoCliente) VALUES (?,)";

        //vamos a enviar los párametros a la base de datos
        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $this->idCliente);
        $stm->bindParam(2, $this->tipoCliente);

        //respuesta
        $result = $stm->execute();
        return $result;
    
    }

    //metodo para obtener los datos del cliente
    public function getCustomer(){
        //consulta
        $sql = "SELECT P.*, U.idCliente, U.tipoCliente"

    }
}
?>