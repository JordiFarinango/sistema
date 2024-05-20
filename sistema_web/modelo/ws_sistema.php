<?php
require_once("config.php");
class usuario
{
    public $id_usuario;
    public $nom_usuario;
    public $ape_usuario;
    public $ced_usuario;
    public $correo_usuario;
    public $dire_usuario;
    public $cel_usuario;
    public $ocupa_usuario;
    public $usu_usuario;
    public $clave_usuario;

    public function __construct()
        {
            $this->id_usuario = "";
            $this->nom_usuario = "";
            $this->ape_usuario = "";
            $this->ced_usuario = "";
            $this->correo_usuario = "";
            $this->dire_usuario = "";
            $this->cel_usuario = "";
            $this->ocupa_usuario = "";
            $this->usu_usuario = "";
            $this->clave_usuario = "";
        }


    public function insertarjurado($nom_usuario, $ape_usuario, $ced_usuario, $correo_usuario, $dire_usuario, $cel_usuario, $ocupa_usuario, $usu_usuario, $clave_usuario, $rol_id_re)
    {
        $conex = new DBConexion();
        $conex = $conex->Conectar();
        $sentencia=sprintf("INSERT INTO usuarios (nom_usuario, ape_usuario, ced_usuario, correo_usuario, dire_usuario, cel_usuario, ocupa_usuario, usu_usuario, clave_usuario, rol_id_re) values ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')"
        ,$conex->real_escape_string($nom_usuario),
        $conex->real_escape_string($ape_usuario),
        $conex->real_escape_string($ced_usuario),
        $conex->real_escape_string($correo_usuario),
        $conex->real_escape_string($dire_usuario),
        $conex->real_escape_string($cel_usuario),
        $conex->real_escape_string($ocupa_usuario),
        $conex->real_escape_string($usu_usuario),
        $conex->real_escape_string($clave_usuario),
        $conex->real_escape_string($rol_id_re));
    
        $result=mysqli_query($conex, $sentencia);
        return $result;
    }

    public function insertarnotario($nom_usuario, $ape_usuario, $ced_usuario, $correo_usuario, $dire_usuario, $cel_usuario, $ocupa_usuario, $usu_usuario, $clave_usuario, $rol_id_re)
    {
        $conex = new DBConexion();
        $conex = $conex->Conectar();
        $sentencia=sprintf("INSERT INTO usuarios (nom_usuario, ape_usuario, ced_usuario, correo_usuario, dire_usuario, cel_usuario, ocupa_usuario, usu_usuario, clave_usuario, rol_id_re) values ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')"
        ,$conex->real_escape_string($nom_usuario),
        $conex->real_escape_string($ape_usuario),
        $conex->real_escape_string($ced_usuario),
        $conex->real_escape_string($correo_usuario),
        $conex->real_escape_string($dire_usuario),
        $conex->real_escape_string($cel_usuario),
        $conex->real_escape_string($ocupa_usuario),
        $conex->real_escape_string($usu_usuario),
        $conex->real_escape_string($clave_usuario),
        $conex->real_escape_string($rol_id_re));
    
        $result=mysqli_query($conex, $sentencia);
        return $result;
    }
    public function buscar_jurados($apellido)
    {
        $conex = new DBConexion();
        $conex = $conex->Conectar();
        if($apellido == '')
        {
            $sentencia = sprintf("SELECT * FROM usuarios WHERE rol_id_re = 2");
        }
        else
        {
            $sentencia = sprintf("SELECT * FROM usuarios WHERE rol_id_re = 2 AND ape_usuario LIKE '%s'", "%".$apellido."%");
        }
        $result = mysqli_query($conex, $sentencia);
        return $result;
    }
    
    public function buscar_notarios($apellido)
    {
        $conex = new DBConexion();
        $conex = $conex->Conectar();
        if($apellido == '')
        {
            $sentencia = sprintf("SELECT * FROM usuarios WHERE rol_id_re = 3");
        }
        else
        {
            $sentencia = sprintf("SELECT * FROM usuarios WHERE rol_id_re = 3 AND ape_usuario LIKE '%s'", "%".$apellido."%");
        }
        $result = mysqli_query($conex, $sentencia);
        return $result;
    }

}

class roles
{
    public $id_rol;
    public $nom_rol;
    public $descri_rol;

    public function __construct()
    {
        $this->id_rol = "";
        $this->nom_rol = "";
        $this->descri_rol = "";
    }
    }

    class candidatas
    {
        public $id_candidata;
        public $nom_candidata;
        public $ape_candidata;
        public $ced_candidata;
        public $correo_candidata;
        public $cel_candidata;
        public $dir_candidata;
        public $repre_candidata;
        public $img_candidata;
    
        public function __construct()
        {
            $this->id_candidata = "";
            $this->nom_candidata = "";
            $this->ape_candidata = "";
            $this->ced_candidata = "";
            $this->correo_candidata = "";
            $this->cel_candidata = "";
            $this->dir_candidata = "";
            $this->repre_candidata = "";
            $this->img_candidata = "";
        }
    
        public function insertarcandidata($nom_candidata, $ape_candidata, $ced_candidata, $correo_candidata, $cel_candidata, $dir_candidata, $repre_candidata, $img_candidata)
        {
            $conex = new DBConexion();
            $conex = $conex->Conectar();
            $sentencia = sprintf("INSERT INTO candidata (nom_candidata, ape_candidata, ced_candidata, correo_candidata, cel_candidata, dir_candidata, repre_candidata, img_candidata) values ('%s', '%s', '%s', '%s','%s', '%s', '%s', '%s')",
                $conex->real_escape_string($nom_candidata),
                $conex->real_escape_string($ape_candidata),
                $conex->real_escape_string($ced_candidata),
                $conex->real_escape_string($correo_candidata),
                $conex->real_escape_string($cel_candidata),
                $conex->real_escape_string($dir_candidata),
                $conex->real_escape_string($repre_candidata),
                $conex->real_escape_string($img_candidata)
            );
        
            $result = mysqli_query($conex, $sentencia);
            return $result;
        }
        
        public function buscar_candidatas($apellido)
        {
            $conex = new DBConexion();
            $conex = $conex->Conectar();
            if ($apellido == '') {
                $sentencia = "SELECT * FROM candidata";
            } else {
                $sentencia = sprintf("SELECT * FROM candidata WHERE ape_candidata LIKE '%s'", "%" . $apellido . "%");
            }
            $result = mysqli_query($conex, $sentencia);
            return $result;
        }

        public function ConsultarDato($id_candidata)
        {
            $conex = new DBConexion();
            $conex = $conex -> Conectar();
            $sentencia = sprintf ("select * FROM candidata WHERE id_candidata = '%s'",$conex->real_escape_string($id_candidata));
            $result = mysqli_query($conex, $sentencia);
            $row = mysqli_fetch_array($result);
            return $row;
        }


        public function actualizarcandidatas($nom_candidata,$ape_candidata,$ced_candidata,$correo_candidata,$cel_candidata,$dir_candidata,$repre_candidata,$img_candidata,$id_candidata) //actualizar datos
        {
            $conex = new DBConexion();
            $conex = $conex->Conectar();
            $sentencia=sprintf("UPDATE candidata SET nom_candidata='%s', ape_candidata='%s', ced_candidata='%s', correo_candidata='%s', cel_candidata='%s', dir_candidata='%s', repre_candidata='%s', img_candidata='%s' WHERE id_candidata='%s'"
            ,$conex->real_escape_string($nom_candidata),
            $conex->real_escape_string($ape_candidata), 
            $conex->real_escape_string($ced_candidata), 
            $conex->real_escape_string($correo_candidata), 
            $conex->real_escape_string($cel_candidata), 
            $conex->real_escape_string($dir_candidata), 
            $conex->real_escape_string($repre_candidata), 
            $conex->real_escape_string($img_candidata), 
            $conex->real_escape_string($id_candidata)); //NUNCA OLVIDARSE DEL WHERE NI EN EL EDITAR NI ELIMINAR
            $result=mysqli_query($conex, $sentencia);
            return $result;
        }


        public function eliminar($id_candidata) //eliminar datos
            {
                $conex = new DBConexion();
                $conex = $conex->Conectar();
                $sentencia=sprintf("DELETE FROM candidata WHERE id_candidata='%s'", $conex->real_escape_string($id_candidata)); //NUNCA OLVIDARSE DEL WHERE NI EN EL EDITAR NI ELIMINAR
                $result=mysqli_query($conex, $sentencia);
                return $result;
            }
    }
    
    



?>


