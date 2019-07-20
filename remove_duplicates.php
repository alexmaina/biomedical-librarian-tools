<?php

/***
We are living in times where biomedical research librarians and bioinformaticians are faced 
with situations where their growing publication databases have duplicate records. This is increasingly
becoming a recurring problem partly due to quickly evolving publishing models an example
being the openacccess model.In our case at the Kemri-wellcome trust programme, we constantly encounter
duplicates whenever we update our databse. A subset can be seen below:
+------+------------------+-------------------------+
| id   | accession_number | count(accession_number) |
+------+------------------+-------------------------+
|   38 |                  |                     146 |
| 2556 | 29318647         |                       2 |
| 2560 | 29497504         |                       2 |
| 2551 | 29514814         |                       2 |
| 2562 | 29574688         |                       2 |
| 2547 | 29588414         |                       2 |
| 2550 | 29627147         |                       2 |
| 2558 | 29702700         |                       2 |
| 2546 | 29771994         |                       2 |
| 2559 | 29783977         |                       2 |
| 2540 | 29971245         |                       2 |
| 2557 | 30103995         |                       2 |
| 2591 | 30325767         |                       2 |
| 2564 | 30365213         |                       2 |
| 2582 | 30452666         |                       2 |
| 2589 | 30501550         |                       2 |
+------+------------------+-------------------------+

As can be seen above(column 3), at the time of pushing this script to github, 
there were 146 records in the database without a pmid, while the other records had
a duplicate each. To solve this problem i wrote the code below in PHP.
One could easily argue that there are much more less complicated ways 
of solving this problem like the one i found on stackoverflow (see link below):
https://stackoverflow.com/questions/4685173/delete-all-duplicate-rows-except-for-one-in-mysql
However, the problem of null accession_numbers does not allow for such simple solutions.

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
//delete the duplicate accession number
foreach($rows as $id){
	$sql1 = "DELETE FROM refs3 WHERE id = $id";
	$sth1 = $con->prepare($sql1);
	$sth1->execute();	

}
echo "success";
