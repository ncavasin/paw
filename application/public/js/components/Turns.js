/* La siguiente clase tiene como finalidad resolver el punto 3 del TP4:

Se pide implementar en el formulario de turnos la funcionalidad que permita, al pedir una cita,
se pregunte con qué médico se solicita el turno y se arme un widget tipo agenda con los
turnos disponibles para ese profesional para la semana habilitada para el pedido de turnos.
Se debe contemplar que el sistema solo permite solicitar turnos durante los 7 días corridos a
partir de hoy. De tal manera que el usuario pueda elegir cual es de su conveniencia
simplemente haciendo un click sobre la casilla que representa el turno. Para poder generar
esta funcionalidad se contará con la información necesaria en un JSON con la siguiente estructura:
{
    "especialistas": [{
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
    ]s
    }, {...}, {...}]
} */

// La idea entonces es la siguiente, el campo especialidad ya no lo vamos a necesitar
class Turns {
    constructor (container, especialidad) {
        containerElement = document.querySelector(container)
        especialidadElement = document.querySelector(especialidad)

        // crear el datalist de especialidades con un fetch
        
                
        // crear boton para ver turnos disponibles
        // agregar onclick al boton para traer datos del especialista y los horarios que atiende
    }

    getData = (url, params, callBack) => {
        var url = new URL(url)
        url.search = new URLSearchParams(params).toString()
        fetch(url).then(r => {
            if (r.status >= 200 && r.status < 300) return r.json()
            else {
                console.error('Error en fetch data ' + url + ' params ' + params)
                return {}
            }
        }).then(data => callBack(data)).catch(e => console.error(e))
    }
}