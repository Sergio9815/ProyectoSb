CREATE DATABASE ANGELDB
USE ANGELDB

--CREACION DE PROCEDIMIENTOS Y FUNCIONES
--------------------------------------------------------------------------------------------------------------------------------------

GO 
CREATE PROCEDURE SP_CLIENTES_INSCRITOS_UNO(
    @ID INT
)AS
BEGIN
    SELECT C.ID, C.NOMBRE, C.APELLIDO, C.CUMPLE, C.CONTACTO
    FROM CLIENTES C 
    WHERE C.ID = @ID
END


GO 
CREATE PROCEDURE SP_PRODUCTOS_UNO(
    @ID INT
)AS
BEGIN
    SELECT I.ID, I.NOMBRE, I.MARCA, I.EXPIRA, I.CANT, I.PRECIO
    FROM INVENTARIO I
    WHERE I.ID = @ID
END




GO
CREATE TRIGGER T_INSCRIPCION
ON CLIENTES INSTEAD OF INSERT
AS 
BEGIN
    DECLARE 
        @NUM INT,
        @CLIENTE_ID INT,
        @NOMB VARCHAR(15),
        @APE VARCHAR(20),
        @NACIMI DATE,
        @CONTA VARCHAR(20)

        SET @CLIENTE_ID = (SELECT ISNULL(MAX(ID), 0) + 1 FROM CLIENTES)
        SET @NOMB = (SELECT NOMBRE FROM inserted)
        SET @APE = (SELECT APELLIDO FROM inserted)        
        SELECT @NACIMI = (SELECT CUMPLE FROM inserted) 
        SELECT @CONTA = (SELECT CONTACTO FROM inserted)

        INSERT INTO CLIENTES VALUES(@CLIENTE_ID, @NOMB, @APE, @NACIMI, @CONTA)
         
END



GO
CREATE TRIGGER T_PRODUCTOS
ON INVENTARIO INSTEAD OF INSERT
AS 
BEGIN
    DECLARE 
        @PRODU_ID INT,
        @NOMB VARCHAR(15),
        @MAR VARCHAR(20),
        @EXPIRA DATE,
        @CANT NUMERIC,
        @PREC NUMERIC

        SET @PRODU_ID = (SELECT ISNULL(MAX(ID), 0) + 1 FROM INVENTARIO)
        SET @NOMB = (SELECT NOMBRE FROM inserted)
        SET @MAR = (SELECT MARCA FROM inserted)        
        SELECT @EXPIRA = (SELECT EXPIRA FROM inserted) 
        SELECT @CANT = (SELECT CANT FROM inserted)
        SELECT @PREC = (SELECT PRECIO FROM inserted)

        INSERT INTO INVENTARIO VALUES(@PRODU_ID, @NOMB, @MAR, @EXPIRA, @CANT, @PREC)
         
END