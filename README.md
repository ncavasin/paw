# Programación en Ambiente Web

## Trabajo Practico 5 - Programación backend II

## Consignas

1. Generar la persistencia en un Motor de Base de Datos del formulario de solicitud de turnos, agregando esas tablas y todas las necesarias adicionales para que el modelo de datos sea consistente y siga un diseño correcto (Médicos, Especialidades, por nombrar 2 ejemplos).

2. Migrar todas las vistas al motor de Templates Twig. En los casos que sea adecuado, utilizar la herencia y composición de la librería para mejorar la reutilización de las vistas.

## Instrucciones de uso

- ``git clone https://github.com/ncavasin/paw.git``
- ``cd paw/application/``
- ``cp .env.example .env``
- Modificar ``.env`` a gusto.
- ``docker-compose up``
- ``phinx migrate -e development``
- Dirigirse al [sitio web](http://localhost:8888).

## Docker 

El servidor se encuentra *dockerizado* por lo que para poder ejecutarlo es necesario tener instalado [Docker][docker] según su SO. 

Una vez instalado, solo necesita el comando ``docker-compose up`` para inicializarlo. Si es la primera vez que lo ejecuta, la instrucción demorará algunos segundos/minutos ya que deberá descargar por única vez la imagen del contenedor. Una vez iniciado Docker, puede dirigirse al socket ``localhost:8888`` para interactuar con el sitio web.

[docker]: https://docs.docker.com/get-docker/





