<?php
//crear la clase
class mdlRoles{
     //crear el método para fijar los datos
     public function __SET($atributo,$valor){
        $this->$atributo = $valor;
    }

    //metodo para reclamar los datos cuando sea necesarios
    public function __GET($atributo){
        return $this->$atributo;
    }

    //crear la coneccion a la base de datos
    public function __construct($db){
        //intetar conectar
        try{
            $this->db = $db;
        }catch(PDOException $e){
            exit("Error al conectar a la base de datos");
        }
    }

    //método para traer los datos de lo Roles
    public function getRoles(){
        //crear consulta
        $sql = "SELECT * FROM roles ORDER BY descripcion ASC";
        $stm = $this->db->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>