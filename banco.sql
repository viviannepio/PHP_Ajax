CREATE DATABASE pweb_ajax;
USE pweb_ajax;

CREATE TABLE USUARIO 
(
  ID_USUARIO int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  NOME varchar(200),
  EMAIL varchar(200),
  SENHA varchar(50)
);

INSERT INTO USUARIO (NOME, EMAIL, SENHA) VALUES 
('Marcelo', 'marcelo868@gmail.com', '868'),
('Helena', 'helena147@gmail.com', '147'),
('Victor', 'victor251@gmail.com', '251'),
('Alice', 'alice654@gmail.com', '654');
