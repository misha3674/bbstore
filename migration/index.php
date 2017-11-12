<?php

    if($_GET['pwd'] !== 'migrationbbstore')
        die(404);

try{
    $db = new PDO('mysql:host=localhost;port=3308;dbname=mvc', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE products (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                name VARCHAR(30) NOT NULL,
                description VARCHAR(255) NOT NULL,
                price INT(6),
                oldprice INT(6),
                filter VARCHAR(255)
            )";
    $db->exec($sql);

    $xml=simplexml_load_file("offer.xml") or die("Error: Cannot create object");
    $insert = "INSERT INTO products (name, description, price, oldprice) VALUES";
    $format = "('%s', '%s', %d, %d)";
    $values = [];
    foreach($xml as $offer)
    {
        $values[]=sprintf($format, addslashes($offer->name), 
                                    addslashes($offer->description), 
                                    $offer->price, 
                                    $offer->oldprice);
    }
    $sql = $insert.implode(",", $values).";";
    echo "<pre>";
    echo $sql;
    echo "</pre>";
    $db->exec($insert.implode(",", $values).";");

} catch(PDOException $e ) {
    echo $sql . "<br>" . $e->getMessage();
}
$db = null;


?>