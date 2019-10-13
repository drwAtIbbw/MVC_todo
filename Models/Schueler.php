<?php
class Schueler extends Model
{
    protected $tablename = 'schueler';
	protected $colnames = [];
	public function __construct() {
		$names = array();
		$infos = array();
		$sql = "PRAGMA table_info('".$this->tablename."')";
		$req = Database::getBdd()->prepare($sql);
		$req->execute();
		$infos = $req->fetchAll();
		foreach($infos as $info) {
			array_push($names, $info['name'];
		}
        	$this->colnames[0] = join(',',$names);
		
	}

    
	public function findSchuelerByName($name) {
		$sql = "SELECT * FROM ".$this->tablename." WHERE name = :name";
		$req = Database::getBdd()->prepare($sql);
		$req->execute(['name'=> $name]);
        	return $req->fetch();


	}
	public function findAllSchuelersByClass($id) {
		$sql = "SELECT * FROM ".$this->tablename. " WHERE classes_name = :classes_name";
		$req = Database::getBdd()->prepare($sql);
		$req->execute(['classes_name'=> '2']);
        	return $req->fetchAll();
	}
}
?>
