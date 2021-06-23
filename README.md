# Programación en Ambiente Web

## Trabajo Practico 4 - Programación de frontend 

## Consignas

1. Terminar de implementar el componente Menú, iniciado en los videos, para que tenga la funcionalidad de ser multinivel y RWD.


2. Implementar una librería que permita convertir un listado de imágenes en slides (diapositivas) de imágenes de tipo "carousel". Debe cumplir con las reglas del Diseño Responsivo y deberá contar con diferentes efectos de transición en el pasaje de imágenes (3 como mínimo). Además, se debe mostrar una barra de progreso que muestre el avance (porcentual) de la descarga de las imágenes de tal manera que cuando llegue al 100% empiece a animarse la muestra de imágenes. Las diapositivas deben poder pasarse por thumbs, por botones, por swipe y presionando las teclas de las flechas.
Solo recibirá como parámetro el contenedor de las imágenes y debe permitir trabajar dentro del contenedor y ocupando todo el viewport redimensionando las imágenes para tal fin.
Pueden utilizar el sitio [https://www.jssor.com](https://www.jssor.com) para sacar algunas ideas interesantes.


3. Se pide implementar en el formulario de turnos la funcionalidad que permita, al pedir una cita, se pregunte con qué médico se solicita el turno y se arme un widget tipo agenda con los turnos disponibles para ese profesional para la semana habilitada para el pedido de turnos. Se debe contemplar que el sistema solo permite solicitar turnos durante los 7 días corridos a partir de hoy. De tal manera que el usuario pueda elegir cual es de su conveniencia simplemente haciendo un click sobre la casilla que representa el turno. Para poder generar esta funcionalidad se contará con la información necesaria en un JSON (por esta práctica estático) con el siguiente formato:

```
{
    "especialistas":  [{
        "matricula": "string",
        "nombre": "string",
        "apellido": "string",
        "diasQueAtiende": ["string","string","string","string"],
        "horarioInicio": {
            "horas": number,
            "minutos": number
        },
        "horarioFinalizacion": {
            "horas": number,
            "minutos": number
        },
        "duracionTurno": number,
        "turnosTomados": [
            {
                "dia": "string",
                "horas": number,
                "minutos": number
            }, … , ….
        ]
    }, {...}, {...}]
}
```

**Nota 1:** Tener en cuenta los sistemas de agenda que puede conocer el usuario para implementar una UI parecida, de tal manera que no presente posibilidad de confusión al pedir el turno. 

**Nota 2:** Para el testeo de la funcionalidad pueden utilizar el siguiente [JSON][json]. Los datos de los turnos representan los posibles turnos de los 7 días en los que el paciente puede solicitar uno nuevo.


4. Generar un componente que permita cargar, via Drag and Drop, archivos de imagen de estudios, solicitados en el formulario de turnos.


5. Generar la interfaz del turnero para la sala de espera de la clínica y una interfaz que le muestre al usuario (Actualizable cada 10 seg) que turno tiene, cual es el que se está atendiendo, tiempo estimado de espera. Ambas interfaces deben contar con alertas sonoras que marquen el cambio de la información relevante para cada usuario. En el caso de la versión móvil, hacer que vibre cuando sea su turno. 
Para tener los datos necesarios se debe implementar una interfaz que le muestre a cada médico el listado de turnos del día y le permita indicar a quien está atendiendo.
Agregar funcionalidades que permitan, según el contexto, al paciente aceptar el turno y al médico terminar de atender un paciente y pasar al siguiente turno. 


[json]:https://drive.google.com/file/d/1K_T-AZno_p6Ld42Ixn3FXRzOngufur09/view

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





