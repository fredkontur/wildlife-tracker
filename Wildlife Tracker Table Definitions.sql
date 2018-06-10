-- Use this to create the tables for the Wildlife Tracker System

SET FOREIGN_KEY_CHECKS = 0;

-- Database of user-entered wildlife sightings
DROP TABLE IF EXISTS `user_wildlife`;
CREATE TABLE user_wildlife (
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    animal_group VARCHAR(255) NOT NULL,
    keyword_1 VARCHAR(255) NOT NULL,
    keyword_2 VARCHAR(255) NOT NULL,
    keyword_3 VARCHAR(255) NOT NULL,
    description TEXT,
    quantity INT(11) NOT NULL,
    date_spotted DATE NOT NULL,
    zipcode INT(11),
    latitude DECIMAL(10,7) NOT NULL,
    longitude DECIMAL(10,7) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=innodb DEFAULT CHARSET=utf8;

-- Database of expert-entered wildlife information
DROP TABLE IF EXISTS `expert_wildlife`;
CREATE TABLE expert_wildlife (
    id INT(11) NOT NULL AUTO_INCREMENT,
    scientific_name VARCHAR(255) NOT NULL,
    common_name VARCHAR(255) NOT NULL,
    appearance TEXT NOT NULL,
    animal_range TEXT NOT NULL,
    habits TEXT NOT NULL,
    diet TEXT NOT NULL,
    migration_routes TEXT NOT NULL,
    mating_season VARCHAR(255) NOT NULL,
    population BIGINT NOT NULL,
    endangered_status VARCHAR(255) NOT NULL,
    preservation_efforts TEXT NOT NULL,
    articles TEXT,
    PRIMARY KEY (id),
    UNIQUE KEY (scientific_name, common_name)
) ENGINE=innodb DEFAULT CHARSET=utf8;

-- Database of user-entered human activity sightings
DROP TABLE IF EXISTS `user_human_activity`;
CREATE TABLE user_human_activity ( 
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    activity_date DATE NOT NULL,
    locID INT(11) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (locID) REFERENCES locations(id)
    ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=innodb DEFAULT CHARSET=utf8;

-- Database of users’ photos
DROP TABLE IF EXISTS `SE_photo`;
CREATE TABLE SE_photo ( 
    id INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    corrected_name VARCHAR(255) NOT NULL,
    photo MEDIUMBLOB NOT NULL,
    PRIMARY KEY (id)
) ENGINE=innodb DEFAULT CHARSET=utf8;

-- Database of usernames and passwords
DROP TABLE IF EXISTS `users`;
CREATE TABLE users ( 
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (username)
) ENGINE=innodb DEFAULT CHARSET=utf8;

-- Database of locations
DROP TABLE IF EXISTS `locations`;
CREATE TABLE locations (
    id INT(11) NOT NULL AUTO_INCREMENT,
    formattedAddress VARCHAR(255) NOT NULL,
    latitude DECIMAL(10,7) NOT NULL,
    longitude DECIMAL(10,7) NOT NULL,
    PRIMARY KEY (id)
) ENGINE=innodb DEFAULT CHARSET=utf8;

-- Database of which locations users have saved
DROP TABLE IF EXISTS `user_locs`;
CREATE TABLE user_locs (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    locID INT(11) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (username) REFERENCES users(username)
    ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (locID) REFERENCES locations(id)
    ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=innodb DEFAULT CHARSET=utf8;