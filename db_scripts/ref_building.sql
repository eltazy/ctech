DROP TABLE IF EXISTS challenge_db.ref_building;

CREATE TABLE challenge_db.ref_building
(
  building_id int PRIMARY KEY,
  building_name varchar(50) NOT NULL
);

INSERT INTO challenge_db.ref_building VALUES
(1, '4567 Carroll'),
(2, '2243 Frederick'),
(3, '4306 Charles'),
(4, '9907 Kent'),
(5, '703 Talbot'),
(6, '104 Washingtion');