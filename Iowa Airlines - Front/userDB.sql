SET FOREIGN_KEY_CHECKS=0 
;

/* Drop Tables */

DROP TABLE IF EXISTS `UserName` CASCADE
;

/* Create Tables */

CREATE TABLE `UserName` (
    UserNameID INT(9) NOT NULL AUTO_INCREMENT,
    fullname VARCHAR(40) NOT NULL,
    userName VARCHAR(40) NOT NULL,
    email VARCHAR(100) NOT NULL,
    pass VARCHAR(40) NOT NULL,
    PRIMARY KEY (UserNameID)
);

INSERT INTO
UserName (fullname, userName, pass, email)
VALUE
("My User","myuser","mypassword","myuser@email.com");

INSERT INTO
UserName (fullname, userName, pass, email)
VALUE
("Test User","test","password","test@email.com");