DROP TABLE IF EXISTS challenge_db.events;

CREATE TABLE challenge_db.events
(
  event_id int PRIMARY KEY,
  topic_id int NOT NULL,
  title varchar(50),
  event_date date,
  speaker varchar(255),
  building varchar(50),
  room varchar(50)
);

INSERT INTO challenge_db.events (`event_id`, `topic_id`) VALUES
(1,1),
(2,1),
(3,1),
(4,1),
(5,2),
(6,2),
(7,2),
(8,3),
(9,4),
(10,4),
(11,4),
(12,5),
(13,3),
(14,7),
(15,6),
(16,6),
(17,4),
(18,1),
(19,3),
(20,4),
(21,7),
(22,3),
(23,6),
(24,6),
(25,2),
(26,3),
(27,4),
(28,5),
(29,6),
(30,7),
(31,5),
(32,3),
(33,4),
(34,6),
(35,2);