
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
?>
<?php
require_once 'db.php';
//require_once 'db-o.php';

class Usuario
{
	private $pdo;
	private $msg;
    public $IDusuario;
    public $nombre;
	public $email;
    public $apellido;  
	public $cedula;  
	public $fecha_nacimiento;
	public $Sexo;
	public $Intitucion;
	public $Facultad;
	public $opupacion;
	public $Tipo_Ticket;
	public $Pais;
	public $ciudad;                
 
    public $pass;
    Public $Empresa;


	public function __CONSTRUCT()
	{    
		try
		{
			$this->pdo = Db::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function Registrar(usuario $data)
	{
		try 
		{
		$sql = "INSERT INTO usuario (Nombre,Apellido,Cedula,Correo,Sexo,Institucion,Facultadad,Opupacion,Tipo_Ticket,Pais,Ciudad) 
		        VALUES                   (?,       ?,     ?,     ?,   ?,          ?,         ?,        ?,          ?,   ?,    ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array( 
                    $data->nombre,
                    $data->apellido, 
					$data->cedula, 
                    $data->email, 
				//	$data->fecha_nacimiento,
					$data->Sexo,
					$data->Intitucion,
					$data->Facultad,
					$data->ocupacion,
					$data->Tipo_Ticket, 
					$data->Pais,
					$data->ciudad       
                )
			);
		$this->msg="Su registro se ha guardado exitosamente!&t=text-success";
		} catch (Exception $e) 
		{
			
			if ($e->errorInfo[1] == 1062) { // error 1062 es de duplicación de datos 
				$this->msg="Correo electrónico ya está registrado en el sistema&t=text-danger";
			 } else {
				$this->msg="Error al guardar los datos&t=text-danger";
			 }
			 
			
		}
		return $this->msg;
	}

	public function Consultar(usuario $data)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM  congreso.staff WHERE Correo = ? AND Contraseña=?");
			$stm->execute(array($data->email, $data->pass));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
	
	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM staff WHERE id= ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	

	
	

	public function Obtener_Subcriptores()
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM usuario");   
			$stm->execute();
			return $stm->fetchALL(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Obtener_INFO_Subcriptores($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM congreso.asistencia where  asistencia.ID_Usuario=?" );
			  
			$stm->execute(array($id));
			return $stm->fetchALL(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
        
	
	public function Lista_Num_Conferencia($id)
	{
		try 
		{                           //
			$stm = $this->pdo->prepare("CALL Lista_Num_Conferencia_2(?)");   
			$stm->execute(array($id));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
    public function ObtenerTodosLosUsuarios($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM staff  where ID_Conferencia = ?");   
			$stm->execute(array($id));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	

	
	public function Actualizar(usuario $data)
	{
		try 
		{
		$sql = "UPDATE staff SET nombre = ?,apellido= ?, Foto= ? 
		        WHERE id = ?";

		$this->pdo->prepare($sql)
		     ->execute(
				array( 
                    $data->nombre,
                    $data->apellido, 
                    $data->foto,
					$data->id
                )
			);
		$this->msg="Su registro se ha Actualizado exitosamente!&t=text-success";
		} catch (Exception $e) 
		{
			$this->msg="Error al actualizar los datos&t=text-danger";

		}
		return $this->msg;
	}

	
	public function asisitencia_Lits(usuario $data)
	{
		try 
		{                           //
			$stm = $this->pdo->prepare("SELECT * FROM congreso.usuario where Cedula=? or Correo=? ;");   

			$stm->execute(array($data->cedula , $data->email ));
			
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Obtener_ticket()
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM tipo_de_ticket");   
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}



}


