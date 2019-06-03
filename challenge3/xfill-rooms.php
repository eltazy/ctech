<?php
include_once 'utils.conf.php';

$rooms = get_rooms($db, $_POST['xbuild_id']);

echo json_encode($rooms);
?>