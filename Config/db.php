<?php
class Database
{
    private static $bdd = null;
    private function __construct() {
    }
    public static function getBdd() {
        if(is_null(self::$bdd)) {
            self::$bdd = new PDO("sqlite:".ROOT."schule.db");
		self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$bdd;
    }
	public static function closeBdd() {
        if(!is_null(self::$bdd)) {
            self::$bdd = null;
		return true;
        }
        return false;
    }
}
?>
