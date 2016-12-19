<?php
class dbConn{
  protected static $db;
    private function __construct() {
      try {
      self::$db= new PDO( 'mysql:host=sql2.njit.edu;dbname=ylm4', 'ylm4','fc7Tp7jW' );
      self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      }
      catch (PDOException $e) {
      echo "Connection Error: " . $e->getMessage();
      }
        }
          public static function getConnection(){
            if (!self::$db) {
            new dbConn();
            }
              return self::$db;
              }
}
$db = dbConn::getConnection();
print_r($db);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement = $db->prepare('SELECT * FROM customers LIMIT 5');
$statement->execute();
while($result = $statement->fetch(PDO::FETCH_OBJ)) {
	$results[] = $result;
}
print_r($results);



?>
