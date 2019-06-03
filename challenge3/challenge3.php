<?php

include_once 'Model.php';
include_once 'utils.conf.php';

$events = [];
$speakers = [];
$buildings = [];
$rooms = [];

if(isset($_POST['btn_edit'])){
    foreach ($_POST['event_ids'] as $key => $id) {
        $quest = $db->prepare("SELECT * FROM vw_events WHERE event_id=?;");
        $quest->execute(array($id));
        array_push($events, $quest->fetch(PDO::FETCH_ASSOC));
    }
    $quest = $db->prepare("SELECT * FROM ref_speaker;");
    $quest->execute();
    $speakers = $quest->fetchAll();
    
    $quest = $db->prepare("SELECT * FROM ref_building;");
    $quest->execute();
    $buildings = $quest->fetchAll();
}
else if(isset($_POST['btn_save'])){
    foreach ($_POST['edit'] as $data) {
        $model = new Model($data);
        $model->save($db);
    }
    $_POST=array();
    header("Location: challenge3.php");
}
else{
    $quest = $db->prepare("SELECT * FROM vw_events;");
    $quest->execute();
    $events = $quest->fetchAll();
}
array_unshift($speakers, array('speaker_id'=>NULL, 'speaker_name'=>"--None--"));
array_unshift($buildings, array('building_id'=>NULL, 'building_name'=>"--None--"));
?>

<html>
<head>
    <style>
        form { margin-left: 20px; margin-right: 20px; }
    </style>
    <title><?= isset($_POST['btn_edit']) ? 'Edit events':'Events' ?></title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
    <form method="post">
    <table class="table">
        <thead><tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Topic</th>
            <th scope="col">Description</th>
            <th scope="col">Date</th>
            <th scope="col">Speaker</th>
            <th scope="col">Building</th>
            <th scope="col">Room</th>
        </tr></thead>
        <tbody>
            <?php foreach ($events as $key => $event):
                $model = new Model($event); ?>
            <tr>
            <?php if(!isset($_POST['btn_edit']) || isset($_POST['btn_save'])):?> <!-- display all events -->
                <td><input type="checkbox" class="checkbox" name="event_ids[]" value="<?= $model->event_id()?>"></td>
                <td><?= $model->title() ?></td>
                <td><?= $model->topic_name() ?></td>
                <td><?= $model->topic_description() ?></td>
                <td><?= $model->event_date() ?></td>
                <td><?= $model->speaker_name() ?></td>
                <td><?= $model->building_name() ?></td>
                <td><?= $model->room_name() ?></td>

            <?php else:?> <!-- edit selected events -->
                <td>
                    <?= $model->event_id() ?>
                    <input type="text" name="edit[<?= $model->event_id() ?>][event_id]" value="<?= $model->event_id() ?>" hidden>
                </td>

                <td><input class="form-control" type="text" name="edit[<?= $model->event_id() ?>][title]" value="<?= $model->title() ?>"></td>
                
                <td><?= $model->topic_name() ?></td>

                <td><?= $model->topic_description() ?></td>

                <td><input class="form-control" type="date" name="edit[<?= $model->event_id() ?>][event_date]" value="<?= $model->event_date() ?>"></td>

                <td><select class="custom-select" name="edit[<?= $model->event_id() ?>][speaker_id]">
                    <?php foreach ($speakers as $s): ?>
                    <option value="<?= $s['speaker_id'] ?>" <?= $model->speaker_name()==$s['speaker_name']?'selected':''?>><?= $s['speaker_name'] ?></option>
                    <?php endforeach; ?>
                </select></td>

                <td><select class="custom-select" id="building<?= $model->event_id() ?>" name="edit[<?= $model->event_id() ?>][building_id]">
                    <?php foreach ($buildings as $b): ?>
                    <option value="<?= $b['building_id'] ?>" <?= $model->building_name()==$b['building_name']?'selected':''?>><?= $b['building_name'] ?></option>
                    <?php endforeach; ?>
                </select></td>

                <td><select class="custom-select" id="rooms<?= $model->event_id() ?>" name="edit[<?= $model->event_id() ?>][room_id]">
                    <?php
                    $rooms = get_rooms($db, $model->get_id($db, 'building'));
                    foreach ($rooms as $key => $r): ?>
                    <option value="<?= $r['room_id'] ?>" <?= $model->room_name()==$r['room_name'] ? 'selected' : '' ?>><?= $r['room_name'] ?></option>
                    <?php endforeach; ?>
                </select></td>
            <?php endif; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
        <?php if(!isset($_POST['btn_edit'])):?>
            <button type="submit" class="btn btn-success" name="btn_edit">Edit selected</button>
        <?php else:?>
            <button type="submit" class="btn btn-success" name="btn_save">Save</button>
        <?php endif;?>
    </form>
    <script src="bootstrap.min.js" type="text/javascript"></script>
    <script src="jquery.min.js" type="text/javascript"></script>
    <script src="main.js" type="text/javascript"></script>
</body>
</html>