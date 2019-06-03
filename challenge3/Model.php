<?php

class Model{
    protected   $_event_id,
                $_title,
                $_topic_name,
                $_topic_description,
                $_event_date,
                $_speaker_name,
                $_building_name,
                $_room_name,
                $_speaker_id,
                $_building_id,
                $_room_id;

    public function __construct(array $t_array){
        $this->hydrate($t_array);
    }
    public function hydrate(array $data){
        foreach ($data as $key => $value){
            if(empty($value)) $value=NULL;
            $method = 'set_'.$key;
            if (method_exists($this, $method)) $this->$method($value);
        }
    }
    public function save($db){
        $quest = $db->prepare("UPDATE events SET title=?, event_date=?, speaker=?, building=?, room=? WHERE event_id=?;");
        $quest->execute(array($this->_title, $this->_event_date, $this->_speaker_id, $this->_building_id, $this->_room_id, $this->_event_id));
    }
    //getters
    public function event_id(){
        return $this->_event_id;
    }
    public function topic_name(){
        return $this->_topic_name;
    }
    public function title(){
        return $this->_title;
    }
    public function topic_description(){
        return $this->_topic_description;
    }
    public function event_date(){
        return $this->_event_date;
    }
    public function speaker_name(){
        return $this->_speaker_name;
    }
    public function building_name(){
        return $this->_building_name;
    }
    public function room_name(){
        return $this->_room_name;
    }
    public function speaker_id(){
        return $this->_speaker_id;
    }
    public function building_id(){
        return $this->_building_id;
    }
    public function room_id(){
        return $this->_room_id;
    }
    public function get_id($db, $entity){
        $prop = $entity.'_name';
        $column = $entity.'_id';
        $quest = $db->prepare("SELECT $column as id FROM ref_$entity WHERE $prop=?");
        $quest->execute(array($this->$prop()));
        return $quest->fetch(PDO::FETCH_ASSOC)['id'];
    }
    //setters
    public function set_event_id($param){
        $this->_event_id = $param;
    }
    public function set_topic_name($param){
        $this->_topic_name = $param;
    }
    public function set_title($param){
        $this->_title = $param;
    }
    public function set_topic_description($param){
        $this->_topic_description = $param;
    }
    public function set_event_date($param){
        $this->_event_date = $param;
    }
    public function set_speaker_id($param){
        $this->_speaker_id = $param;
    }
    public function set_building_id($param){
        $this->_building_id = $param;
    }
    public function set_room_id($param){
        $this->_room_id = $param;
    }
    public function set_speaker_name($param){
        $this->_speaker_name = $param;
    }
    public function set_building_name($param){
        $this->_building_name = $param;
    }
    public function set_room_name($param){
        $this->_room_name = $param;
    }
}