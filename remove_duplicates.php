<?php

/***
We are living in a time where biomedical research librarians and bioinformaticians are faced 
with situations where their growing publication databases have duplicate records. This is increasingly
becoming a recurring problem partly due to quickly evolving publishing models an example
being the openacccess model.In our case at the Kemri-wellcome trust programme, we constantly encounter
duplicates whenever we update our databse. An 

**/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'data.php';
//query publications database for duplicates
//accession_number = pmid
$con = dbconnect();
$sql = "SELECT id,accession_number, 
	COUNT(accession_number) 
	FROM refs3 
	GROUP BY accession_number 
	HAVING COUNT(accession_number) > 1";

$sth = $con->prepare($sql);
$sth->execute();
//get the ids as array
//https://stackoverflow.com/questions/52043146/create-single-array-from-mysql-with-php-pdo
$rows = $sth->fetchAll(PDO::FETCH_COLUMN, 0);
//remove first element of array rows which represents papers with no pmids
$rows1 = array_shift($rows);

//echo '<pre>';
//print_r($rows);
//echo '</pre>';
foreach($rows as $id){
	$sql1 = "DELETE FROM refs3 WHERE id = $id";
	$sth1 = $con->prepare($sql1);
	$sth1->execute();	

}
echo "success";
