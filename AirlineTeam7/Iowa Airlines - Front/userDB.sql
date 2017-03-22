SET FOREIGN_KEY_CHECKS=0 
;

/* Drop Tables */

DROP TABLE IF EXISTS `UserName` CASCADE
;

/* Create Tables */

CREATE TABLE `UserName` (
    UserNameID INT(9) NOT NULL AUTO_INCREMENT,
    
    user VARCHAR(40) NOT NULL,
    
    pass VARCHAR(40) NOT NULL,
    PRIMARY KEY (UserNameID)
);

INSERT INTO
UserName (user, pass)
VALUE
("myuser","mypassword");

INSERT INTO
UserName (user, pass)
VALUE
("test","password");