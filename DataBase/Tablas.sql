CREATE DATABASE ANGELDB
USE ANGELDB

--CREACION DE TABLAS
--------------------------------------------------------------------------------------------------------------------------------------
CREATE TABLE CLIENTES(
    ID INT NOT NULL,
    NOMBRE VARCHAR(15),
    APELLIDO VARCHAR(20),
    CUMPLE DATE,
    CONTACTO VARCHAR(10),
    PRIMARY KEY(ID)
)


CREATE TABLE INVENTARIO(
    ID INT NOT NULL,
    NOMBRE VARCHAR(15),
    MARCA VARCHAR(20),
    EXPIRA DATE,
    CANT NUMERIC,
    PRECIO NUMERIC,
    PRIMARY KEY(ID)
)

delete from INVENTARIO
SELECT * FROM CLIENTES;
SELECT * FROM INVENTARIO;


