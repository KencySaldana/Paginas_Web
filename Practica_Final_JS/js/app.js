"use strict";
;

const inputs = document.querySelectorAll(".input");
//Javascript para animación de las elevar titulos de inputs
function focusFunc() {
   let parent = this.parentNode;
   parent.classList.add("focus");
 }

 function blurFunc() {
   let parent = this.parentNode;
   if (this.value == "") {
     parent.classList.remove("focus");
   }
 }

 inputs.forEach((input) => {
 	input.addEventListener("focus", focusFunc);
   	input.addEventListener("blur", blurFunc);
 });

//fución para abrir el modal y mostrar el contador en el
function startCountdown() {
	//solicitud de empleo
	const puesto = document.getElementsByName('puesto')[0].value;
	const fecha = document.getElementsByName('fecha')[0].value;
	const sueldoMensual = document.getElementsByName('sueldoMensual')[0].value;
	

	//datos personales
	const apellidoPaterno = document.getElementsByName('apellidoP')[0].value;
	const apellidoMaterno = document.getElementsByName('apellidoM')[0].value;
	const nombres = document.getElementsByName('nombre')[0].value;
	const edad = document.getElementsByName('edad')[0].value;
	const telefono = document.getElementsByName('telefono')[0].value;
	const fechaNacimiento = document.getElementsByName('fechaNac')[0].value;
	const sexo = document.getElementsByName('sexo')[0].value;
	const nacionalidad = document.getElementsByName('nacionalidad')[0].value;
	const estadoCivil = document.getElementsByName('estadoCivil')[0].value;
	const domicilio = document.getElementsByName('domicilio')[0].value;
	const colonia = document.getElementsByName('colonia')[0].value;
	const codigoPostal = document.getElementsByName('cp')[0].value;
	const ciudadDelDomicilio = document.getElementsByName('ciudadDelDomicilio')[0].value;
	const viveCon = document.getElementsByName('viveCon')[0].value;
	const personasDependen = document.getElementsByName('personasDependen')[0].value;

	//documentacion
	const curp = document.getElementsByName('curp')[0].value;
	const afore = document.getElementsByName('afore')[0].value;
	const rfc = document.getElementsByName('rfc')[0].value;
	const licenciaManejo = document.getElementsByName('licenciaM')[0].value;
	const cartillaMilitar = document.getElementsByName('cartillaM')[0].value;
	const pasaporte = document.getElementsByName('pasaporte')[0].value;
	const numeroSeguridadSocial = document.getElementsByName('nns')[0].value;
	const claseNumeroLicencia = document.getElementsByName('clase_n')[0].value;

	//estado de salud
	const estadoSalud = document.getElementsByName('estadoSalud')[0].value;
	const enfermedadCronica = document.getElementsByName('enfermedadCronica')[0].value;
	const deporte = document.getElementsByName('deporte')[0].value;
	const clubSocialDeportivo = document.getElementsByName('clubSocial')[0].value;
	const tiempoLibre = document.getElementsByName('tiempoLibre')[0].value;
	const metaVida = document.getElementsByName('metaVida')[0].value;

	//datos familiares
	const nombrePadre = document.getElementsByName('nombrePadre')[0].value;
	const vivePadre = document.getElementsByName('vivePadre')[0].value;
	const fallecidoPadre = document.getElementsByName('fallecidoPadre')[0].value;
	const domicilioPadre = document.getElementsByName('domicilioPadre')[0].value;
	const ocupacionPadre = document.getElementsByName('ocupacionPadre')[0].value;
	const nombreMadre = document.getElementsByName('nombreMadre')[0].value;
	const viveMadre = document.getElementsByName('viveMadre')[0].value;
	const fallecidoMadre = document.getElementsByName('fallecidoMadre')[0].value;
	const domicilioMadre = document.getElementsByName('domicilioMadre')[0].value;
	const ocupacionMadre = document.getElementsByName('ocupacionMadre')[0].value;
	const nombreEsp = document.getElementsByName('nombreEsp')[0].value;
	const viveEsp = document.getElementsByName('viveEsp')[0].value;
	const fallecidoEsp = document.getElementsByName('fallecidoEsp')[0].value;
	const domicilioEsp = document.getElementsByName('domicilioEsp')[0].value;
	const ocupacionEsp = document.getElementsByName('ocupacionEsp')[0].value;
	const nombreEdadHijos = document.getElementsByName('nombre_edad_hijos')[0].value;


	//escolaridad
	// Campo para el nombre de la escuela primaria
	const nombrePrimaria = document.getElementsByName("nombrePrimaria")[0].value;
	// Campo para el domicilio de la escuela primaria
	const domicilioPrimaria = document.getElementsByName("domicilioPrimaria")[0].value;
	// Campo para la fecha de inicio de la escuela primaria
	const fechaInicioPrimaria = document.getElementsByName("fechaInicioPrimaria")[0].value;
	// Campo para la fecha de fin de la escuela primaria
	const fechaFinPrimaria = document.getElementsByName("fechaFinPrimaria")[0].value;
	// Campo para el número de años en la escuela primaria
	const aniosPrimaria = document.getElementsByName("aniosPrimaria")[0].value;
	// Campo para el título obtenido en la escuela primaria
	const tituloPrimaria = document.getElementsByName("tituloPrimaria")[0].value;

	// Campo para el nombre de la escuela secundaria
	const nombreSecundaria = document.getElementsByName("nombreSecundaria")[0].value;
	// Campo para el domicilio de la escuela secundaria
	const domicilioSecundaria = document.getElementsByName("domicilioSecundaria")[0].value;
	// Campo para la fecha de inicio de la escuela secundaria
	const fechaInicioSecundaria = document.getElementsByName("fechaInicioSecundaria")[0].value;
	// Campo para la fecha de fin de la escuela secundaria
	const fechaFinSecundaria = document.getElementsByName("fechaFinSecundaria")[0].value;
	// Campo para el número de años en la escuela secundaria
	const aniosSecundaria = document.getElementsByName("aniosSecundaria")[0].value;
	// Campo para el título obtenido en la escuela secundaria
	const tituloSecundaria = document.getElementsByName("tituloSecundaria")[0].value;

	// Campo para el nombre de la escuela preparatoria o vocacional
	const nombrePreparatoria = document.getElementsByName("nombrePreparatoria")[0].value;
	// Campo para el domicilio de la escuela preparatoria o vocacional
	const domicilioPreparatoria = document.getElementsByName("domicilioPreparatoria")[0].value;
	// Campo para la fecha de inicio de la escuela preparatoria o vocacional
	const fechaInicioPreparatoria = document.getElementsByName("fechaInicioPreparatoria")[0].value;
	// Campo para la fecha de fin de la escuela preparatoria o vocacional
	const fechaFinPreparatoria = document.getElementsByName("fechaFinPreparatoria")[0].value;
	// Campo para el número de años en la escuela preparatoria o vocacional
	const aniosPreparatoria = document.getElementsByName("aniosPreparatoria")[0].value;
	// Campo para el título obtenido en la escuela preparatoria o vocacional
	const tituloPreparatoria = document.getElementsByName("tituloPreparatoria")[0].value;

	// Campo para el nombre de la escuela profesional
	const nombreProfesional = document.getElementsByName("nombreProfesional")[0].value;
	// Campo para el domicilio de la escuela profesional
	const domicilioProfesional = document.getElementsByName("domicilioProfesional")[0].value;
	// Campo para la fecha de inicio de la escuela profesional
	const fechaInicioProfesional = document.getElementsByName("fechaInicioProfesional")[0].value;
	// Campo para la fecha de fin de la escuela profesional
	const fechaFinProfesional = document.getElementsByName("fechaFinProfesional")[0].value;
	// Campo para el número de años en la escuela profesional
	const aniosProfesional = document.getElementsByName("aniosProfesional")[0].value;
	// Campo para el título obtenido en la escuela profesional
	const tituloProfesional = document.getElementsByName("tituloProfesional")[0].value;
	const nombreComercial = document.getElementsByName("nombreComercial")[0].value;
	const domicilioComercial = document.getElementsByName("domicilioComercial")[0].value;
	const fechaInicioComercial = document.getElementsByName("fechaInicioComercial")[0].value;
	const fechaFinComercial = document.getElementsByName("fechaFinComercial")[0].value;
	const aniosComercial = document.getElementsByName("aniosComercial")[0].value;
	const tituloComercial = document.getElementsByName("tituloComercial")[0].value;
	const estudiosActualidad = document.getElementsByName("estudiosActualidad")[0].value;
	const escuelaActual = document.getElementsByName("escuelaActual")[0].value;
	const horarioActual = document.getElementsByName("horarioActual")[0].value;
	const cursoActual = document.getElementsByName("cursoActual")[0].value;
	const gradoActual = document.getElementsByName("gradoActual")[0].value;
	const idiomas = document.getElementsByName("idiomas")[0].value;
	const funcionesOficina = document.getElementsByName("funcionesOficina")[0].value;
	const maquinasOficina = document.getElementsByName("maquinasOficina")[0].value;
	const otrosTrabajosDomina = document.getElementsByName("otrosTrabajosDomina")[0].value;
	const tiempoEmpleoActual = document.getElementsByName("tiempoEmpleoActual")[0].value;
	const tiempoEmpleoAnterior1 = document.getElementsByName("tiempoEmpleoAnterior1")[0].value;
	const tiempoEmpleoAnterior2 = document.getElementsByName("tiempoEmpleoAnterior2")[0].value;
	const nombreEmpleoActual = document.getElementsByName("nombreEmpleoActual")[0].value;
	const nombreEmpleoAnterior1 = document.getElementsByName("nombreEmpleoAnterior1")[0].value;
	const nombreEmpleoAnterior2 = document.getElementsByName("nombreEmpleoAnterior2")[0].value;
	const domicilioEmpleoActual = document.getElementsByName("domicilioEmpleoActual")[0].value;
	const domicilioEmpleoAnterior1 = document.getElementsByName("domicilioEmpleoAnterior1")[0].value;
	const domicilioEmpleoAnterior2 = document.getElementsByName("domicilioEmpleoAnterior2")[0].value;
	const puestoEmpleoActual = document.getElementsByName("puestoEmpleoActual")[0].value;
	const puestoEmpleoAnterior1 = document.getElementsByName("puestoEmpleoAnterior1")[0].value;
	const puestoEmpleoAnterior2 = document.getElementsByName("puestoEmpleoAnterior2")[0].value;
	const sueldoEmpleoActual = document.getElementsByName("sueldoEmpleoActual")[0].value;
	const sueldoEmpleoAnterior1 = document.getElementsByName("sueldoEmpleoAnterior1")[0].value;
	const sueldoEmpleoAnterior2 = document.getElementsByName("sueldoEmpleoAnterior2")[0].value;
	const motivoSeparacionEmpleoActual = document.getElementsByName("motivoSeparacionEmpleoActual")[0].value;
	const motivoSeparacionEmpleoAnterior1 = document.getElementsByName("motivoSeparacionEmpleoAnterior1")[0].value;
	const motivoSeparacionEmpleoAnterior2 = document.getElementsByName("motivoSeparacionEmpleoAnterior2")[0].value;
	const jefeEmpleoActual = document.getElementsByName("jefeEmpleoActual")[0].value;
	const jefeEmpleoAnterior1 = document.getElementsByName("jefeEmpleoAnterior1")[0].value;
	const jefeEmpleoAnterior2 = document.getElementsByName("jefeEmpleoAnterior2")[0].value;
	const actEmpleoActual = document.getElementsByName("actEmpleoActual")[0].value;
	const actEmpleoAnterior1 = document.getElementsByName("actEmpleoAnterior1")[0].value;
	const actEmpleoAnterior2 = document.getElementsByName("actEmpleoAnterior2")[0].value;
	//const informesSi = document.getElementsByName("informes_si")[0].value;
	//const informesNo = document.getElementsByName("informes_no")[0].value;
	const nombrePersona1 = document.getElementsByName("nombrePersona1")[0].value;
	const domicilioPersona1 = document.getElementsByName("domicilioPersona1")[0].value;
	const telefonoPersona1 = document.getElementsByName("telefonoPersona1")[0].value;
	const ocupacionPersona1 = document.getElementsByName("ocupacionPersona1")[0].value;
	const tiempoPersona1 = document.getElementsByName("tiempoPersona1")[0].value;
	const nombrePersona2 = document.getElementsByName("nombrePersona2")[0].value;
	const domicilioPersona2 = document.getElementsByName("domicilioPersona2")[0].value;
	const telefonoPersona2 = document.getElementsByName("telefonoPersona2")[0].value;
	const ocupacionPersona2 = document.getElementsByName("ocupacionPersona2")[0].value;
	const tiempoPersona2 = document.getElementsByName("tiempoPersona2")[0].value;
	const nombrePersona3 = document.getElementsByName("nombrePersona3")[0].value;
	const domicilioPersona3 = document.getElementsByName("domicilioPersona3")[0].value;
	const telefonoPersona3 = document.getElementsByName("telefonoPersona3")[0].value;
	const ocupacionPersona3 = document.getElementsByName("ocupacionPersona3")[0].value;
	const tiempoPersona3 = document.getElementsByName("tiempoPersona3")[0].value;
	const enterarEmpleoAnuncio = document.getElementsByName("enterarEmpleoAnuncio")[0].value;
	const enterarEmpleoOtro = document.getElementsByName("enterarEmpleoOtro")[0].value;
	//const vivePadreNo = document.getElementsByName("vivePadreNo")[0].value;
	//const vivePadreSi = document.getElementsByName("vivePadreSi")[0].value;
	/*const afianzadoNo = document.getElementsByName("afianzadoNo")[0].value;
	const afianzadoSi = document.getElementsByName("afianzadoSi")[0].value;
	const sindicatoNo = document.getElementsByName("sindicatoNo")[0].value;
	const sindicatoSi = document.getElementsByName("sindicatoSi")[0].value;
	const seguroVidaNo = document.getElementsByName("seguroVidaNo")[0].value;
	const seguroVidaSi = document.getElementsByName("seguroVidaSi")[0].value;
	const viajarNo = document.getElementsByName("viajarNo")[0].value;
	const viajarSi = document.getElementsByName("viajarSi")[0].value;
	const cambiarResidenciaNo = document.getElementsByName("cambiarResidenciaNo")[0].value;
	const cambiarResidenciaSi = document.getElementsByName("cambiarResidenciaSi")[0].value;*/
	const fechaPresentarTrabajar = document.getElementsByName("fechaPresentarTrabajar")[0].value;
/*
	const otrosIngresosNo = document.getElementsByName("otrosIngresosNo")[0].value;
	const otrosIngresosSi = document.getElementsByName("otrosIngresosSi")[0].value;
	*/
	const importeMensualIngresos = document.getElementsByName("importeMensualIngresos")[0].value;
	/*
	const conyugeTrabajaNo = document.getElementsByName("conyugeTrabajaNo")[0].value;
	const conyugeTrabajaSi = document.getElementsByName("conyugeTrabajaSi")[0].value;*/
	const percepcionMensual = document.getElementsByName("percepcionMensual")[0].value;
	/*const casaPropiaNo = document.getElementsByName("casaPropiaNo")[0].value;
	const casaPropiaSi = document.getElementsByName("casaPropiaSi")[0].value;*/
	const importeMensualCasa = document.getElementsByName("importeMensualCasa")[0].value;
	/*const rentaNo = document.getElementsByName("rentaNo")[0].value;
	const rentaSi = document.getElementsByName("rentaSi")[0].value;*/
	const rentaMensual = document.getElementsByName("rentaMensual")[0].value;
	/*const autoNo = document.getElementsByName("autoNo")[0].value;
	const autoSi = document.getElementsByName("autoSi")[0].value;*/
	const autoPlaca = document.getElementsByName("autoPlaca")[0].value;
	const autoMarca = document.getElementsByName("autoMarca")[0].value;
	const autoModelo = document.getElementsByName("autoModelo")[0].value;
	/*const deudasNo = document.getElementsByName("deudasNo")[0].value;
	const deudasSi = document.getElementsByName("deudasSi")[0].value;*/
	const importeDeudas = document.getElementsByName("importeDeudas")[0].value;
	const ingresos = document.getElementsByName("ingresos")[0].value;
	const egresos = document.getElementsByName("egresos")[0].value;
	const ahorros = document.getElementsByName("ahorros")[0].value;
	const totalGastosMensuales = document.getElementsByName("totalGastosMensuales")[0].value;
	const abonoMensual = document.getElementsByName("abonoMensual")[0].value


	//AQUÍ VAN VALIDACIONES, EN CASO DEQUE TODO ESTE BIEN SE HACE LO SIGUIENTE:




	var modal = document.getElementById("myModal");
	modal.style.display = "block";
	var timeleft = 3;
	var countdown = setInterval(function(){
	  document.getElementById("countdown").innerHTML = timeleft;
	  timeleft -= 1;
	  if (timeleft < 0) {
	    clearInterval(countdown);
	    console.log("hola");
	    console.log(puesto+"hi");

	    //se cierra el modal y se abre el html donde se visualizan los datos
	    modal.style.display = "none";
	    window.open("Solicitud_Completada.html?puesto=" + puesto +
		"&fecha="+ fecha + "&sueldoMensual=" + sueldoMensual + 
		"&apellidoPaterno="+ apellidoPaterno + "&apellidoMaterno="+ apellidoMaterno + 
		"&nombres="+ nombres + "&edad="+ edad + "&telefono="+ telefono +
		"&fechaNacimiento="+ fechaNacimiento + "&sexo="+ sexo +
		"&nacionalidad="+ nacionalidad + "&estadoCivil="+ estadoCivil +
		"&domicilio="+ domicilio + "&colonia="+ colonia + "&codigoPostal="+ codigoPostal +
		"&viveCon="+ viveCon + "&personasDependen="+ personasDependen + "&curp="+ curp +
		"&afore="+ afore + "&rfc="+ rfc + "&licenciaManejo="+ licenciaManejo +
		"&cartillaMilitar="+ cartillaMilitar + "&pasaporte="+ pasaporte + 
		"&numeroSeguridadSocial="+ numeroSeguridadSocial + "&claseNumeroLicencia="+ claseNumeroLicencia +
		"&estadoSalud="+ estadoSalud + "&enfermedadCronica="+ enfermedadCronica +
		"&deporte="+ deporte + "&clubSocialDeportivo="+ clubSocialDeportivo + 
		"&tiempoLibre="+ tiempoLibre + "&metaVida="+ metaVida + "&nombrePadre="+ nombrePadre +
		"&vivePadre="+ vivePadre + "&fallecidoPadre="+ fallecidoPadre + 
		"&domicilioPadre="+ domicilioPadre + "&ocupacionPadre="+ ocupacionPadre +
		"&nombreMadre="+ nombreMadre +"&viveMadre="+ viveMadre + 
		"&fallecidoMadre="+ fallecidoMadre + "&domicilioMadre="+ domicilioMadre + 
		"&ocupacionMadre="+ ocupacionMadre + "&viveEsp="+ viveEsp + 
		"&fallecidoEsp="+ fallecidoEsp + "&domicilioEsp="+ domicilioEsp + 
		"&ocupacionEsp="+ ocupacionEsp + "&nombreEdadHijos="+ nombreEdadHijos +
		"&nombreEdadHijos="+ nombreEdadHijos + "&nombrePrimaria="+ nombrePrimaria +
		"&domicilioPrimaria="+ domicilioPrimaria + "&fechaInicioPrimaria="+ fechaInicioPrimaria +
		"&fechaFinPrimaria="+ fechaFinPrimaria + "&aniosPrimaria="+ aniosPrimaria +
		"&tituloPrimaria="+ tituloPrimaria + "&nombreSecundaria="+ nombreSecundaria +
		"&domicilioSecundaria="+ domicilioSecundaria + "&fechaInicioSecundaria="+ fechaInicioSecundaria +
		"&fechaFinSecundaria="+ fechaFinSecundaria + "&aniosSecundaria="+ aniosSecundaria +
		"&tituloSecundaria="+ tituloSecundaria + "&nombrePreparatoria="+ nombrePreparatoria +
		"&domicilioPreparatoria="+ domicilioPreparatoria + "&fechaInicioPreparatoria="+ fechaInicioPreparatoria +
		"&fechaFinPreparatoria="+ fechaFinPreparatoria + "&aniosPreparatoria="+ aniosPreparatoria +
		"&tituloPreparatoria="+ tituloPreparatoria + "&nombreProfesional="+ nombreProfesional +
		"&domicilioProfesional="+ domicilioProfesional + "&fechaInicioProfesional="+ fechaInicioProfesional +
		"&fechaFinProfesional="+ fechaFinProfesional + "&aniosProfesional="+ aniosProfesional +
		"&tituloProfesional="+ tituloProfesional + "&nombreComercial="+ nombreComercial +
		"&domicilioComercial="+ domicilioComercial + "&fechaInicioComercial="+ fechaInicioComercial +
		"&fechaFinComercial="+ fechaFinComercial + "&aniosComercial="+ aniosComercial +
		"&tituloProfesional="+ tituloComercial + "&estudiosActualidad="+ estudiosActualidad +
		"&escuelaActual="+ escuelaActual + "&horarioActual="+ horarioActual +
		"&cursoActual="+ cursoActual + "&gradoActual="+ gradoActual + "&idiomas="+ idiomas +
		"&funcionesOficina="+ funcionesOficina + "&maquinasOficina="+ maquinasOficina +
		"&otrosTrabajosDomina="+ otrosTrabajosDomina + "&tiempoEmpleoActual="+ tiempoEmpleoActual +
		"&tiempoEmpleoAnterior1="+ tiempoEmpleoAnterior1 + "&tiempoEmpleoAnterior2="+ tiempoEmpleoAnterior2 +
		"&nombreEmpleoActual="+ nombreEmpleoActual +
		"&nombreEmpleoAnterior1="+ nombreEmpleoAnterior1 + "&nombreEmpleoAnterior2="+ nombreEmpleoAnterior2 +
		"&domicilioEmpleoActual="+ domicilioEmpleoActual +
		"&domicilioEmpleoAnterior1="+ domicilioEmpleoAnterior1 + "&domicilioEmpleoAnterior2="+ domicilioEmpleoAnterior2 +
		"&puestoEmpleoActual="+ puestoEmpleoActual +
		"&puestoEmpleoAnterior1="+ puestoEmpleoAnterior1 + "&puestoEmpleoAnterior2="+ puestoEmpleoAnterior2 +	
		"&sueldoEmpleoActual="+ sueldoEmpleoActual +
		"&sueldoEmpleoAnterior1="+ sueldoEmpleoAnterior1 + "&sueldoEmpleoAnterior2="+ sueldoEmpleoAnterior2 +
		"&motivoSeparacionEmpleoActual="+ motivoSeparacionEmpleoActual +
		"&motivoSeparacionEmpleoAnterior1="+ motivoSeparacionEmpleoAnterior1 + "&motivoSeparacionEmpleoAnterior2="+ motivoSeparacionEmpleoAnterior2 +
		"&jefeEmpleoActual="+ jefeEmpleoActual +
		"&jefeEmpleoAnterior1="+ jefeEmpleoAnterior1 + "&jefeEmpleoAnterior2="+ jefeEmpleoAnterior2 +
		"&actEmpleoActual="+ actEmpleoActual +
		"&actEmpleoAnterior1="+ actEmpleoAnterior1 + "&actEmpleoAnterior2="+ actEmpleoAnterior2 +
		"&nombrePersona1="+ nombrePersona1 + "&domicilioPersona1="+ domicilioPersona1 +
		"&telefonoPersona1="+ telefonoPersona1 + "&ocupacionPersona1="+ ocupacionPersona1 +
		"&tiempoPersona1="+ tiempoPersona1 +
		"&nombrePersona2="+ nombrePersona2 + "&domicilioPersona2="+ domicilioPersona2 +
		"&telefonoPersona2="+ telefonoPersona2 + "&ocupacionPersona2="+ ocupacionPersona2 +
		"&tiempoPersona2="+ tiempoPersona2 + 
		"&nombrePersona3="+ nombrePersona3 + "&domicilioPersona3="+ domicilioPersona3 +
		"&telefonoPersona3="+ telefonoPersona3 + "&ocupacionPersona3="+ ocupacionPersona3 +
		"&tiempoPersona3="+ tiempoPersona3 + "&enterarEmpleoAnuncio="+ enterarEmpleoAnuncio +
		"&enterarEmpleoOtro="+ enterarEmpleoOtro + "&fechaPresentarTrabajar="+ fechaPresentarTrabajar +
		"&importeMensualIngresos="+ importeMensualIngresos + "&percepcionMensual="+ percepcionMensual +
		"&importeMensualCasa="+ importeMensualCasa + "&rentaMensual="+ rentaMensual +
		"&autoPlaca="+ autoPlaca + "&autoMarca="+ autoMarca + "&autoModelo="+ autoModelo + 
		"&importeDeudas="+ importeDeudas + "&ingresos="+ ingresos + "&egresos="+ egresos + 
		"&ahorros="+ ahorros + "&totalGastosMensuales="+ totalGastosMensuales + "&abonoMensual="+ abonoMensual);

	  }
	}, 1000);
}



