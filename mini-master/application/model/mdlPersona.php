<?php
//vamos a crear la clase de este modelo, por lo general se le da como nombre el mismo nombre del archivo

class mdlPersona{
    //vamos a agregar los atributos de esta clase
    public $idPersona;
    public $documento;
    public $idTipoDocumento;
    public $nombre;
    public $apellidos;
    public $telefono;
    public $direccion;
    public $email;
    public $fechaNacimiento;
    public $genero;
    public $db;

    //crear el método para fijar los datos
    public function __SET($atributo,$valor){
        $this->$atributo = $valor;
    }

    //método para reclamar los datos cuando sean necesarios
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

    //crear el método para registrar las personas
    public function registerPerson(){
        //vamos a crear una variable que guardará la consulta
        $sql = "INSERT INTO personas(Documento, Nombres, Apellidos, Email, Telefono, Direccion, Genero, FechaNacimiento, idTipoDocumento) VALUES (?,?,?,?,?,?,?,?,?)";

        //vamos a crear una variable para mantener simpre la consulta y poder enviarla o ejecutarla cada que sea llamada
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->documento);
        $stm->bindParam(2, $this->nombre);
        $stm->bindParam(3, $this->apellidos);
        $stm->bindParam(4, $this->email);
        $stm->bindParam(5, $this->telefono);
        $stm->bindParam(6, $this->direccion);
        $stm->bindParam(7, $this->genero);
        $stm->bindParam(8, $this->fechaNacimiento);
        $stm->bindParam(9, $this->idTipoDocumento);

        //respuesta
        $resultado = $stm->execute();
        return $resultado;
    }

    //metodo para retornar el id de la ultima persona registrada
    public function lastIdPerson(){
        $sql = "SELECT MAX(idPersona) AS lastIdPerson FROM personas";
        $query = $this->db->prepare($sql);
        $query->execute();
        //respuesta
        $lastId = $query->fetchAll(PDO::FETCH_ASSOC);
        return $lastId;
    }

    //método que nos va a permitir ver el listado de los documentos
    public function getTypeDocument(){
        //consulta
        $sql = "SELECT idTipoDocumento, Descripcion AS doc FROM tiposdocumentos";
        $query = $this->db->prepare($sql);
        $query->execute();
        $doc = $query->fetchAll(PDO::FETCH_ASSOC);
        return $doc;
    }

}

?>