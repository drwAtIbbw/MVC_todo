<?php
    class Model
    {
        protected $tablename;
        protected $colnames = array();
        
        /* insert CRUD functions here leave only special functions in Model/Tasks.php */
        
        public function showAll() //index method
        {
         $sql = "SELECT * FROM ".$this->tablename;
            $req = Database::getBdd()->prepare($sql);
            $req->execute();
            
        return $req->fetchAll();
        }
    }
?>
