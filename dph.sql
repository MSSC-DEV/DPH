CREATE DATABASE digitalpaymenthub;
USE digitalpaymenthub;

CREATE TABLE IF NOT EXISTS merchants (
	idmerchant int(11) not null auto_increment primary key,
	firstname varchar(30) not null,
	lastname varchar(30) not null,
	merchantemail varchar(50) null,
	merchantphone varchar(15) not null,
	merchantadress varchar(200) null,
	registrationdate datetime default current_timestamp,
	merchantpassword varchar(250) not null
);

CREATE TABLE IF NOT EXISTS businesstype (
	idbusinesstype int(11) not null auto_increment primary key,
	type varchar(30) not null
);

CREATE TABLE IF NOT EXISTS integrations (
	idintegration int(11) not null auto_increment primary key,
	merchantid int(11) not null,
	businessname varchar(30) not null,
	domainename varchar(200) not null,
	businesstypeid int(11) not null,
	successpage varchar(200) not null,
	failurepage varchar(200) not null,
	foreign key (merchantid) references merchants (idmerchant),
	foreign key (businesstypeid) references businesstype (idbusinesstype)
);

CREATE TABLE IF NOT EXISTS mobilemoneyapi (
	idmobilemoney int(11) not null auto_increment primary key,
	mobilemoneyname varchar(50) not null
);

CREATE TABLE IF NOT EXISTS offres (
	idoffre int(11) not null auto_increment primary key,
	mobilemoneyid int(11) not null,
	monthlyprice double not null,
	yearlyprice double not null,
	foreign key (mobilemoneyid) references mobilemoneyapi (idmobilemoney)
);


CREATE TABLE IF NOT EXISTS souscription (
	idsouscription int(11) not null auto_increment primary key,
	offreid int(11) not null,
	integrationid int(11) not null,
	datesouscription datetime not null default current_timestamp,
	note text null,
	expired int(1) not null,
	foreign key (offreid) references offres (idoffre),
	foreign key (integrationid) references integrations (idintegration)
);


CREATE TABLE IF NOT EXISTS transactions (
	idtrans int(11) not null auto_increment primary key,
	integrationid int(11) not null,
	mobilemoneyid int(11) not null,
	invoicenumber varchar(55) not null,
	customermsisdn varchar(15) not null,
	amount double not null,
	datetimetrans datetime not null default current_timestamp,
	currency varchar(5) not null,
	transactionref varchar(55) not null,
	foreign key (integrationid) references integrations (idintegration),
	foreign key (mobilemoneyid) references mobilemoneyapi (idmobilemoney)
);