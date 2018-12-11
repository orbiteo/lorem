<?php
if (!defined('IMAGES')) {
    define('IMAGES', 'images');
}
class Images {
	private $image_id;
	private $url;
	private $name;
	private $projet_id;

	public function setimage_id($pArg = "0") { $this->image_id = $pArg;}
	public function seturl($pArg = "0") { $this->url = $pArg;}
	public function setname($pArg = "0") { $this->name = $pArg;}
	public function setprojet_id($pArg = "0") { $this->projet_id = $pArg;}

	public function getimage_id() { return $this->image_id; }
	public function geturl() { return $this->url; }
	public function getname() { return $this->name; }
	public function getprojet_id() { return $this->projet_id; }

	public function readObject($array = array()) {
		$qry = "SELECT * FROM " . IMAGES;
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
			$this->setimage_id($record['image_id']);
			$this->seturl($record['url']);
			$this->setname($record['name']);
			$this->setprojet_id($record['projet_id']);

			return true;
		}
	}
	public static function readArray($array = array())
	{
		$qry = "SELECT *  FROM " . IMAGES;
		$and = " WHERE ";
		
		foreach($array as $key => $value) {
			if ($array[$key] != "") {
				$qry .= $and.$key." = '".$array[$key]."'" ;
				$and = "AND ";
			}
		}
		
		$qry .= " ORDER BY image_id ASC";
		$recordset     = Database::select($qry);
		$class_objects = array();
		if (is_array($recordset) == true) {
			while (list($i, $record) = each($recordset)) {
				$class_object = new Images();
				
				$class_object->setimage_id($record['image_id']);
				$class_object->seturl($record['url']);
				$class_object->setname($record['name']);
				$class_object->setprojet_id($record['projet_id']);
				
				$class_objects[$class_object->getimage_id()] = $class_object;
			}
		}
		return $class_objects;
	}
	public function insert()
	{
		if ($this->getimage_id() != '') {
			$qry = "UPDATE " . IMAGES . " SET 
            image_id = '" . $this->getimage_id() . 
            "', url = '" . addslashes($this->geturl()) .
            "', name = '" . addslashes($this->getname()) .
            "', projet_id = '" . addslashes($this->getprojet_id()) .
            "' WHERE image_id = " . $this->getimage_id() ;
            //echo $qry;
			Database::insert($qry);
		} else {
			$qry = "INSERT INTO " . IMAGES . " ( image_id, url, name, projet_id) VALUES (" .
            "'" . $this->getimage_id() .
            "','" . addslashes($this->geturl()) .
            "','" . addslashes($this->getname()) .
            "','" . addslashes($this->getprojet_id()) .
            "')" ;
			//echo $qry;
			$this->setimage_id(Database::insert($qry));
		}
	}
	public function delete($array = array())
	{
		$qry = "DELETE FROM " . IMAGES;
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
