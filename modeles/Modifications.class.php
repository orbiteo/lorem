<?php
if (!defined('MODIFICATIONS')) {
    define('MODIFICATIONS', 'modifications');
}
class Modifications {
	private $modif_id;
	private $texte_id;
	private $image_id;
	private $date_modif;

	public function setmodif_id($pArg = "0") { $this->modif_id = $pArg;}
	public function settexte_id($pArg = "0") { $this->texte_id = $pArg;}
	public function setimage_id($pArg = "0") { $this->image_id = $pArg;}
	public function setdate_modif($pArg = "0") { $this->date_modif = $pArg;}

	public function getmodif_id() { return $this->modif_id; }
	public function gettexte_id() { return $this->texte_id; }
	public function getimage_id() { return $this->image_id; }
	public function getdate_modif() { return $this->date_modif; }

	public function readObject($array = array()) {
		$qry = "SELECT * FROM " . MODIFICATIONS;
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
			$this->setmodif_id($record['modif_id']);
			$this->settexte_id($record['texte_id']);
			$this->setimage_id($record['image_id']);
			$this->setdate_modif($record['date_modif']);

			return true;
		}
	}
	public static function readArray($array = array())
	{
		$qry = "SELECT *  FROM " . MODIFICATIONS;
		$and = " WHERE ";
		
		foreach($array as $key => $value) {
			if ($array[$key] != "") {
				$qry .= $and.$key." = '".$array[$key]."'" ;
				$and = "AND ";
			}
		}
		
		$qry .= " ORDER BY date_modif ASC";
		$recordset     = Database::select($qry);
		$class_objects = array();
		if (is_array($recordset) == true) {
			while (list($i, $record) = each($recordset)) {
				$class_object = new Modifications();
				
				$class_object->setmodif_id($record['modif_id']);
				$class_object->settexte_id($record['texte_id']);
				$class_object->setimage_id($record['image_id']);
				$class_object->setdate_modif($record['date_modif']);
				
				$class_objects[$class_object->getmodif_id()] = $class_object;
			}
		}
		return $class_objects;
	}
	public function insert()
	{
		if ($this->getmodif_id() != '') {
			$qry = "UPDATE " . MODIFICATIONS . " SET 
            modif_id = '" . $this->getmodif_id() . 
            "', texte_id = '" . addslashes($this->gettexte_id()) .
            "', image_id = '" . addslashes($this->getimage_id()) .
            "', date_modif = '" . addslashes($this->getdate_modif()) .
            "' WHERE modif_id = " . $this->getmodif_id() ;
           // echo $qry;
			Database::insert($qry);
		} else {
			$qry = "INSERT INTO " . MODIFICATIONS . " ( modif_id, texte_id, image_id, date_modif) VALUES (" .
            "'" . $this->getmodif_id() .
            "','" . addslashes($this->gettexte_id()) .
            "','" . addslashes($this->getimage_id()) .
            "','" . addslashes($this->getdate_modif()) .
            "')" ;
			//echo $qry;
			$this->setmodif_id(Database::insert($qry));
		}
	}
	public function delete($array = array())
	{
		$qry = "DELETE FROM " . MODIFICATIONS;
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
