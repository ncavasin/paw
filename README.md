# Programación en Ambiente Web

## Trabajo Practico 3 - Programación de backend #1

## Consignas

1. Generar un ruteador en el backend que permita navegar todos los links del sitio.


2. Implementar un proyecto de la forma vista en las prácticas (Vista y Controladores, uso de librerías vía Composer, Orientación a Objetos cuando sea necesaria).


3. Hacer que el form se procese vía POST y se hagan las validaciones en el lado del servidor.
   1. La validaciones del backend debe ser consistentes con las del frontend.


4. Agregue al formulario un campo de tipo *archivo* que ofrezca la posibilidad de adjuntar una imagen que sea de un estudio clínico en particular. Sólo importa que se pueda envíar el archivo y ser recibido de forma adecuada en el Backend, además de validar el formato en ambos lados.


## Instrucciones de uso

- ``git clone https://github.com/ncavasin/paw.git``
- ``cd paw/application/``
- ``cp .env.example .env``
- Modificar ``.env`` a gusto.
- ``cd ../``
- ``docker-compose up`` (ver abajo).


## Docker 

El servidor se encuentra *dockerizado* por lo que para poder ejecutarlo es necesario tener instalado [Docker][docker] según su SO. 

Una vez instalado, solo necesita el comando ``docker-compose up`` para inicializarlo. Si es la primera vez que lo ejecuta, la instrucción demorará algunos segundos/minutos ya que deberá descargar por única vez la imagen del contenedor. Una vez iniciado Docker, puede dirigirse al socket ``localhost:8888`` para interactuar con el sitio web.

[docker]: https://docs.docker.com/get-docker/





