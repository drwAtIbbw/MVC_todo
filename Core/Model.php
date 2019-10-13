<?php
    class Model
    {
	protected $tablename;
	protected $colnames = [];
	
	public function create($werte)
    {
	$cols = str_replace('id,','',$this->colnames[0]);
	// Build query****
	$sql = "INSERT INTO ".$this->tablename." (".$cols.") VALUES (";
	$col_namen = explode(',',$cols);

	for ($i=0;$i<count($col_namen);$i++) {
		$col_namen[$i]= ":".$col_namen[$i];
	}
	$cols_pdo = join(',',$col_namen);
	$sql.=$cols_pdo.");\"";       
	//*******
        $req = Database::getBdd()->prepare($sql);
        return $req->execute($werte);
    }
	public function edit($id, $werte)
    {
	$cols = str_replace('id,','',$this->colnames[0]);        
	//prepare query ********
	$sql = "UPDATE ".$this->tablename." SET ";
	$col_namen = explode(',',$cols);

	for ($i=0;$i<count($col_namen);$i++) {
		$col_namen[$i]= $col_namen[$i]." =:".$col_namen[$i];
	}
	$cols_pdo = join(',',$col_namen);
	$sql.=$cols_pdo." WHERE id =:id;\"";  
	//********	
	
	$werte['id'] = $id;
	
	
        $req = Database::getBdd()->prepare($sql);
        return $req->execute($werte);
    }
	 public function showAll()
    	{
        $sql = "SELECT * FROM ".$this->tablename;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
	
	
        return $req->fetchAll();
    	}
	public function show($id)
    	{
        $sql = "SELECT * FROM ".$this->tablename." WHERE id =" . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    	}
	public function delete($id)
    	{
	     
	$sql = "DELETE FROM ".$this->tablename." WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
	/*try {
         $req->execute([':id' => $id]);
	}catch (PDOException $e) {
   	 echo $e->getMessage();
  	}*/

	return $req->execute([':id' => $id]);
    	}
    }
?>
