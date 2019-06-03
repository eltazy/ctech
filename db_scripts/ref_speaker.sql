DROP TABLE IF EXISTS challenge_db.ref_speaker;

CREATE TABLE challenge_db.ref_speaker
(
  speaker_id int PRIMARY KEY,
  speaker_name varchar(50) NOT NULL
);

INSERT INTO challenge_db.ref_speaker VALUES
(1, 'Allman'),
(2, 'Bergeron'),
(3, 'Ellington'),
(4, 'Kay'),
(5, 'Penn'),
(6, 'Peters'),
(7, 'Renteria'),
(8, 'Rhea'),
(9, 'Upton'),
(10, 'Valencia'),
(11, 'Waldrop'),
(12, 'Yates'),
(13, 'Zook');