<?php
class Database
{
	public function Database()
	{
		$this->_conn = SPDO1::getInstance();
	}
	public static function select($pQry = "")
	{
		$pdo    = SPDO1::getInstance();
		$result = $pdo->query($pQry);
		$row    = array();
		if (!empty($result)) {
			$row = $result->fetchAll(PDO::FETCH_ASSOC);
		}
		return $row;
	}
	public static function insert($pQry = "")
	{
		$pdo    = SPDO1::getInstance();
		$result = $pdo->execute($pQry);
		return $pdo->lastInsertId();
	}
	public static function update($pQry = "")
	{
		$pdo    = SPDO1::getInstance();
		$result = $pdo->execute($pQry);
		return $result;
	}
	public static function delete($pQry = "")
	{
		$pdo    = SPDO1::getInstance();
		$result = $pdo->execute($pQry);
		return $result;
	}
}
class SPDO1
{
	private $PDOInstance = null;
	private static $instance = null;
	private $exception;
	private function __construct()
	{
		try {
			$this->PDOInstance = new PDO("mysql:host=localhost;dbname=teamorbiteo_configurateur_contenu", "root", "root");
		}
		catch (PDOException $e) {
			echo "Error connecting to MySQL!: " . $e->getMessage();
			exit();
		}
	}
	public static function getInstance()
	{
		if (is_null(self::$instance)) {
			self::$instance = new SPDO1();
		}
		return self::$instance;
	}
	public function query($query)
	{
		return $this->PDOInstance->query($query);
	}
	public function prepare($query)
	{
		return $this->PDOInstance->prepare($query);
	}
	public function execute($query)
	{
		return $this->PDOInstance->exec($query);
	}
	public function lastInsertId()
	{
		return $this->PDOInstance->lastInsertId();
	}
	public function quote($query)
	{
		return $this->PDOInstance->quote($query);
	}
	public function getException()
	{
		return $this->exception;
	}
}
?>