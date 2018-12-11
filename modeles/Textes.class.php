<?php
if (!defined('TEXTES')) {
    define('TEXTES', 'textes');
}
class Textes {
	private $texte_id;
	private $description;
	private $name;
	private $projet_id;

	public function settexte_id($pArg = "0") { $this->texte_id = $pArg;}
	public function setdescription($pArg = "0") { $this->description = $pArg;}
	public function setname($pArg = "0") { $this->name = $pArg;}
	public function setprojet_id($pArg = "0") { $this->projet_id = $pArg;}

	public function gettexte_id() { return $this->texte_id; }
	public function getdescription() { return $this->description; }
	public function getname() { return $this->name; }
	public function getprojet_id() { return $this->projet_id; }

	public function readObject($array = array()) {
		$qry = "SELECT * FROM " . TEXTES;
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
			$this->settexte_id($record['texte_id']);
			$this->setdescription($record['description']);
			$this->setname($record['name']);
			$this->setprojet_id($record['projet_id']);

			return true;
		}
	}
	public static function readArray($array = array())
	{
		$qry = "SELECT *  FROM " . TEXTES;
		$and = " WHERE ";
		
		foreach($array as $key => $value) {
			if ($array[$key] != "") {
				$qry .= $and.$key." = '".$array[$key]."'" ;
				$and = "AND ";
			}
		}
		
		$qry .= " ORDER BY texte_id ASC";
		$recordset     = Database::select($qry);
		$class_objects = array();
		if (is_array($recordset) == true) {
			while (list($i, $record) = each($recordset)) {
				$class_object = new Textes();
				
				$class_object->settexte_id($record['texte_id']);
				$class_object->setdescription($record['description']);
				$class_object->setname($record['name']);
				$class_object->setprojet_id($record['projet_id']);
				
				$class_objects[$class_object->gettexte_id()] = $class_object;
			}
		}
		return $class_objects;
	}
	public function insert()
	{
		if ($this->gettexte_id() != '') {
			$qry = "UPDATE " . TEXTES . " SET 
            texte_id = '" . $this->gettexte_id() . 
            "', description = '" . addslashes($this->getdescription()) .
            "', name = '" . addslashes($this->getname()) .
            "', projet_id = '" . addslashes($this->getprojet_id()) .
            "' WHERE texte_id = " . $this->gettexte_id() ;
            //echo $qry;
			Database::insert($qry);
		} else {
			$qry = "INSERT INTO " . TEXTES . " (texte_id, description, name, projet_id) VALUES (" .
            "'" . $this->gettexte_id() .
            "','" . addslashes($this->getdescription()) .
            "','" . addslashes($this->getname()) .
            "','" . addslashes($this->getprojet_id()) .
            "')" ;
			//echo $qry;
			$this->settexte_id(Database::insert($qry));
		}
	}
	public function delete($array = array())
	{
		$qry = "DELETE FROM " . TEXTES;
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
