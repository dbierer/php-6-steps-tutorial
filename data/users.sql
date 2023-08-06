PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  first_name TEXT,
  last_name TEXT,
  dob TEXT
);
INSERT INTO users VALUES(1,'Barney','Rubble','00-00-04');
INSERT INTO users VALUES(2,'Betty','Rubble','00-00-05');
INSERT INTO users VALUES(3,'Fred','Flintstone','00-00-01');
INSERT INTO users VALUES(4,'Wilma','Flintstone','00-00-02');
DELETE FROM sqlite_sequence;
INSERT INTO sqlite_sequence VALUES('users',5);
COMMIT;
