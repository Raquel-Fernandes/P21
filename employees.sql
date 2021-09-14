-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS 'func_employee';
CREATE TABLE  'func_employee'  (
   'ds_tax_document_cpf'  varchar(11) NOT NULL,
   'ds_full_name'  varchar(255) NOT NULL,
   'ds_tax_document_rg'  varchar(15) NOT NULL,
   'ds_email'  varchar(255) DEFAULT NULL,
   'ds_zip'  int(11) NOT NULL,
   'ds_address'  varchar(255) NOT NULL,
   'ds_number'  varchar(5) NOT NULL,
   'ds_neighborhood'  varchar(50) NOT NULL,
   'ds_city'  varchar(50) NOT NULL,
   'ds_state'  varchar(2) NOT NULL,
   'dt_birthday'  date NOT NULL,
   'ln_photo'  longtext NOT NULL,
   'occupation'  varchar(50) NOT NULL,
   'ds_phone_number_principal'  varchar(15) DEFAULT NULL,
  PRIMARY KEY ( 'ds_tax_document_cpf' )
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

TRUNCATE  'func_employee' ;
INSERT INTO  'func_employee'  ( 'ds_tax_document_cpf' ,  'ds_full_name' ,  'ds_tax_document_rg' ,  'ds_email' ,  'ds_zip' ,  'ds_address' ,  'ds_number' ,  'ds_neighborhood' ,  'ds_city' ,  'ds_state' ,  'dt_birthday' ,  'ln_photo' ,  'occupation' ,  'ds_phone_number_principal' ) VALUES
('27409788984',	'Michelangelo Costa',	'354192206',	'michelangelocosta@galpaoestofados.com.br',	29175776,	'Travessa K',	'567',	'Lagoa de Jacaraípe',	'Serra',	'ES',	'2000-06-07',	'assets/archive/michelangelo.jpeg',	'Digitador',	'2739006405'),
('33060663890',	'Rafael Davi Bernardes',	'458390999',	'rafaeldavi@employees.com',	15802301,	'Rua Oriente Novo',	'460',	'Parque Residencial Agudo Romão II',	'Catanduva',	'SP',	'1988-09-03',	'https://i1.wp.com/socientifica.com.br/wp-content/uploads/2020/08/1532px-Raffaello_Sanzio_-_Guidobaldo_da_Montefeltro_-_WGA18653.jpg?resize=1280%2C1805&ssl=1',	'Escritor',	'17991493834');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS  'func_phone_number' ;
CREATE TABLE  'func_phone_number'  (
   'id_phone'  int(11) NOT NULL AUTO_INCREMENT,
   'ds_phone'  varchar(15) NOT NULL,
   'fk_employee'  varchar(11) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY ( 'id_phone' ),
  KEY  'fk_employee'  ( 'fk_employee' ),
  CONSTRAINT  'func_phone_number_ibfk_1'  FOREIGN KEY ( 'fk_employee' ) REFERENCES  'func_employee'  ( 'ds_tax_document_cpf' )
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

TRUNCATE  'func_phone_number' ;
INSERT INTO  'func_phone_number'  ( 'id_phone' ,  'ds_phone' ,  'fk_employee' ) VALUES
(1,	'17991493851',	'33060663890'),
(2,	'1739531420',	'33060663890'),
(15,	'(27) 98105-0955',	'27409788984'),
(16,	'(27) 98105-0956',	'27409788984');

-- 2020-10-12 17:29:53
