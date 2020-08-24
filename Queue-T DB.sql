SHOW DATABASES;
CREATE DATABASE queue_t;
DROP DATABASE queue_t;
USE queue_t;
SHOW TABLES;

DELETE FROM USER WHERE userID = 1;

SELECT * FROM USER;
SELECT * FROM BUSINESS;
SELECT * FROM BUSINESS_HOURS;
SELECT * FROM BUSINESS_CATEGORY;
SELECT * FROM SERVICE_CATEGORY;
SELECT * FROM SERVICE;

DESCRIBE USER;
DESCRIBE BUSINESS;
DESCRIBE BUSINESS_HOURS;
DESCRIBE SCHEDULE;

INSERT INTO BUSINESS_CATEGORY VALUES(NULL, 'Health', NOW(), NOW());
INSERT INTO BUSINESS_CATEGORY VALUES(NULL, 'Grooming', NOW(), NOW());
INSERT INTO BUSINESS_CATEGORY VALUES(NULL, 'Pets', NOW(), NOW());

INSERT INTO SERVICE_CATEGORY VALUES(NULL, 'Dental', NOW(), NOW());
INSERT INTO SERVICE_CATEGORY VALUES(NULL, 'Mental', NOW(), NOW());
INSERT INTO SERVICE_CATEGORY VALUES(NULL, 'Pedia', NOW(), NOW());


#1. User========================================================================================================================================
CREATE TABLE USER( 
	userID INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(64) NOT NULL,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    middleName VARCHAR(50) NOT NULL,
    birthday DATE NOT NULL,
    gender ENUM('M', 'F') NOT NULL,
    email VARCHAR(50) NOT NULL,
    contactNum VARCHAR(15) NOT NULL,
    createdAt TIMESTAMP NOT NULL,
    updatedAt TIMESTAMP NOT NULL
); #yes bro not null tanan

#2. Business Category====================================================================================================================================
CREATE TABLE BUSINESS_CATEGORY(
	businessCategoryID INT PRIMARY KEY AUTO_INCREMENT,
    businessCategory VARCHAR(50) NOT NULL UNIQUE,
    createdAt TIMESTAMP NOT NULL,
    updatedAt TIMESTAMP NOT NULL
);

#3. Service Category=====================================================================================================================================
CREATE TABLE SERVICE_CATEGORY(
	serviceCategoryID INT PRIMARY KEY AUTO_INCREMENT,
    serviceCategory VARCHAR(50) NOT NULL UNIQUE,
    createdAt TIMESTAMP NOT NULL,
    updatedAt TIMESTAMP NOT NULL
);

#4. Business Hours=====================================================================================================================================
CREATE TABLE BUSINESS_HOURS(
	businessHoursID INT PRIMARY KEY AUTO_INCREMENT,
	
    monday BOOL NOT NULL,
	tuesday BOOL NOT NULL,
	wednesday BOOL NOT NULL,
	thursday BOOL NOT NULL,
	friday BOOL NOT NULL,
	saturday BOOL NOT NULL,
	sunday BOOL NOT NULL,
	scheduleName VARCHAR(30),
  
	businessOpen TIME NOT NULL,
	businessClose TIME NOT NULL,
	lunchStart TIME NOT NULL,
	lunchEnd TIME NOT NULL, 
    
    createdAt TIMESTAMP NOT NULL,
    updatedAt TIMESTAMP NOT NULL
);

#5. Business=====================================================================================================================================
CREATE TABLE BUSINESS(
	businessID INT PRIMARY KEY AUTO_INCREMENT,
    businessName VARCHAR(50) UNIQUE NOT NULL,
    userID INT,
	FOREIGN KEY (userID) REFERENCES USER(userID) 
		ON DELETE SET NULL 
		ON UPDATE SET NULL,
	businessHoursID INT,
    FOREIGN KEY (businessHoursID) REFERENCES BUSINESS_HOURS (businessHoursID) 
		ON DELETE SET NULL 
        ON UPDATE CASCADE,
	businessCategoryID INT,
    FOREIGN KEY (businessCategoryID) REFERENCES BUSINESS_CATEGORY(businessCategoryID)
		ON DELETE SET NULL 
		ON UPDATE CASCADE,
	serviceCategoryID INT,
    FOREIGN KEY (serviceCategoryID) REFERENCES SERVICE_CATEGORY(serviceCategoryID)
		ON DELETE SET NULL 
		ON UPDATE CASCADE,
	address VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
	contactNum VARCHAR(15) NOT NULL,
    description VARCHAR(255),
    createdAt TIMESTAMP NOT NULL,
    updatedAt TIMESTAMP NOT NULL
);

#6. Service=====================================================================================================================================
CREATE TABLE SERVICE(
	serviceID INT PRIMARY KEY AUTO_INCREMENT,
    serviceName VARCHAR(50) NOT NULL,
    serviceDuration TIME,
    cleaningDuration TIME, #[note: time 'Cleaning before next person']
	startingPrice FLOAT,
	endingPrice FLOAT,
    maxClients INT NOT NULL,
	description VARCHAR(255),

    createdAt TIMESTAMP NOT NULL,
    updatedAt TIMESTAMP NOT NULL
);

#7. Services Offered=====================================================================================================================================
CREATE TABLE SERVICES_OFFERED(
	serviceOfferedID INT PRIMARY KEY AUTO_INCREMENT,
	businessID INT,
	FOREIGN KEY (businessID) REFERENCES BUSINESS(businessID)
		ON DELETE SET NULL 
		ON UPDATE SET NULL,
	serviceID INT,
	FOREIGN KEY (serviceID) REFERENCES SERVICE(serviceID)
		ON DELETE SET NULL 
		ON UPDATE CASCADE,

	createdAt TIMESTAMP NOT NULL,
	updatedAt TIMESTAMP NOT NULL
);

#8. Worker=====================================================================================================================================
CREATE TABLE WORKER(
	workerID INT PRIMARY KEY AUTO_INCREMENT,
	firstName VARCHAR(50),
	lastName VARCHAR(50),

	createdAt TIMESTAMP NOT NULL,
	updatedAt TIMESTAMP NOT NULL
);

#9. Employee=====================================================================================================================================
CREATE TABLE EMPLOYEE(
	employeeID INT PRIMARY KEY AUTO_INCREMENT,
	serviceOfferedID INT,
    FOREIGN KEY (serviceOfferedID) REFERENCES SERVICES_OFFERED (serviceOfferedID)
		ON DELETE SET NULL
        ON UPDATE CASCADE,
	workerID INT,
    FOREIGN KEY (workerID) REFERENCES WORKER (workerID)
		ON DELETE SET NULL
        ON UPDATE CASCADE,

	isActive BOOLEAN,
	createdAt TIMESTAMP NOT NULL,
	updatedAt TIMESTAMP NOT NULL
);

#10. Schedule=====================================================================================================================================
CREATE TABLE SCHEDULE(
	scheduleID INT PRIMARY KEY AUTO_INCREMENT,
    workerID INT,
	FOREIGN KEY (workerID) REFERENCES WORKER (workerID)
		ON DELETE SET NULL ON UPDATE CASCADE,
	timeStart TIME,
	timeEnd TIME,

	isOpen BOOL, # [note: 'If true, open or free schedule']
	createdAt TIMESTAMP NOT NULL,
	updatedAt TIMESTAMP NOT NULL
);

#11. Appointment=====================================================================================================================================
CREATE TABLE APPOINTMENT(
	appointmentID INT PRIMARY KEY AUTO_INCREMENT,
	userID INT,
    FOREIGN KEY (userID) REFERENCES USER (userID)
		ON DELETE SET NULL
        ON UPDATE CASCADE,

	scheduleID INT,
    FOREIGN KEY (scheduleID) REFERENCES SCHEDULE (scheduleID)
		ON DELETE SET NULL
        ON UPDATE CASCADE,
	serviceID INT,
    FOREIGN KEY (serviceID) REFERENCES SERVICE (serviceID)
		ON DELETE SET NULL 
        ON UPDATE CASCADE,
    
	isServing BOOLEAN, #[note: 'If false, either waiting or done'],
	isActive BOOLEAN, #[note: 'If false it is cancelled'],
	createdAt TIMESTAMP NOT NULL,
	updatedAt TIMESTAMP NOT NULL
);
