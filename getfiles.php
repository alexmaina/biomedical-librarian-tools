<?php
##Alex Maina
##Librarian - KEMRI-Wellcome Trust
##19-08-2019

require 'data.php';
$dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('/home/alex/pall2016-2019'));
$files = array(); 
foreach ($dir as $file) {

    if ($file->isDir()){ 
        continue;
    }

    $files[] = $file->getPathname(); 

}

//echo $total_items  = count( glob("/home/alex/pall2016-2019/*", GLOB_ONLYDIR) );

foreach($files as $newdir){
	if(preg_match('/results.xml/', $newdir)){
		$newdir1[] = $newdir;
	}
}

foreach($newdir1 as $x){
	$y = explode('/', $x);
	$z[] = $y[4];
}
	
foreach($files as $k){
	$i = explode('/', $k);
	$l[] = $i[4];

}
$m = array_unique($l);

$noncompliant = array_diff($m, $z);


foreach($noncompliant as $pmcids){
	echo $pmcids . ",";
	$con = dbconnect();
	$sql2 = $con->prepare("insert into complied(pmcids) values(:pmcids)");
	$sql2->bindValue(':pmcids', $pmcids, PDO::PARAM_STR);
	$sql2->execute();**/

}

