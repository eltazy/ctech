CREATE OR REPLACE VIEW challenge_db.vw_events AS
SELECT e.event_id, e.title, t.topic_name, t.topic_description, e.event_date, rs.speaker_name, rb.building_name, rr.room_name from challenge_db.events e
LEFT JOIN challenge_db.topic t on e.topic_id = t.topic_id 
LEFT JOIN challenge_db.ref_speaker rs on e.speaker = rs.speaker_id
LEFT JOIN challenge_db.ref_building rb on e.building = rb.building_id
LEFT JOIN challenge_db.ref_room rr on e.room = rr.room_id;