<!DOCTYPE html>
<!-- PrintTimeTable.php -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>FOOD</title>
</head>
<body>
<?php
$DB_HOST = 'localhost'; // MySQL server hostname
$DB_PORT = '3306';      // MySQL server port number (default 3306)
$DB_NAME = 'food_delivary';      // MySQL database name
$DB_USER = 'webapp';  // MySQL username
$DB_PASS = 'fourthyear';      // password
try {
    $dbConn = new PDO("mysql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME", $DB_USER, $DB_PASS);
    echo 'Connected', '<br />';
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   // Set error mode to exception
// Run SQL statements
// Use exec() to run a CREATE TABLE, DROP TABLE, INSERT, DELETE and UPDATE,
//  which returns the affected row count.
    //  $rowCount = $dbConn->exec('DROP TABLE IF EXISTS `client`');
    //echo 'DROP TABLE: ', $rowCount, ' rows', '<br />';

    $rowCount = $dbConn->exec(
        'CREATE TABLE IF NOT EXISTS `client` (
           `cli_ID` INT AUTO_INCREMENT,
           `cli_name` VARCHAR(20),
           `addres` VARCHAR(1000),
           `phone` INT,
           PRIMARY KEY (`cli_ID`))');
    echo 'CREATE TABLE: ', $rowCount, ' rows', '<br />';

    // $rowCount = $dbConn->exec('DROP TABLE IF EXISTS `order`');
    // echo 'DROP TABLE: ', $rowCount, ' rows', '<br />';

    $rowCount = $dbConn->exec(
        'CREATE TABLE IF NOT EXISTS `order` (
       `or_ID` INT AUTO_INCREMENT,
           `history` DATA,
           `time` DATA,
           `order_status` VARCHAR(1000),
            `cli_ID` INT,
           PRIMARY KEY (`or_ID`))');

    echo 'CREATE TABLE: ', $rowCount, ' rows', '<br />';

    // $rowCount = $dbConn->exec('DROP TABLE IF EXISTS `meal`');
    // echo 'DROP TABLE: ', $rowCount, ' rows', '<br />';

    $rowCount = $dbConn->exec(
        'CREATE TABLE IF NOT EXISTS `meal` (
           `me_ID` INT AUTO_INCREMENT,
           `me_name` int ,
           `description` varchar (100),
          `price` double ,
    `or_ID` int ,
    `re_ID` int,
           PRIMARY KEY (`me_ID`))');
    echo 'CREATE TABLE: ', $rowCount, ' rows', '<br />';

    // $rowCount = $dbConn->exec('DROP TABLE IF EXISTS `delivary_driver`');
    // echo 'DROP TABLE: ', $rowCount, ' rows', '<br />';

    $rowCount = $dbConn->exec(
        'CREATE TABLE IF NOT EXISTS `delivary_driver` (
           `de_ID` INT AUTO_INCREMENT,
           `phone` INT ,
           `car_num` INT ,
            `or_ID` INT ,
           PRIMARY KEY (`de_ID`))');
    echo 'CREATE TABLE: ', $rowCount, ' rows', '<br />';

    //$rowCount = $dbConn->exec('DROP TABLE IF EXISTS `bill`');
    // echo 'DROP TABLE: ', $rowCount, ' rows', '<br />';

    $rowCount = $dbConn->exec(
        'CREATE TABLE IF NOT EXISTS `bill` (
           `bi_ID` INT AUTO_INCREMENT,
           `bi_date` data ,
           `total_amount` double ,
            `or_ID` int ,
           PRIMARY KEY (`bi_ID`))');

    echo 'CREATE TABLE: ', $rowCount, ' rows', '<br />';

    // $rowCount = $dbConn->exec('DROP TABLE IF EXISTS `restaurant`');
    //  echo 'DROP TABLE: ', $rowCount, ' rows', '<br />';

    $rowCount = $dbConn->exec(
        'CREATE TABLE IF NOT EXISTS `restaurant` (
           `ri_ID` INT AUTO_INCREMENT,
           `ri_name` varchar(25) ,
           `adress` varchar(50) ,
           `phone` int ,
            `ri_ID` int ,
           PRIMARY KEY (`or_ID`))');

    echo 'CREATE TABLE: ', $rowCount, ' rows', '<br />';


// Use query() to run a SELECT, which returns a resultset.

// By default, resultset's row is an associative array
//  indexed by BOTH column-name AND column-number (starting at 0).

        // echo 'Retrieve via column number: id=', $row[0], ', name=', $row[1], '<br />';

    echo '<br />';


    $rowCount = $dbConn->exec("INSERT INTO `order` (`or_ID`, `history`,`time`,`order_status`,`cli_ID`) VALUES (1,'5/5/2024','2:00','ok',1)");
    echo 'INSERT INTO: ', $rowCount, ' rows', '<br />';
    $rowCount = $dbConn->exec("INSERT INTO `order` (`or_ID`, `history`,`time`,`order_status`,`cli_ID`) VALUES (2,'5/2/2024','5:00','no',2)");
    echo 'INSERT INTO: ', $rowCount, ' rows', '<br />';
    //update the name where id=1003
    $rowCount = $dbConn->exec("update order set or_ID='5' where history=`5/5/2024`");
    echo 'Update: ', $rowCount, ' rows', '<br />';

    //delete row where id=1003
    $rowCount = $dbConn->exec("Delete from order where or_ID=`2`");
    echo 'delete: ', $rowCount, ' rows', '<br />';

    $sql = 'SELECT * FROM `order`';
    $resultset = $dbConn->query($sql);
     foreach ($resultset as $row) {  // Loop thru all rows in resultset
        echo 'Retrieve via column name: id=', $row['or_ID'], ', history=', $row['history'],
         ', time=', $row['time'], ', order=', $row['order_status'], ', cli_ID=', $row['cli_ID'], '<br />';
         print_r($row); // for showing the contents of resultset's row
         echo '<br />';
     }
    $rowCount = $dbConn->exec("INSERT INTO `bill` (`bi_ID`,`bi_date`,`total_amount`,`or_ID`) VALUES (1,'5/5/2024',2500,1)");
    echo 'INSERT INTO: ', $rowCount, ' rows', '<br />';

    $sql = 'SELECT where bi_ID=1 FROM `order`';
    $resultset = $dbConn->query($sql);
    foreach ($resultset as $row) {  // Loop thru all rows in resultset
        echo 'Retrieve via column name: id=', $row['or_ID'], ', history=', $row['history'],
        ', time=', $row['time'], ', order=', $row['order_status'], ', cli_ID=', $row['cli_ID'], '<br />';
        print_r($row); // for showing the contents of resultset's row
        echo '<br />';
    }
// Run again with "FETCH_ASSOC" option.
// Resultset's row is an associative array indexed by column-name only.
// print_r($resultset);   // A PDOStatement Object

// Run again with "FETCH_OBJ" option.
// Resultset's row is an object with column-names as properties.

// Close the database connection (optional).
    $dbConn = NULL;

}catch (PDOException $e) {
    $fileName = basename($e->getFile(), ".php"); // Filename that trigger the exception
    $lineNumber = $e->getLine();         // Line number that triggers the exception
    die("[$fileName][$lineNumber] Database error: " . $e->getMessage() . '<br />');
}


?>
</body>
</html>
