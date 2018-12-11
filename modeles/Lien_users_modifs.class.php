<?php
if (!defined('LIEN_USERS_MODIFS')) {
    define('LIEN_USERS_MODIFS', 'lien_users_modifs');
}
class Lien_users_modifs {
	private $lum_id;
	private $user_id;
	private $modif_id;

	public function setlum_id($pArg = "0") { $this->lum_id = $pArg;}
	public function setuser_id($pArg = "0") { $this->user_id = $pArg;}
	public function setmodif_id($pArg = "0") { $this->modif_id = $pArg;}

	public function getlum_id() { return $this->lum_id; }
	public function getuser_id() { return $this->user_id; }
	public function getmodif_id() { return $this->modif_id; }

	public function readObject($array = array()) {
		$qry = "SELECT * FROM " . LIEN_USERS_MODIFS;
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
			$this->setlum_id($record['lum_id']);
			$this->setuser_id($record['user_id']);
			$this->setmodif_id($record['modif_id']);

			return true;
		}
	}
	public static function readArray($array = array())
	{
		$qry = "SELECT *  FROM " . LIEN_USERS_MODIFS;
		$and = " WHERE ";
		
		foreach($array as $key => $value) {
			if ($array[$key] != "") {
				$qry .= $and.$key." = '".$array[$key]."'" ;
				$and = "AND ";
			}
		}
		
		$qry .= " ORDER BY lum_id ASC";
		$recordset     = Database::select($qry);
		$class_objects = array();
		if (is_array($recordset) == true) {
			while (list($i, $record) = each($recordset)) {
				$class_object = new Lien_users_modifs();
				
				$class_object->setlum_id($record['lum_id']);
				$class_object->setuser_id($record['user_id']);
				$class_object->setmodif_id($record['modif_id']);
				
				$class_objects[$class_object->getlum_id()] = $class_object;
			}
		}
		return $class_objects;
	}
	public function insert()
	{
		if ($this->getlum_id() != '') {
			$qry = "UPDATE " . LIEN_USERS_MODIFS . " SET 
            lum_id = '" . $this->getlum_id() . 
            "', user_id = '" . addslashes($this->getuser_id()) .
            "', modif_id = '" . addslashes($this->getmodif_id()) .
            "' WHERE lum_id = " . $this->getlum_id() ;
            //echo $qry;
			Database::insert($qry);
		} else {
			$qry = "INSERT INTO " . LIEN_USERS_MODIFS . " ( lum_id, user_id, modif_id) VALUES (" .
            "'" . $this->getlum_id() .
            "','" . addslashes($this->getuser_id()) .
            "','" . addslashes($this->getmodif_id()) .
            "')" ;
			//echo $qry;
			$this->setlum_id(Database::insert($qry));
		}
	}
	public function delete($array = array())
	{
		$qry = "DELETE FROM " . LIEN_USERS_MODIFS;
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
