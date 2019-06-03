<?php
// Modify to match with your local configs
define("HOST", "localhost");
define("DB_NAME", "challenge_db");
define("MYSQL_USER", "el");
define("MYSQL_PASSWORD", "root");
// End config

$db = new PDO('mysql:host='.HOST.';dbname='.DB_NAME, MYSQL_USER, MYSQL_PASSWORD);

function get_rooms($db, $building_id){
    $quest = $db->prepare(" SELECT ref_room.room_id, ref_room.room_name
                            FROM  ref_room, xref_building_room
                            WHERE xref_building_room.building_id = ? && xref_building_room.room_id = ref_room.room_id");
    $quest->execute(array($building_id));
    $rooms = $quest->fetchAll();
    array_unshift($rooms, array('room_id'=>NULL, 'room_name'=>"--None--"));
    return $rooms;
}
?>