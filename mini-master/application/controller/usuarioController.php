<?php
    //crear la clase para heredar del controlador
    class usuarioController extends Controller{
        //atributos normalmente suelen ser en este caso una variable para llamar los modelos

        private $modeloU;
        private $modeloR;

        //vamos a crear el constructor 
        public function __construct(){
            //instanciar los modelosnecesarios
            $this->modeloU = $this->loadModel("mdlUsuario");
            $this->modeloR = $this->loadModel("mdlRoles");
        }

        //vamos a crear un método para iniciar la sesión
        public function login(){
            //variable controlar los errores
            $error = false;
            //vamos a validar la comunicacion con el modelo usuario y el formulario
            if(isset($_POST['btnLogin'])){
                $this->modeloU->__SET('usuario',$_POST['txtUser']);
                $this->modeloU->__SET('clave',$_POST['txtPassword']);

                //lo anterior pasa a un arreglo vacío
                $_POST = [];

                //con variable vamos a llamar eñ método de modelo que nos permite validar los datos
                $validate = $this->modeloU->validateUser();

                //vamos a revisar esa válidacion
                if($validate == true){
                    $_SESSION['SESSION_START'] = true;
                    $error = false;

                    //vamos a configiurar super globales para los atributos de la sesión
                    $_SESSION['Nombres'] = $validate['Nombres'];
                    $_SESSION['idUsuario'] = $validate['idUsuario'];
                    $_SESSION['Apellidos'] = $validate['Apellidos'];
                    $_SESSION['Documento'] = $validate['Documento'];
                    $_SESSION['Usuario'] = $validate['Usuario'];
                    $_SESSION['Descripcion'] = $validate['Descripcion'];

                    //despues de la válidacion que me dirija a un admin
                    header("Location:" . URL . "usuarioController/main");
                }else{
                    $error = true;
                }
            }
            require APP . 'view/usuarios/login.php';
        }
        public function main(){
            require APP . 'view/_templates/header.php';
            require APP . 'view/usuarios/main.php';
            require APP . 'view/_templates/footer.php';
        }

        //metodo para cerrar sesión
        public function logOut(){
            //válidamos que hayan sesiones iniciadas
            if(isset($_SESSION['SESSION_START'])){
                session_destroy();
            }
            header("Location: " .URL. "home/index");
            exit();
        }

        //método para llmaar al formulario de registro de usuario
        public function userRegister(){
            //con un condicional para el formulario y modelo
            if(isset($_POST['btnRegister'])){
                //comunicacion modelo y formulario
                $this->modeloU-> __SET('idTipoDocumento', $_POST['selDocType']);
                $this->modeloU-> __SET('documento', $_POST['txtDocument']);
                $this->modeloU-> __SET('nombre', $_POST['txtNames']);
                $this->modeloU-> __SET('apellidos', $_POST['txtLastname']);
                $this->modeloU-> __SET('fechaNacimiento', $_POST['txtBirthdate']);
                $this->modeloU-> __SET('telefono', $_POST['txtPhone']);
                $this->modeloU-> __SET('direccion', $_POST['txtAdress']);
                $this->modeloU-> __SET('email', $_POST['txtEmail']);
                $this->modeloU-> __SET('genero', $_POST['selGender']);

                //vamos a crear una variable que llamar al método del modelo para poder fregistrar los datos
                $person = $this->modeloU->registerPerson();

                //vamos a válidar que registre a partir del de la última persona registrada
                if($person == true){
                    $ultimoId= $this->modeloU->lastIdPerson();

                    //foreach que se encargue de tomar los datos explicitos
                    foreach($ultimoId as $value){
                        $ultimoIdValue = $value['lastIdPerson'];
                    }
                }

                //aquí vamos enviar los datos para el registro del usuario izquierda son los atributos del modelo, derecha son los name del formulario
                $this->modeloU->__SET('idPersona', $ultimoIdValue);
                $this->modeloU->__SET('usuario', $_POST['txtUser']);
                $this->modeloU->__SET('clave', $_POST['txtPassword']);
                $this->modeloU->__SET('idRol', $_POST['selRol']);

                //vamos a crear una variable que llamará a el método del modelo para poder registrar los datos
                $user = $this->modeloU->userRegister();

                //sweetalert
                // if($person == true && $user == true){
                //     $_SESSION['alert'] = "Swal.fire({
                //         position:'',
                //         icon: 'success',
                //         title: 'Done',
                //         showConfirmButton: false,
                //         timer: 1500})";
                //         header("Location: " .URL. "usuarioController/getUsers");
                //         exit();
                // }else{
                //     $_SESSION['alert'] = "Swal.fire({
                //         position:'',
                //         icon: 'error',
                //         title: 'error',
                //         showConfirmButton: false,
                //         timer: 1500})";

                //         header("Location: " .URL. "usuarioController/userRegister");
                //         exit();
                // }  
            }
            //vamos a crear variables para hacer los llamados a lo métodos de los diversos modelos
            $documentType = $this->modeloU->getTypeDocument();
            $roles = $this->modeloR->getRoles();
            require APP . 'view/_templates/header.php';
            require APP . 'view/usuarios/userRegister.php';
            require APP . 'view/_templates/footer.php';
        }

        //método para ver los usuarios registrados y modificarlos
        public function getUsers(){
            if(isset($_POST['btnUpdate'])){
                //comunicamos modelo y formulario
                $this->modeloU__SET('idUsuario',$_POST['txtIdUser']);
                $this->modeloU__SET('documento',$_POST['txtDocument']);
                $this->modeloU__SET('nombres',$_POST['txtFirtsName']);
                $this->modeloU__SET('apellidos',$_POST['txtLastName']);
                $this->modeloU__SET('telefono',$_POST['txtPhone']);
                $this->modeloU__SET('direccion',$_POST['txtAdress']);
                $this->modeloU__SET('email',$_POST['txtEmail']);
                $this->modeloU__SET('usuario',$_POST['txtUser']);
                $this->modeloU__SET('clave',$_POST['txtPassword']);

                //variable para actualizar
                $update = $this->modeloU->updateUser();

                //sweetalert
                if($update == true){
                    $_SESSION['alert'] = "Swal.fire({
                        position:'',
                        icon: 'success',
                        title: 'Done',
                        showConfirmButton: false,
                        timer: 1500})";
                        header("Location: " .URL. "usuarioController/getUsers");
                        exit();
                }else{
                    $_SESSION['alert'] = "Swal.fire({
                        position:'',
                        icon: 'error',
                        title: 'error',
                        showConfirmButton: false,
                        timer: 1500})";

                        header("Location: " .URL. "usuarioController/getUser");
                        exit();
                }  
            }
            
            //variables para llamar los métodos de los modelos
            $users = $this->modeloU->getUsers();
            $roles = $this->modeloR->getRoles();
            $documentType = $this->modeloU->getTypeDocument();
            require APP . 'view/_templates/header.php';
            require APP . 'view/usuarios/getUsers.php';
            require APP . 'view/_templates/footer.php';
        }

        //método para tarer el ID
        public function userId(){
            //crear una variable para controloar el dato
            $dataUser = $this->modeloU->userId($_POST['id']);
            echo json_encode($dataUser);
        }

        //método para cambiar el estado
        public function changeStatus(){
            //crear una variable para controloar el dato
            $dateUser = $this->modeloU->changeStatus($_POST['id']);
            echo 1;
        }

        //método para eliminar el usuario
        public function deleteUser(){
            //crear una variable para controloar el dato
            $dateUser = $this->modeloU->deleteUser($_POST['id']);
            echo 1;
        }
        
    }
?>