SET FOREIGN_KEY_CHECKS=0 
;

/* Drop Tables */

DROP TABLE IF EXISTS `UserName` CASCADE
;

/* Create Tables */

CREATE TABLE `UserName` (
    UserNameID INT(9) NOT NULL AUTO_INCREMENT,
    userName VARCHAR(40) NOT NULL,
    pass VARCHAR(40) NOT NULL,
    PRIMARY KEY (UserNameID)
);

INSERT INTO
UserName (userName, pass)
VALUE
("myuser","mypassword");

INSERT INTO
UserName (userName, pass)
VALUE
("test","password");