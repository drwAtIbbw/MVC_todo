<?php
class User extends Model
{
    protected $tablename = 'users';
	protected $colnames = [];
	public function __construct() {
		$sql = "SELECT GROUP_CONCAT (name) from pragma_table_info('".$this->tablename."')";
		$req = Database::getBdd()->prepare($sql);
		$req->execute();
        	$this->colnames = $req->fetch();
		
	}

    
	public function findUser($name) {
		$sql = "SELECT * FROM ".$this->tablename." WHERE name = :name";
		$req = Database::getBdd()->prepare($sql);
		$req->execute(['name'=> $name]);
        	return $req->fetch();


	}
	public function findAllUsersByClass($id) {
		$sql = "SELECT * FROM ".$this->tablename. " WHERE classes_name = :classes_name";
		$req = Database::getBdd()->prepare($sql);
		$req->execute(['classes_name'=> '2']);
        	return $req->fetchAll();
	}
}
?>
