<?php 

function getAlbums() {

try {
	$PDO = db_connect();
	$statement = $PDO->prepare('select * from tblElton order by Album, SongTitle');
	$statement->execute();
	$albumArray = $statement->fetchAll(PDO::FETCH_ASSOC);

	return $albumArray;
}

catch(PDOException $e) {
    echo $e->getMessage();
}




}
