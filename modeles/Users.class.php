<?php
if (!defined('USERS')) {
    define('USERS', 'users');
}
class Users {
	private $user_id;
	private $login;
	private $mdp;
	private $active;

	public function setuser_id($pArg = "0") { $this->user_id = $pArg;}
	public function setlogin($pArg = "0") { $this->login = $pArg;}
	public function setmdp($pArg = "0") { $this->mdp = $pArg;}
	public function setactive($pArg = "0") { $this->active = $pArg;}

	public function getuser_id() { return $this->user_id; }
	public function getlogin() { return $this->login; }
	public function getmdp() { return $this->mdp; }
	public function getactive() { return $this->active; }

	public function readObject($array = array()) {
		$qry = "SELECT * FROM " . USERS;
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
			$this->setuser_id($record['user_id']);
			$this->setlogin($record['login']);
			$this->setmdp($record['mdp']);
			$this->setactive($record['active']);

			return true;
		}
	}
	public static function readArray($array = array())
	{
		$qry = "SELECT *  FROM " . USERS;
		$and = " WHERE ";
		
		foreach($array as $key => $value) {
			if ($array[$key] != "") {
				$qry .= $and.$key." = '".$array[$key]."'" ;
				$and = "AND ";
			}
		}
		
		$qry .= " ORDER BY user_id ASC";
		$recordset     = Database::select($qry);
		$class_objects = array();
		if (is_array($recordset) == true) {
			while (list($i, $record) = each($recordset)) {
				$class_object = new users();
				
				$class_object->setuser_id($record['user_id']);
				$class_object->setlogin($record['login']);
				$class_object->setmdp($record['mdp']);
				$class_object->setactive($record['active']);
				
				$class_objects[$class_object->getuser_id()] = $class_object;
			}
		}
		return $class_objects;
	}
	public function insert()
	{
		if ($this->getuser_id() != '') {
			$qry = "UPDATE " . USERS . " SET 
            user_id = '" . $this->getuser_id() . 
            "', login = '" . addslashes($this->getlogin()) .
            "', mdp = '" . addslashes($this->getmdp()) .
            "', active = '" . addslashes($this->getactive()) .
            "' WHERE user_id = " . $this->getuser_id() ;
            //echo $qry;
			Database::insert($qry);
		} else {
			$qry = "INSERT INTO " . USERS . " ( user_id, login, mdp, active) VALUES (" .
            "'" . $this->getuser_id() .
            "','" . addslashes($this->getlogin()) .
            "','" . addslashes($this->getmdp()) .
            "','" . addslashes($this->getactive()) .
            "')" ;
			//echo $qry;
			$this->setuser_id(Database::insert($qry));
		}
	}
	public function delete($array = array())
	{
		$qry = "DELETE FROM " . USERS;
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
