CHANNELING_SYSTEM;
ChannelCenter;

CREATE DATABASE CHANNELING_SYSTEM;

USE CHANNELING_SYSTEM;

CREATE TABLE ChannelCenter(
	CenterID char(6),
	Name varchar(50),
	Lacation varchar(125),	

	PRIMARY KEY(CenterID)
);


CREATE TABLE Facility(
	CenterID char(6),
	Facility varchar(200),

	PRIMARY KEY(CenterID,Facility),
	FOREIGN KEY(CenterID) REFERENCES ChannelCenter(CenterID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);


CREATE TABLE CenterContacts(
	CenterID char(6),
	Contact varchar(30),

	PRIMARY KEY(CenterID,Contact),
	FOREIGN KEY(CenterID) REFERENCES ChannelCenter(CenterID)
	ON UPDATE CASCADE
    ON DELETE CASCADE

);


CREATE TABLE Doctor(
	DoctorID char(8),
	Name varchar(50),
	Speciality varchar(75),
	Gender char(1),
	Age int,

	PRIMARY KEY(DoctorID)
);


CREATE TABLE DocContacts(
	DoctorID char(8),
	DocContact varchar(30),

	PRIMARY KEY(DoctorID,DocContact),
	FOREIGN KEY(DoctorID) REFERENCES Doctor(DoctorID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

CREATE TABLE DocQualification(
	DoctorID char(8),
	DQualification varchar(50),

	PRIMARY KEY(DoctorID,DQualification),
	FOREIGN KEY(DoctorID) REFERENCES Doctor(DoctorID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
); 

CREATE TABLE Visits(
	DoctorID char(8),
	CenterID char(6),
	Room varchar(20),
	VTime time,
	VDate date,

	PRIMARY KEY(DoctorID,CenterID),
	FOREIGN KEY(CenterID) REFERENCES ChannelCenter(CenterID)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
	FOREIGN KEY(DoctorID) REFERENCES Doctor(DoctorID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

CREATE TABLE Appointment(
	AppID varchar(10),
	PName varchar(50),
	PAddres varchar(100),
	PContact  char(10),
	PGender char(1),
	PAge int,

	CenterID char(6), 
	DoctorID char(8),
	AppDate date,
	AppTime time,

	PRIMARY KEY(AppID),
	FOREIGN KEY(CenterID) REFERENCES ChannelCenter(CenterID)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
	FOREIGN KEY(DoctorID) REFERENCES Doctor(DoctorID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

INSERT INTO ChannelCenter VALUES 
('C001','Asiri Medical','62 W.A.Silva Mw Wellawatte, Colombo 06'),
('C002','Asiri Surgical','208/1 Kolonnawa Rd. Gothatuwa, New Town'),
('C003','Asia Hospital','218 Cotta Rd Borella ,Colombo 08'),
('C004','The Central - Colombo 7','No 129 S De S. Jayasinghe Mw Kohuwela'),
('C005','Browns Hospitals','No 43 Mahabage Rd Ragama'),
('C006','JJ Channel Centre ','No25  Peradeniya Rd'),
('C007','Nawinna Medicare','408, High Level Road Maharagama'),
('C008','Healan Hospital','NO 45 Goodshed Rd Ratnapura'),
('C009','Park Hospital','186 Park Rd Colombo 05'),
('C010','CH Care ','158 G  Street ,Panadura'),
('C011','ChannelMe Channel Centre','No 54 E Kandy Road Kalagedihena'),
('C012','Durdans Hospital','3 Alfred Place Colombo 03'),
('C013','ABC Care Center','74/5 Kotugoalla weediya Kandy'),
('C014','Kings Hospital Colombo','18A Muhandiram E D Dabare Mw Narahenpita'),
('C015','Hemas Hospital','624 Anuradhapura Rd Dambulla'),
('C016','Lanka Hospital PLC','578 Elvitigala Mw Narahenpita Colombo 05'),
('C017','J Fernando Hospital','78 J Street Navalpitiya'),
('C018','Ninewells Hospital','55/1 Kirimandala Mw Narahenpita Colombo 05'),
('C019','Suwasewana Medicare','07 Main St Anuradhapura'),
('C020','Sethma Hospitals (Pvt) Ltd','P O Box 99/40 Sangaraja Mawatha Kandy');

INSERT INTO CenterContacts VALUES 
('C001','0352222577'),
('C001','medicare@gmail.com'),
('C002','0662284735'),
('C002','slmedi@gmail.com'),
('C003','0112692753'),
('C004','0212222263'),
('C005','0112490290'),
('C006','0114308877'),
('C007','0114312777'),
('C008','0710308877'),
('C009','0212219777'),
('C010','0212219888'),
('C011','0452222399'),
('C012','0112325806'),
('C012','themediacl@yahoo.com'),
('C013','0662283255'),
('C014','0112696224'),
('C014','miracal@gmail.com'),
('C015','0342257891'),
('C016','0702148166'),
('C017','0662231052'),
('C018','0718313898'),
('C019','0779073042'),
('C020','0112238082');


INSERT INTO Facility VALUES 
('C001','ECG'),
('C001','Ultrasound'),
('C001','X-Ray'),
('C002','Blood Testing'),
('C002','X-Ray'),
('C003','Blood Testing'),
('C003','ECG'),
('C003','ICU'),
('C003','X-Ray'),
('C004','X-Ray'),
('C006','Blood Testing'),
('C006','X-Ray'),
('C007','ECG'),
('C007','X-Ray'),
('C008','X-Ray'),
('C010','Ultrasound'),
('C010','X-Ray'),
('C011','Ultrasound'),
('C011','X-Ray'),
('C012','X-Ray'),
('C013','Blood Testing'),
('C013','X-Ray'),
('C014','X-Ray'),
('C015','ECG'),
('C015','Ultrasound'),
('C015','X-Ray'),
('C016','Blood Testing'),
('C016','X-Ray'),
('C017','Ultrasound'),
('C017','X-Ray'),
('C018','X-Ray'),
('C019','Ultrasound'),
('C019','X-Ray'),
('C020','X-Ray');

INSERT INTO Doctor VALUES 
('D00001','Tharaka Dushyan','Nutritionist','M',36),
('D00002','Abhirami Subramaniam','General Surgeon','F',29),
('D00003','Thilanka Kashyapa Perera','Ophthalmologist','M',37),
('D00004','Chamila Prabhath Shyamike','General Surgeon','M',28),
('D00005','Champika Silva','General Surgeon','M',45),
('D00006','Akila Sujith Rathnayake','General Surgeon','M',43),
('D00007','B.G.N.Rathnasena','General Surgeon','M',39),
('D00008','Chandima Amarasena','Cardiothoracic Surgeon','M',52),
('D00009','P.H.G.Ranasinghe','Cardiothoracic Surgeon','M',54),
('D00010','H.K.De S.Kularatne','Neuro Surgeon','M',56),
('D00011','K.Chandra Jayasuriya','ENT Surgeon','F',39),
('D00012','P R Rabel','Radiologist','M',36),
('D00013','S.U.W.Wadanamby','Neuro Surgeon','M',48),
('D00014','Thanoj Fernando','Vascular Surgeon','M',46),
('D00015','Sunethra Senanayake','Neurologist','F',34),
('D00016','K.Thirumawalawa','General Physician','M',36),
('D00017','Siwagnanam','General Physician','F',56),
('D00018','G.C.A.U.Patabedige','Microbiologist','F',58),
('D00019','Sepalika Mendis','Cardiologist','F',46),
('D00020','BNT Fernando','Cardiologist','M',30);

INSERT INTO DocContacts VALUES 
('D00001','0123456785'),
('D00002','0572222469'),
('D00003','0212224051'),
('D00004','0112435733'),
('D00004','0352222417'),
('D00006','0812222041'),
('D00007','0777704706'),
('D00008','0113180841'),
('D00008','0662230027'),
('D00010','0512222334'),
('D00011','0776671128'),
('D00012','0112961300'),
('D00013','0212220860'),
('D00014','0112889922'),
('D00015','0775579576'),
('D00016','0412224820'),
('D00016','0662222400'),
('D00018','0772385194'),
('D00019','0772217383'),
('D00020','0764828335');

INSERT INTO DocQualification VALUES 
('D00001','MBBS'),
('D00001','MCM'),
('D00002','MBBS'),
('D00003','MBBS'),
('D00003','MSurg'),
('D00004','MBBS'),
('D00005','DSurg'),
('D00005','MBBS'),
('D00006','MBBS'),
('D00007','ChM'),
('D00007','MBBS'),
('D00007','MPhil'),
('D00008','MBBS'),
('D00009','MBBS'),
('D00009','MCM'),
('D00010','ChM'),
('D00010','MBBS'),
('D00011','MBBS'),
('D00011','MPhil'),
('D00012','ChM'),
('D00012','MBBS'),
('D00013','MBBS'),
('D00014','ChM'),
('D00014','MBBS'),
('D00015','MBBS'),
('D00016','ChM'),
('D00016','MBBS'),
('D00017','MBBS'),
('D00017','MCM'),
('D00018','ChM'),
('D00018','MBBS'),
('D00019','MBBS'),
('D00020','MBBS'),
('D00020','MCM');

INSERT INTO Visits VALUES 
('D00001','C001','Room11','08:00:00','2020-12-06'),
('D00001','C004','Room20','16:00:00','2020-12-14'),
('D00002','C002','Room24','16:00:00','2020-12-06'),
('D00003','C003','Room3','16:30:00','2020-11-03'),
('D00003','C012','Room12','13:00:00','2020-10-03'),
('D00004','C001','Room16','16:00:00','2020-12-31'),
('D00004','C004','Room4','14:00:00','2020-04-14'),
('D00007','C001','Room7','17:00:00','2020-10-12'),
('D00008','C002','Room8','17:30:00','2020-11-12'),
('D00009','C003','Room9','14:00:00','2020-11-03'),
('D00010','C010','Room15','10:00:00','2020-12-25'),
('D00010','C018','Room10','13:30:00','2020-12-14'),
('D00011','C005','Room5','08:30:00','2020-11-03'),
('D00011','C010','Room11','14:30:00','2020-12-06'),
('D00012','C009','Room14','14:00:00','2020-09-15'),
('D00013','C018','Room13','09:00:00','2020-12-14'),
('D00016','C011','Room16','16:00:00','2020-11-04'),
('D00017','C012','Room17','17:00:00','2020-11-03'),
('D00018','C015','Room18','17:30:00','2020-06-14'),
('D00019','C016','Room19','17:30:00','2020-11-03');


INSERT INTO Appointment VALUES 
('A1','Jack Wikramsinha','No.3 Street2 Colombo','0112527744','M',12,'C003','D00013','2020-12-14','09:00:00'),
('A10','Imash B Disanayaka','No.12 Street1 Paliyagoda','0112486434','M',22,'C004','D00012','2020-09-15','14:00:00'),
('A11','Siri Angel','No.111 Street6 Kurunagala','0989090956','M',30,'C017','D00004','2020-12-31','16:00:00'),
('A12','Beauty F Kooler','No.24 Street2 Kandy','0764946684','M',16,'C011','D00002','2020-12-06','16:00:00'),
('A2','R.M. Roopawathi','No.206 Street4 Gampaha','0716598648','F',37,'C012','D00011','2020-11-03','08:30:00'),
('A3','K.D.M. tiger','No.29 Street3 Badulla','0729868646','M',56,'C010','D00001','2020-12-06','08:00:00'),
('A33','Don F Latmer','No.25 Street2 Mathara','0114897642','M',34,'C003','D00009','2020-11-03','14:00:00'),
('A4','Sam Abewardana ','No.1 Street1 Kurunagala','0112325372','M',34,'C001','D00011','2020-12-06','14:30:00'),
('A42','G.Gillai','No.20 Street3 Gampaha','0115948776','F',28,'C015','D00018','2020-06-14','17:30:00'),
('A45','Udaree K walwita','No.10 Street6 Anuradapura','0112556499','F',27,'C016','D00019','2020-11-03','17:30:00'),
('A47','K.D.H.Lal','No.2 Street12 Rathnapura','0786565688','M',48,'C018','D00001','2020-12-14','16:00:00'),
('A48','Rooper S Donlad','No.36 Street3 Kuliyapitiya','0112911450','M',29,'C001','D00017','2020-11-03','17:00:00'),
('A5','D.M. Walisundara','No.25 Street2 Mathara','0779482264','F',36,'C010','D00004','2020-04-14','14:00:00'),
('A52','K.M. Kulasooriya','No.45 Street2 Kandy','0715583266','F',67,'C018','D00010','2020-12-14','13:30:00'),
('A68','Jane Fernando','No.2 Street3 Gampaha','0115756321','F',26,'C005','D00010','2020-12-25','10:00:00'),
('A69','K.Justin','No.100 Street64 Anuradapura','0753659485','M',30,'C012','D00003','2020-11-03','16:30:00'),
('A7','Silly Bimily','No.2 Street4 Negombo','0114290869','F',36,'C006','D00016','2020-11-04','16:00:00'),
('A8','Jill Rock','No.2 Street1 Colombo','0774561234','M',23,'C002','D00003','2020-10-03','13:00:00'),
('A9','J.S.Joopat','No.108 Street1 Kurunagala','0706592956','M',59,'C009','D00007','2020-10-12','17:00:00'),
('A99','Chery S Doom','No.2 Street6 Galle','0112420696','M',45,'C002','D00008','2020-11-12','17:30:00');


SHOW TABLES;






