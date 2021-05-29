COPY ESPECIALISTAS (nombre, apellido)
FROM 'data/especialistas.csv' DELIMITER ',';

--TRUNCATE TABLE ESPECIALISTAS CASCADE;
--ALTER SEQUENCE especialistas_id_seq RESTART WITH 1;


COPY ESPECIALIDADES (nombre, descripcion)
FROM 'data/especialidades.csv' DELIMITER ',';

--TRUNCATE TABLE ESPECIALIDADES CASCADE;
--ALTER SEQUENCE especialidades_id_seq RESTART WITH 1;


COPY INTERMEDIA (id_especialidad, id_especialista)
FROM 'data/intermedia.csv' DELIMITER ',';
--TRUNCATE TABLE INTERMEDIA CASCADE;
--ALTER SEQUENCE intermedia_id_seq RESTART WITH 1;


COPY OBRAS_SOCIALES (nombre)
FROM 'data/obras_sociales.csv' DELIMITER ',';
--TRUNCATE TABLE OBRAS_SOCIALES CASCADE;
--ALTER SEQUENCE obras_sociales_id_seq RESTART WITH 1;

--COPY USUARIOS (nombre, apellido, fnac, celular, mail, pwd, id_obra_social)
--FROM 'data/usuarios.csv' DELIMITER ',';
--TRUNCATE TABLE USUARIOS CASCADE;
--ALTER SEQUENCE usuarios_id_seq RESTART WITH 1;



