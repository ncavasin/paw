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
    // TODO agregar el turno seleccionado a un input hidden
    // ! remover el fetch de especialidades cuando selecciona un especialista
	constructor(container, especialidad, especialista) {
		const urlBase = window.location.origin
		let css = paw.newElement('link', '', { rel: 'stylesheet', href: 'assets/css/form_turnos.css' })
		document.head.appendChild(css)
		let containerElement = document.querySelector(container)
		let especialidadElement = document.querySelector(especialidad)
		let especialistaElement = document.querySelector(especialista)
		// crear boton para ver turnos disponibles
		let turnsButton = paw.newElement('button', 'Turnos disponibles', {
			disabled: true,
			class: 'get-turns-button'
		})

		if (especialidadElement && especialistaElement) {
			// busco las especialidades y especialistas disponibles en la base de datos
			this.createDatalist(especialistaElement, urlBase + '/especialistas', {}, 'especialista-lista')
			this.createDatalist(especialidadElement, urlBase + '/especialidades', {}, 'especialidad-lista')

			// me subscribo al evento onchange de los input para cambiar las opciones, cuando el otro input cambia
			especialidadElement.addEventListener('change', e =>
				this.createDatalist(
					especialistaElement,
					urlBase + '/especialistas',
					{ especialidad: e.target.value },
					'especialista-lista'
				)
			)
			especialistaElement.addEventListener('change', e => {
				/* this.createDatalist(
					especialidadElement,
					urlBase + '/especialidades',
					{ especialista: e.target.value },
					'especialidad-lista'
				) */
				// Si cambia el input me fijo si tiene algun valor seleccionado, si es asi, habilito el boton para consultar turnos disponibles
				if (e.target.value) turnsButton.removeAttribute('disabled')
				else turnsButton.setAttribute('disabled', true)
			})

			// agregar onclick al boton para traer datos del especialista y los horarios que atiende
			turnsButton.addEventListener('click', e => {
				e.preventDefault()
				FetchApi.get(urlBase + '/turnos_disponibles', { especialista: e.target.value }, r => {
					let fieldsetElement = document.querySelector('.turnos-disponibles')
					if (fieldsetElement) fieldsetElement.innerHTML = ''
					else
						fieldsetElement = paw.newElement('fieldset', '', {
							class: 'turnos-disponibles',
						})
					r.data.forEach(e => fieldsetElement.appendChild(this.createTurnCard(e)))
					containerElement.appendChild(fieldsetElement)
				})
			})
			containerElement.appendChild(turnsButton)
		} else console.error('Error al generar formulario, elementos HTML no encontrados')
	}

	createDatalist = (parent, targetUrl, params, datalistId) => {
		FetchApi.get(targetUrl, params, r => {
			// creo el datalist de especialistas si no existe y lo linkeo
			let datalistElement = document.querySelector('#' + datalistId)
			if (
				!datalistElement // Si no existe lo creo
			)
				datalistElement = paw.newElement('datalist', '', { id: datalistId }) // Si existe elimino el contenido
			else datalistElement.innerHTML = ''
			// creo las opciones
			let isSelectedValid = false
			r.forEach(item => {
				let optionElement = document.createElement('option')
				optionElement.setAttribute('value', item.nombre) // ver como poner el id para hacer el get de items mas facil
				datalistElement.appendChild(optionElement)
				isSelectedValid = isSelectedValid || item.nombre === parent.value
			})
			// agrego el datalist al DOM
			parent.appendChild(datalistElement)
			if (!isSelectedValid) parent.value = ''
		})
	}

	createTurnCard = data => {
		let especialista = data
		const days = { Domingo: 0, Lunes: 1, Martes: 2, Miercoles: 3, Jueves: 4, Viernes: 5, sabado: 6 }
		let div = paw.newElement('div', '', {
			class: 'especialista-turnos',
		})
		let header = paw.newElement('header', '', {class: 'header-card'})
		header.appendChild(paw.newElement('h3', especialista.nombre + ' ' + especialista.apellido))
		div.appendChild(header)

		// genero los dias proximos en los que atiende y los agrego a una lista
		let ulFechas = paw.newElement('ul', '', { class: 'ul-fechas' })
		data.diasQueAtiende.forEach(dia => {
			let date = new Date()
			date.setDate(date.getDate() + (7 + days[dia] - date.getDay()) % 7) // ? CUIDADO !! si tiene mal el horario de la PC esto funcionara bien ??? validar en backend
			let m = new Intl.DateTimeFormat('es', { month: 'long' }).format(date)
			let d = new Intl.DateTimeFormat('es', { day: '2-digit' }).format(date)
			let li = paw.newElement('li', `${d} ${m}`)

			// genero todos los horarios que estan disponibles
			let ulHorarios = paw.newElement('ul', '', { class: 'closed', id: especialista.id })
			const ocupados = especialista.turnosTomados.filter(e => e.dia === date.toISOString().slice(0, 10)) // TODO filtrar por ocupados

			// genero todos los turnos disponibles
			for (let hora = especialista.horarioInicio.horas; hora < especialista.horarioFinalizacion.horas; hora++)
				for (
					let minuto = especialista.horarioInicio.minutos;
					minuto < 60;
					minuto = minuto + especialista.duracionTurno
				) {
                    let liHora = aw.newElement('li', `${hora}:${minuto ? minuto : '00'}`)
                    liHora.addEventListener('click', e => {
                        // TODO aca debo procesar que cuando toque un horario se agregue al input hidden
                        // ? ver si parsear el texto para enviar minuto y hora por separado
                        // ! no olvidar que tengo que limpiar esos input hidden si cambia de especialista
                    })
					ulHorarios.appendChild(liHora)
				}
			// li.appendChild(ulHorarios)
			ulFechas.appendChild(li)
            ulFechas.appendChild(ulHorarios)
			// agrego el evento click para mostar / ocultar horarios de una fecha
			li.addEventListener('click', e => {
				const horarios = document.getElementsByClassName('open')
				for (let i = 0; i < horarios.length; i++) {
					horarios[i].classList.add('closed')
					horarios[i].classList.remove('open')
				}
				ulHorarios.classList.remove('closed')
				ulHorarios.classList.add('open')
			})
		})
		div.appendChild(ulFechas)
		return div
	}
}
