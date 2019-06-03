DROP TABLE IF EXISTS challenge_db.topic;

CREATE TABLE challenge_db.topic
(
  topic_id int PRIMARY KEY,
  topic_name varchar(100) NOT NULL,
  topic_description varchar(255) NOT NULL
);

INSERT INTO challenge_db.topic VALUES
(1, 'Web Programming', 'Design and development of applications available on the internet'),
(2, 'Game Theory', 'The study of mathematical models of conflict and cooperation between intelligent rational decision-makers'),
(3, 'Algorithms', 'Sequential and parallel computational procedures for solving a wide range of problems'),
(4, 'Computer Vision', 'Algorithms for identifying three-dimensional objects from a two-dimensional picture'),
(5, 'Cryptography', 'Applies results from complexity, probability, algebra and number theory to invent and break codes, and analyze the security of cryptographic protocols'),
(6, 'Structured Storage', 'Non-relational databases such as NoSQL databases'),
(7, 'Data Mining', 'Study of algorithms for searching and processing information in documents and databases');