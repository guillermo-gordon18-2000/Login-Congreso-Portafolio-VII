<?php
class Ubicacion
{
	private $pdo;

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

	public function ConsultarPais()
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM congreso.Pais ;");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ConsultarEstados()
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM congreso.estado limit 0,3000;");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


}