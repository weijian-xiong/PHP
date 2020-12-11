DROP DATABASE IF EXISTS osc_db;

CREATE DATABASE osc_db;

USE osc_db;

DROP TABLE IF EXISTS students;
CREATE TABLE students (
  studentID            INT(5)         NOT NULL   AUTO_INCREMENT,
  firstName            VARCHAR(255)   NOT NULL,
  lastName             VARCHAR(255)   NOT NULL,
  PRIMARY KEY (studentID)
); 

DROP TABLE IF EXISTS attendances;
CREATE TABLE attendances (
  weekNo             INT(5)   NOT NULL,
  studentID          INT(5)   NOT NULL,
  atten              ENUM('P', 'A', 'E', 'L'),
  PRIMARY KEY (weekNo, studentID)
);

DROP TABLE IF EXISTS handouts;
CREATE TABLE handouts (
  weekNo      INT(5)         NOT NULL,
  handout     TEXT           NOT NULL,
  PRIMARY KEY (weekNo)
);

CREATE TABLE assignments (
  weekNo                  INT(5)      NOT NULL,
  question                TEXT        NOT NULL,
  total_marks             INT(5)      NOT NULL,
  due_date                DATE        NOT NULL,
  PRIMARY KEY (weekNo)
);

INSERT INTO students VALUES
(1, 'Lee', 'Lion'),
(2, 'Tom', 'Wills'),
(3, 'Mary', 'Amy'),
(4, 'Jack', 'Water'),
(5, 'John', 'Lee');

INSERT INTO attendances VALUES
(1, 1, 'A'),
(2, 2, 'P'),
(4, 3, 'E'),
(6, 4, 'A'),
(7, 5, 'L');

INSERT INTO handouts VALUES
(1,"This is the handouts of week 1"),
(2,"This is the handouts of week 2"),
(4,"This is the handouts of week 4"),
(10,"This is the handouts of week 10");

Insert Into assignments VALUES
(1,"What is 1+1? ",20,"2020-02-17"),
(2,"What is 1*4? ",10,"2020-02-28"),
(4,"What is 2/2? ",30,"2020-03-28"),
(7,"What is 15%5? ",40,"2020-03-25"),
(11,"What is 100/20-3",50,"2020-04-11");

GRANT SELECT, INSERT, DELETE, UPDATE
ON osc_db.*
TO admin@localhost
IDENTIFIED BY 'pass@word';