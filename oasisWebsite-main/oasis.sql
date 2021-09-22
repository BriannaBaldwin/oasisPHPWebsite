#****************************************************
# Script to create oasis database and add test data. 
# Name 	Date  		Description
# Brianna	8/27/2021	Initial deployment
#
#****************************************************
DROP DATABASE IF EXISTS oasis;
CREATE DATABASE oasis;

USE oasis;

# create objects
CREATE TABLE IF NOT EXISTS volunteer
(
	volunteer_id	INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	first_name 	VARCHAR(60) NOT NULL,
	last_name	VARCHAR(60) NOT NULL,
	email_address 	VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS form_submission
(
	submission_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,	
	email	VARCHAR(100) NOT NULL,
	phone	VARCHAR(15) NOT NULL,
	country VARCHAR(50) NOT NULL,
	contact_by VARCHAR(50) NULL,
	tos 	tinyint NOT NULL,	
	comments VARCHAR (999) NOT NULL,
	submission_date DATETIME NOT NULL,
	volunteer_id	INT NOT NULL,
	FOREIGN KEY (volunteer_id) REFERENCES volunteer(volunteer_id)
);

CREATE TABLE IF NOT EXISTS administrators (
  adminID           INT            NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(255)   NOT NULL,
  firstName         VARCHAR(60),
  lastName          VARCHAR(60),
  PRIMARY KEY (adminID)
);
# insert statements for volunteer table
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('Jane', 'Doe', 'janedoe@oasis.com');
	
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('Mickey', 'Mouse', 'mickeymouse@oasis.com');
	
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('Steven', 'Universe', 'stevenuniverse@oasis.com');
	
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('Jake', 'Dog', 'jakedog@oasis.com');

INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('Finn', 'Human', 'finnhuman@oasis.com');
	
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('Good', 'Boy', 'goodboy@oasis.com');
	
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('Red', 'Rover', 'redrover@oasis.com');
	
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('Lightning', 'McQuees', 'lightningmcqueen@oasis.com');
	
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('Bonnie', 'Bubblegum', 'bonniebubblegum@oasis.com');
	
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('Strawberry', 'Shortcake', 'strawberryshortcake@oasis.com');
	
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('American', 'Eagle', 'americaneagle@oasis.com');
	
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('Ash', 'Ketchum', 'ashketchum@oasis.com');
	
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('Sloppy', 'Joe', 'sloppyjoe@oasis.com');
	
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('Buggs', 'Bunny', 'buggsbunny@oasis.com');
	
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('Michael', 'Jordan', 'michaeljordan@oasis.com');
	
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('Lola', 'Bunny', 'lolabunny@oasis.com');
	
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('John', 'Snow', 'johnsnow@oasis.com');
	
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('Hiccup', 'Haddock', 'hiccuphaddocks@oasis.com');
	
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('Luke', 'Skywalker', 'lukeskywalker@oasis.com');
	
INSERT INTO volunteer
	(first_name, last_name, email_address)
VALUES
	('Han', 'Solo', 'hansolo@oasis.com');
	
	

INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('bobbyjoe@email.com', '1234567890', 'USA', 'phone', 1, 'Hello', NOW(), 1);

INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('henriburns@email.com', '3344575883', 'USA', 'email', 1, 'I am henri', NOW(), 1);
	
INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('patienceharding@email.com', '8132153522', 'USA', 'text', 1, 'Good Job', NOW(), 1);
	
INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('ebrahimrhodes@email.com', '3603461787', 'Canada', 'phone', 0, 'Haha youve been hacked', NOW(), 1);
	
INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('nellabray@email.com', '3135328012', 'Canada', 'phone', 1, 'Im from canada', NOW(), 1);
	
INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('annalisesteele@email.com', '4193821120', 'Canada', 'dont contact', 1, 'dont try and call me', NOW(), 1);
	
INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('kerifuentes@email.com', '5183734800', 'Mexico', 'text', 1, 'im from mexico', NOW(), 1);
	
INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('kylaochoa@email.com', '4346658071', 'Mexico', 'phone', 1, 'call me as soon as possible', NOW(), 1);
	
INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('chloecampos@email.com', '6185599381', 'Mexico', 'phone', 1, 'i have a computer', NOW(), 1);
	
INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('rhiannanguzman@email.com', '6304357272', 'USA', 'dont contact', 1, 'i want to watch Naruto', NOW(), 1);
	
INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('florencecamacho@email.com', '6463313428', 'USA', 'dont contact', 1, 'im over halfway there!', NOW(), 1);
	
INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('opalwarren@email.com', '7692201775', 'Mexico', 'email', 1, 'email only. i dont have a phone', NOW(), 1);
	
INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('kobytalbot@email.com', '4709997173', 'Canada', 'email', 1, 'i saw a moose yesterday', NOW(), 1);
	
INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('leannahume@email.com', '3233945667', 'Mexico', 'text', 1, 'im snorkeling so just text me', NOW(), 1);
	
INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('esagreaves@email.com', '4329784862', 'USA', 'dont contact', 1, 'i just wanted to send a message to someone', NOW(), 1);
	
INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('finnroach@email.com', '3349928035', 'Canada', 'text', 1, 'i want to live in mexico', NOW(), 1);
	
INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('mylieduncan@email.com', '8134056820', 'USA', 'phone', 1, 'im going dancing tonight', NOW(), 1);
	
INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('juiletsalter@email.com', '3368779559', 'USA', 'email', 0, 'hehehe i turned off javascript', NOW(), 1);
	
INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('millicentbegum@email.com', '7474007224', 'mexico', 'phone', 1, 'i want to live in the USA', NOW(), 1);
	
INSERT INTO form_submission
	(email, phone, country, contact_by, tos, comments, submission_date, volunteer_id)
VALUES
	('sylviawood@email.com', '2093842634', 'USA', 'text', 1, 'im the last on the list', NOW(), 1);
