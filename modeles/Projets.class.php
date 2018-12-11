<?php
if (!defined('PROJETS')) {
    define('PROJETS', 'projets');
}
class Projets {
	private $projet_id;
	private $nom;
	private $date_fin;
	private $user_id;

	public function setprojet_id($pArg = "0") { $this->projet_id = $pArg;}
	public function setnom($pArg = "0") { $this->nom = $pArg;}
	public function setdate_fin($pArg = "0") { $this->date_fin = $pArg;}
	public function setuser_id($pArg = "0") { $this->user_id = $pArg;}

	public function getprojet_id() { return $this->projet_id; }
	public function getnom() { return $this->nom; }
	public function getdate_fin() { return $this->date_fin; }
	public function getuser_id() { return $this->user_id; }

	public function readObject($array = array()) {
		$qry = "SELECT * FROM " . PROJETS;
		$and = " WHERE ";

		$i = 0;

		foreach($this as $key => $value) {
			${"temp".$i} = "get".$key;
			if ($this->${"temp".$i}() != "") {
				$qry .= $and.$key." = '".$this->${"temp".$i}()."' ";
				$and = "AND ";
			}
			$i++;
		}
		$record = Database::select($qry);
		if (count($record[0]) == 0) {
			return array();
		} else {
			$record = $record[0];
			$this->setprojet_id($record['projet_id']);
			$this->setnom($record['nom']);
			$this->setdate_fin($record['date_fin']);
			$this->setuser_id($record['user_id']);

			return true;
		}
	}
	public static function readArray($array = array())
	{
		$qry = "SELECT *  FROM " . PROJETS;
		$and = " WHERE ";
		
		foreach($array as $key => $value) {
			if ($array[$key] != "") {
				$qry .= $and.$key." = '".$array[$key]."'" ;
				$and = "AND ";
			}
		}
		
		$qry .= " ORDER BY nom ASC";
		$recordset     = Database::select($qry);
		$class_objects = array();
		if (is_array($recordset) == true) {
			while (list($i, $record) = each($recordset)) {
				$class_object = new Projets();
				
				$class_object->setprojet_id($record['projet_id']);
				$class_object->setnom($record['nom']);
				$class_object->setdate_fin($record['date_fin']);
				$class_object->setuser_id($record['user_id']);
				
				$class_objects[$class_object->getprojet_id()] = $class_object;
			}
		}
		return $class_objects;
	}
	public function insert()
	{
		if ($this->getprojet_id() != '') {
			$qry = "UPDATE " . PROJETS . " SET 
            projet_id = '" . $this->getprojet_id() . 
            "', nom = '" . addslashes($this->getnom()) .
            "', date_fin = '" . addslashes($this->getdate_fin()) .
            "', user_id = '" . addslashes($this->getuser_id()) .
            "' WHERE projet_id = " . $this->getprojet_id() ;
            //echo $qry;
			Database::insert($qry);
		} else {
			$qry = "INSERT INTO " . PROJETS . " ( projet_id, nom, date_fin, user_id) VALUES (" .
            "'" . $this->getprojet_id() .
            "','" . addslashes($this->getnom()) .
            "','" . addslashes($this->getdate_fin()) .
            "','" . addslashes($this->getuser_id()) .
            "')" ;
			//echo $qry;
			$this->setprojet_id(Database::insert($qry));
		}
	}
	public function delete($array = array())
	{
		$qry = "DELETE FROM " . PROJETS;
		$and = " WHERE ";
		
		$i = 0;

		foreach($this as $key => $value) {
			${"temp".$i} = "get".$key;
			if ($this->${"temp".$i}() != "") {
				$qry .= $and.$key." = '".$this->${"temp".$i}()."' ";
				$and = "AND ";
			}
			$i++;
		}
		Database::delete($qry);
	}
}
