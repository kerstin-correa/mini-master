<?php
//heredar del modelo principal para nuestro caso mdlPersona YAMINSON SAPO METIDO
require_once("mdlPersona.php");

//heredamos la clase
class mdlUsuario extends mdlPersona{
    //creamos los atributos
    private $idUsuario;
    private $usuario;
    private $clave;
    private $idRol;
    private $estado;

    //crear el método para fijar los datos
    public function __SET($atributo,$valor){
        $this->$atributo = $valor;
    }

    //metodo para reclamar los datos cuando sea necesarios
    public function __GET($atributo){
        return $this->$atributo;
    }

    //método para válidar el usuario
    public function validateUser(){
        //crear la variable de consulta
        $sql = "SELECT P.Documento, P.Nombres, P.Apellidos, U.idUsuario, U.Usuario, R.Descripcion FROM personas AS P INNER JOIN tiposdocumentos AS TD ON P.idTipoDocumento = TD.idTipoDocumento INNER JOIN usuarios AS U ON P.idPersona = U.idPersona INNER JOIN roles AS R ON U.idRol = R.idRol WHERE U.Usuario = ? AND U.Clave = ? AND U.Estado = 1";

        //vamos a crear una variable que controlará todo el resultado
        $stm = $this->db->prepare($sql);
        $stm -> bindParam(1, $this->usuario);
        $stm -> bindParam(2, $this->clave);

        $stm->execute();

        //crear una variable para la respuesta de los datos
        $user = $stm->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    //método para registrar los usuarios
    public function userRegister(){
        //crear la consulta
        $sql = "INSERT INTO usuarios(idPersona, usuario, Clave, idRol, Estado) VALUES (?,?,?,?,?)";

        //vamos a crear una variable para mandar el estado activo por defecto
        $estado = 1;

        //vamos a enviar los párametros a la base de datos
        $stm = $this->db->prepare($sql);

        $stm->bindParam(1, $this->idPersona);
        $stm->bindParam(2, $this->usuario);
        $stm->bindParam(3, $this->clave);
        $stm->bindParam(4, $this->idRol);
        $stm->bindParam(5, $estado);

        //respuesta
        $result = $stm->execute();
        return $result;
    }

    //metodo para obtener los datos de usuario
    public function getUsers(){
        //consulta
        $sql = "SELECT P.*, U.idUsuario, U.Usuario, U.Estado, R.Descripcion AS rol, TD.Descripcion AS tipoDoc FROM personas AS P INNER JOIN usuarios AS U ON P.idPersona = U.idPersona INNER JOIN roles AS R ON R.idRol = U.idRol INNER JOIN tiposdocumentos AS TD ON P.idTipoDocumento = TD.idTipoDocumento";

        //vamos a preparar la conulta y ejecutar
        $stm = $this->db->prepare($sql);
        $stm->execute();
        //vamos a crear la variable para retornar los datos
        $user = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }

    //método para filtrar, tomar, reclamar el id de los usuarios
    public function userId($id){
        //consulta
        $sql = "SELECT P.*, U.*,R.idRol, R.Descripcion AS rol, TD.Descripcion AS tipoDoc FROM personas AS P INNER JOIN usuarios AS U ON P.idPersona = U.idPersona INNER JOIN roles AS R ON R.idRol INNER JOIN tiposdocumentos AS TD ON P.idTipoDocumento = TD.idTipoDocumento WHERE U.idUsuario = ?";

        //preparacion y ejecucion de la consulta
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    //método para cambiar estado
    public function changeStatus($id){
        //consulta
        $sql = "UPDATE usuarios SET Estado = (CASE WHEN Estado = 1 THEN 0 ELSE 1 END) WHERE idUsuario = ?";

        $query = $this->db->prepare($sql);
        $query -> bindParam(1, $id);
        return $query ->execute();
    }
    //método para cambiar estado
    public function deleteUser($id){
        //consulta
        $sql = "DELETE U, P FROM usuarios AS U INNER JOIN personas AS P WHERE P.idPersona = U.idPersona AND U.idUsuario = ?;
        ALTER TABLE usuarios AUTO_INCREMENT = 1;
        ALTER TABLE personas AUTO_INCREMENT = 1";

        $query = $this->db->prepare($sql);
        $query -> bindParam(1, $id);
        return $query ->execute();
    } 

    //método para actualizar
    public function update(){
        //consulta
        $sql = "UPDATE personas AS P INNER JOIN usuarios AS U ON P.idPersona = U.idPersona SET P.idTipoDocumento = ?,P.Documento = ?, P.Nombres = ?, P.Apellidos = ?, P.Telefono = ?, P.Direccion = ?, P.Email = ?, U.Usuario = ?, U.Clave = ? WHERE U.idUsuario = ?";

        //preparar y enviar la consulta
        $stm = $this->db->prepare($sql);
        $stm->bindParam(1, $this->idTipoDocumento);
        $stm->bindParam(2, $this->documento);
        $stm->bindParam(3, $this->nombre);
        $stm->bindParam(4, $this->apellidos);
        $stm->bindParam(5, $this->telefono);
        $stm->bindParam(6, $this->direccion);
        $stm->bindParam(7, $this->email);
        $stm->bindParam(8, $this->usuario);
        $stm->bindParam(9, $this->clave);
        $stm->bindParam(10, $this->idUsuario);

        //respuesta
        $result = $stm->execute();
        return $result;
    }
}
?>