DROP TABLE IF EXISTS challenge_db.ref_room;

CREATE TABLE challenge_db.ref_room
(
  room_id int PRIMARY KEY,
  room_name varchar(50) NOT NULL
);

INSERT INTO challenge_db.ref_room VALUES
(1, '101'),
(2, '102'),
(3, '203'),
(4, '205a'),
(5, '205b'),
(6, '111'),
(7, '112'),
(8, '113'),
(9, '114'),
(10, '115'),
(11, 'A'),
(12, 'B'),
(13, 'C'),
(14, 'Langford Hall'),
(15, 'Ashley Hall'),
(16, 'Conference Room 1'),
(17, 'Conference Room 2'),
(18, '1st Floor Conference Room'),
(19, '2nd Floor Conference Room'),
(20, '2nd Floor Meeting Area');