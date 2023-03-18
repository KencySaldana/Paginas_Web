const urlParams = new URLSearchParams(window.location.search);

//Selección de elementos
const puesto = document.getElementById("puesto");
const fecha = document.getElementById("fecha");
const sueldoMensual = document.getElementById("sueldo");
const pApellido = document.getElementById("pApellido");
const sApellido = document.getElementById("sApellido");
const nombres = document.getElementById("nombres");
const edad = document.getElementById("edad");
const domicilio = document.getElementById("domicilio");
const colonia = document.getElementById("colonia");
const codigoPostal = document.getElementById("codigoPostal");
const telefono = document.getElementById("telefono");
const sexo = document.getElementById("sexo");
const ciudad = document.getElementById("ciudad");
const entidad = document.getElementById("entidad");
const fechaNacimiento = document.getElementById("fechaNacimiento");
const nacionalidad = document.getElementById("nacionalidad");
const viveCon = document.getElementById("viveCon");
const personasDependen = document.getElementById("personasDependen");
const estadoCivil = document.getElementById("estadoCivil");
const curp = document.getElementById("curp");
const afore = document.getElementById("afore");
const rfc = document.getElementById("rfc");
const licenciaManejo = document.getElementById("licenciaManejo");
const servicioMilitar = document.getElementById("servicioMilitar");
const pasaporte = document.getElementById("pasaporte");
const nss = document.getElementById("nss");
const claseLicencia = document.getElementById("claseLicencia");
const extranjero = document.getElementById("extranjero");
const estadoSalud = document.getElementById("estadoSalud");
const enfermedadCronica = document.getElementById("enfermedadCronica");
const deporte = document.getElementById("deporte");
const club = document.getElementById("club");
const tiempoLibre = document.getElementById("timepoLibre");
const meta = document.getElementById("meta");
const idiomas = document.getElementById("idiomas");
const funcionesOficina = document.getElementById("funcionesOficina");
const maquinasOficina = document.getElementById("maquinasOficina");
const otrosTrabajos = document.getElementById("otrosTrabajos");
const nombreRef1 = document.getElementById("nombreRef1");
const nombreRef2 = document.getElementById("nombreRef2");
const nombreRef3 = document.getElementById("nombreRef3");
const domicilioRef1 = document.getElementById("domicilioRef1");
const domicilioRef2 = document.getElementById("domicilioRef2");
const domicilioRef3 = document.getElementById("domicilioRef3");
const telefonoRef1 = document.getElementById("telefonoRef1");
const telefonoRef2 = document.getElementById("telefonoRef2");
const telefonoRef3 = document.getElementById("telefonoRef3");
const ocupacionRef1 = document.getElementById("ocupacionRef1");
const ocupacionRef2 = document.getElementById("ocupacionRef2");
const ocupacionRef3 = document.getElementById("ocupacionRef3");
const tiempoRef1 = document.getElementById("tiempoRef1");
const tiempoRef2 = document.getElementById("tiempoRef2");
const tiempoRef3 = document.getElementById("tiempoRef3");
const enterarEmpleo = document.getElementById("enterarEmpleo");
const familiaresEmpresa = document.getElementById("familiaresEmpresa");
const afianzado = document.getElementById("afianzado");
const sindicato = document.getElementById("sindicato");
const seguroVida = document.getElementById("seguroVida");
const importe = document.getElementById("importe");
const puedeViajar = document.getElementById("puedeViajar");
const cambiarLugar = document.getElementById("cambiarLugar");
const fechaTrabajar = document.getElementById("fechaTrabajar");
const padreNombre = document.getElementById("padreNombre");
const padreVivo = document.getElementById("padreVivo");
const padreMuerto = document.getElementById("padreMuerto");
const padreDomicilio = document.getElementById("padreDomicilio");
const padreOcupacion = document.getElementById("padreOcupacion");

const madreNombre = document.getElementById("madreNombre");
const madreVivo = document.getElementById("madreVivo");
const madreMuerto = document.getElementById("madreMuerto");
const madreDomicilio = document.getElementById("madreDomicilio");
const madreOcupacion = document.getElementById("madreOcupacion");

const esposaNombre = document.getElementById("esposaNombre");
const esposaVivo = document.getElementById("esposaVivo");
const esposaMuerto = document.getElementById("esposaMuerto");
const esposaDomicilio = document.getElementById("esposaDomicilio");
const esposaOcupacion = document.getElementById("esposaOcupacion");
const nombrePrimaria = document.getElementById("nombrePrimaria");
const domicilioPrimaria = document.getElementById("domicilioPrimaria");
const dePrimaria = document.getElementById("dePrimaria");
const aPrimaria = document.getElementById("aPrimaria");
const aniosPrimaria = document.getElementById("aniosPrimaria");
const tituloPrimaria = document.getElementById("tituloPrimaria");

const nombreSecundaria = document.getElementById("nombreSecundaria");
const domicilioSecundaria = document.getElementById("domicilioSecundaria");
const deSecundaria = document.getElementById("deSecundaria");
const aSecundaria = document.getElementById("aSecundaria");
const aniosSecundaria = document.getElementById("aniosSecundaria");
const tituloSecundaria = document.getElementById("tituloSecundaria");

const nombrePrepa = document.getElementById("nombrePrepa");
const domicilioPrepa = document.getElementById("domicilioPrepa");
const dePrepa = document.getElementById("dePrepa");
const aPrepa = document.getElementById("aPrepa");
const aniosPrepa = document.getElementById("aniosPrepa");
const tituloPrepa = document.getElementById("tituloPrepa");

const nombreProfesional = document.getElementById("nombreProfesional");
const domicilioProfesional = document.getElementById("domicilioProfesional");
const deProfesional = document.getElementById("deProfesional");
const aProfesional = document.getElementById("aProfesional");
const aniosProfesional = document.getElementById("aniosProfesional");
const tituloProfesional = document.getElementById("tituloProfesional");

const nombreComercial = document.getElementById("nombreComercial");
const domicilioComercial = document.getElementById("domicilioComercial");
const deComercial = document.getElementById("deComercial");
const aComercial = document.getElementById("aComercial");
const aniosComercial = document.getElementById("aniosComercial");
const tituloComercial = document.getElementById("tituloComercial");

const actualidadEscuela = document.getElementById("actualidadEscuela");
const actualidadCurso = document.getElementById("actualidadCurso");
const actualidadGrado = document.getElementById("actualidadGrado");
const empleoActual = document.getElementById("empleoActual");
const empleoAnterior1 = document.getElementById("empleoAnterior1");
const empleoAnterior2 = document.getElementById("empleoAnterior2");

const nombreActual = document.getElementById("nombreActual");
const nombreAnterior1 = document.getElementById("nombreAnterior1");
const nombreAnterior2 = document.getElementById("nombreAnterior2");

const domicilioActual = document.getElementById("domicilioActual");
const domicilioAnterior1 = document.getElementById("domicilioAnterior1");
const domicilioAnterior2 = document.getElementById("domicilioAnterior2");

const puestoActual = document.getElementById("puestoActual");
const puestoAnterior1 = document.getElementById("puestoAnterior1");
const puestoAnterior2 = document.getElementById("puestoAnterior2");

const puestoFinalActual = document.getElementById("puestoFinalActual");
const puestoFinalAnterior1 = document.getElementById("puestoFinalAnterior1");
const puestoFinalAnterior2 = document.getElementById("puestoFinalAnterior2");

const sueldoActual = document.getElementById("sueldoActual");
const sueldoAnterior1 = document.getElementById("sueldoAnterior1");
const sueldoAnterior2 = document.getElementById("sueldoAnterior2");

const sueldoFinalActual = document.getElementById("sueldoFinalActual");
const sueldoFinalAnterior1 = document.getElementById("sueldoFinalAnterior1");
const sueldoFinalAnterior2 = document.getElementById("sueldoFinalAnterior2");

const separacionActual = document.getElementById("separacionActual");
const separacionAnterior1 = document.getElementById("separacionAnterior1");
const separacionAnterior2 = document.getElementById("separacionAnterior2");

const nombreJefeActual = document.getElementById("nombreJefeActual");
const nombreJefeAnterior1 = document.getElementById("nombreJefeAnterior1");
const nombreJefeAnterior2 = document.getElementById("nombreJefeAnterior2");

const actividadesActual = document.getElementById("actividadesActual");
const actividadesAnterior1 = document.getElementById("actividadesAnterior1");
const actividadesAnterior2 = document.getElementById("actividadesAnterior2");

const informes = document.getElementById("informes");
const razones = document.getElementById("razones");
const otrosIngresos = document.getElementById("otrosIngresos");
const importeOtrosIngresos = document.getElementById("importeOtrosIngresos");
const conyugeTrabaja = document.getElementById("conyugeTrabaja");
const importeConyuge = document.getElementById("importeConyuge");
const casaPropia = document.getElementById("casaPropia");
const importeCasa = document.getElementById("importeCasa");
const renta = document.getElementById("renta");
const importeRenta = document.getElementById("importeRenta");
const automovil = document.getElementById("automovil");
const placas = document.getElementById("placas");
const deudas = document.getElementById("deudas");
const importeDeudas = document.getElementById("importeDeudas");
const ingresos = document.getElementById("ingresos");
const ahorros = document.getElementById("ahorros");
const egresos = document.getElementById("egresos");
const total = document.getElementById("total");
const abona = document.getElementById("abona");

//Se asignan los datos de la url
puesto.textContent = urlParams.get('puesto');
fecha.textContent = urlParams.get('fecha');
sueldoMensual.textContent = urlParams.get('sueldoMensual')
pApellido.extContent = urlParams.get('apellidoPaterno');
sApellido.textContent = urlParams.get('apellidoMaterno');
nombres.textContent = urlParams.get('nombres');
edad.textContent = urlParams.get('edad');
domicilio.textContent = urlParams.get('domicilio');
colonia.textContent = urlParams.get('colonia');
codigoPostal.textContent = urlParams.get('codigoPostal');
telefono.textContent = urlParams.get('telefono');
sexo.textContent = urlParams.get('sexo');
ciudad.textContent = urlParams.get('ciudadDelDomicilio');

fechaNacimiento.textContent = urlParams.get('fechaNacimiento');
nacionalidad.textContent = urlParams.get('nacionalidad');
viveCon.textContent = urlParams.get('viveCon');

estadoCivil.textContent = urlParams.get('estadoCivil');
curp.textContent = urlParams.get('curp');
afore .textContent = urlParams.get('afore');
rfc.textContent = urlParams.get('rfc');
licenciaManejo.textContent = urlParams.get('licenciaManejo');
servicioMilitar.textContent = urlParams.get('cartillaMilitar');
pasaporte.textContent = urlParams.get('rfc');
nss.textContent = urlParams.get('numeroSeguridadSocial');
claseLicencia.textContent = urlParams.get('claseNumeroLicencia');
estadoSalud.textContent = urlParams.get('estadoSalud');
enfermedadCronica .textContent = urlParams.get('enfermedadCronica');
deporte.textContent = urlParams.get('deporte');
club.textContent = urlParams.get('clubSocialDeportivo');
tiempoLibre.textContent = urlParams.get('tiempoLibre');
meta.textContent = urlParams.get('metaVida');
idiomas.textContent = urlParams.get('idiomas');
funcionesOficina.textContent = urlParams.get('funcionesOficina');
maquinasOficina.textContent = urlParams.get('maquinasOficina');
otrosTrabajos.textContent = urlParams.get('otrosTrabajosDomina');
nombreRef1.textContent = urlParams.get('nombrePersona1');
nombreRef2.textContent = urlParams.get('nombrePersona2');
nombreRef3.textContent = urlParams.get('nombrePersona3');
domicilioRef1.textContent = urlParams.get('domicilioPersona1');
domicilioRef2.textContent = urlParams.get('domicilioPersona2');
domicilioRef3.textContent = urlParams.get('domicilioPersona3');
telefonoRef1.textContent = urlParams.get('telefonoPersona1');
telefonoRef2.textContent = urlParams.get('telefonoPersona2');
telefonoRef3.textContent = urlParams.get('telefonoPersona3');
ocupacionRef1.textContent = urlParams.get('ocupacionPersona1');
ocupacionRef2.textContent = urlParams.get('ocupacionPersona2');
ocupacionRef3.textContent = urlParams.get('ocupacionPersona3');
tiempoRef1.textContent = urlParams.get('tiempoPersona1');
tiempoRef2.textContent = urlParams.get('tiempoPersona2');
tiempoRef3.textContent = urlParams.get('tiempoPersona3');
enterarEmpleo.textContent = urlParams.get('enterarEmpleoAnuncio');

padreNombre.textContent = urlParams.get('nombrePadre');
padreVivo.checked = urlParams.get('vivePadre');
padreDomicilio.textContent = urlParams.get('domicilioPadre');
padreOcupacion.textContent = urlParams.get('ocupacionPadre');

madreNombre.textContent = urlParams.get('nombreMadre');
madreVivo.checked = urlParams.get('viveMadre');
madreMuerto.checked = urlParams.get('fallecidoMadre');
madreDomicilio.textContent = urlParams.get('domicilioMadre');
madreOcupacion.textContent = urlParams.get('ocupacionMadre');
esposaNombre.textContent = urlParams.get('nombreEsp');
esposaVivo.checked = urlParams.get('viveEsp');
esposaDomicilio.textContent = urlParams.get('domicilioEsp');
esposaOcupacion.textContent = urlParams.get('ocupacionEsp');

nombrePrimaria.textContent = urlParams.get('nombrePrimaria');
domicilioPrimaria.textContent = urlParams.get('domicilioPrimaria');
dePrimaria.textContent = urlParams.get('fechaInicioPrimaria');
aPrimaria.textContent = urlParams.get('fechaFinPrimaria');
aniosPrimaria.textContent = urlParams.get('aniosPrimaria');
tituloPrimaria.textContent = urlParams.get('tituloPrimaria');

nombreSecundaria.textContent = urlParams.get('nombreSecundaria');
domicilioSecundaria.textContent = urlParams.get('domicilioSecundaria');
deSecundaria.textContent = urlParams.get('fechaInicioSecundaria');
aSecundaria.textContent = urlParams.get('fechaFinSecundaria');
aniosSecundaria.textContent = urlParams.get('aniosSecundaria');
tituloSecundaria.textContent = urlParams.get('tituloSecundaria');

nombrePrepa.textContent = urlParams.get('nombrePreparatoria');
domicilioPrepa.textContent = urlParams.get('domicilioPreparatoria');
dePrepa.textContent = urlParams.get('fechaInicioPreparatoria');
aPrepa.textContent = urlParams.get('fechaFinPreparatoria');
aniosPrepa.textContent = urlParams.get('aniosPreparatoria');
tituloPrepa.textContent = urlParams.get('tituloPreparatoria');

nombreProfesional.textContent = urlParams.get('nombreProfesional');
domicilioProfesional.textContent = urlParams.get('domicilioProfesional');
deProfesional.textContent = urlParams.get('fechaInicioProfesional');
aProfesional.textContent = urlParams.get('fechaFinProfesional');
aniosProfesional.textContent = urlParams.get('aniosProfesional');
tituloProfesional.textContent = urlParams.get('tituloProfesional');

nombreComercial.textContent = urlParams.get('nombreComercial');
domicilioComercial.textContent = urlParams.get('domicilioComercial');
deComercial.textContent = urlParams.get('fechaInicioComercial');
aComercial.textContent = urlParams.get('fechaFinComercial');
aniosComercial.textContent = urlParams.get('aniosComercial');
tituloComercial.textContent = urlParams.get('tituloComercial');

actualidadEscuela.textContent = urlParams.get('escuelaActual');
actualidadCurso.textContent = urlParams.get('cursoActual');
actualidadGrado.textContent = urlParams.get('gradoActual');


/*DE AQUI ABAJO NO SON VÁLIDOS*/
empleoActual.textContent = urlParams.get('tiempoEmpleoActual');
empleoAnterior1.textContent = urlParams.get('tiempoEmpleoAnterior1');
empleoAnterior2.textContent = urlParams.get('tiempoEmpleoAnterior2');

nombreActual.textContent = urlParams.get('nombreEmpleoActual');
nombreAnterior1.textContent = urlParams.get('nombreEmpleoAnterior1');
nombreAnterior2.textContent = urlParams.get('nombreEmpleoAnterior2');

domicilioActual.textContent = urlParams.get('domicilioEmpleoActual');
domicilioAnterior1.textContent = urlParams.get('domicilioEmpleoAnterior1');
domicilioAnterior2.textContent = urlParams.get('domicilioEmpleoAnterior2');

puestoActual.textContent = urlParams.get('puestoEmpleoActual');
puestoAnterior1.textContent = urlParams.get('puestoEmpleoAnterior1');
puestoAnterior2.textContent = urlParams.get('puestoEmpleoAnterior2');

sueldoActual.textContent = urlParams.get('sueldoEmpleoActual');
sueldoAnterior1.textContent = urlParams.get('sueldoEmpleoAnterior1');
sueldoAnterior2.textContent = urlParams.get('sueldoEmpleoAnterior2');

separacionActual.textContent = urlParams.get('motivoSeparacionEmpleoActual');
separacionAnterior1.textContent = urlParams.get('motivoSeparacionEmpleoAnterior1');
separacionAnterior2.textContent = urlParams.get('motivoSeparacionEmpleoAnterior2');

nombreJefeActual.textContent = urlParams.get('jefeEmpleoActual');
nombreJefeAnterior1.textContent = urlParams.get('jefeEmpleoAnterior1');
nombreJefeAnterior2.textContent = urlParams.get('jefeEmpleoAnterior2');

actividadesActual.textContent = urlParams.get('actEmpleoActual');
actividadesAnterior1.textContent = urlParams.get('actEmpleoAnterior1');
actividadesAnterior2.textContent = urlParams.get('actEmpleoAnterior2');

informes.textContent = urlParams.get('informes');
razones.textContent = urlParams.get('razones');



//CREAR JSON
function submitForm() {
   const puesto = document.getElementById("puesto");
   const fecha = document.getElementById("fecha");
   const sueldoMensual = document.getElementById("sueldo");
   const pApellido = document.getElementById("pApellido");
   const sApellido = document.getElementById("sApellido");
   const nombres = document.getElementById("nombres");
   const edad = document.getElementById("edad");
   const domicilio = document.getElementById("domicilio");
   const colonia = document.getElementById("colonia");
   const codigoPostal = document.getElementById("codigoPostal");
   const telefono = document.getElementById("telefono");
   const sexo = document.getElementById("sexo");
   const ciudad = document.getElementById("ciudad");
   const entidad = document.getElementById("entidad");
   const fechaNacimiento = document.getElementById("fechaNacimiento");
   const nacionalidad = document.getElementById("nacionalidad");
   const viveCon = document.getElementById("viveCon");
   const personasDependen = document.getElementById("personasDependen");
   const estadoCivil = document.getElementById("estadoCivil");
   const curp = document.getElementById("curp");
   const afore = document.getElementById("afore");
   const rfc = document.getElementById("rfc");
   const licenciaManejo = document.getElementById("licenciaManejo");
   const servicioMilitar = document.getElementById("servicioMilitar");
   const pasaporte = document.getElementById("pasaporte");
   const nss = document.getElementById("nss");
   const claseLicencia = document.getElementById("claseLicencia");
   const extranjero = document.getElementById("extranjero");
   const estadoSalud = document.getElementById("estadoSalud");
   const enfermedadCronica = document.getElementById("enfermedadCronica");
   const deporte = document.getElementById("deporte");
   const club = document.getElementById("club");
   const tiempoLibre = document.getElementById("timepoLibre");
   const meta = document.getElementById("meta");
   const idiomas = document.getElementById("idiomas");
   const funcionesOficina = document.getElementById("funcionesOficina");
   const maquinasOficina = document.getElementById("maquinasOficina");
   const otrosTrabajos = document.getElementById("otrosTrabajos");
   const nombreRef1 = document.getElementById("nombreRef1");
   const nombreRef2 = document.getElementById("nombreRef2");
   const nombreRef3 = document.getElementById("nombreRef3");
   const domicilioRef1 = document.getElementById("domicilioRef1");
   const domicilioRef2 = document.getElementById("domicilioRef2");
   const domicilioRef3 = document.getElementById("domicilioRef3");
   const telefonoRef1 = document.getElementById("telefonoRef1");
   const telefonoRef2 = document.getElementById("telefonoRef2");
   const telefonoRef3 = document.getElementById("telefonoRef3");
   const ocupacionRef1 = document.getElementById("ocupacionRef1");
   const ocupacionRef2 = document.getElementById("ocupacionRef2");
   const ocupacionRef3 = document.getElementById("ocupacionRef3");
   const tiempoRef1 = document.getElementById("tiempoRef1");
   const tiempoRef2 = document.getElementById("tiempoRef2");
   const tiempoRef3 = document.getElementById("tiempoRef3");
   const enterarEmpleo = document.getElementById("enterarEmpleo");
   const familiaresEmpresa = document.getElementById("familiaresEmpresa");
   const afianzado = document.getElementById("afianzado");
   const sindicato = document.getElementById("sindicato");
   const seguroVida = document.getElementById("seguroVida");
   const importe = document.getElementById("importe");
   const puedeViajar = document.getElementById("puedeViajar");
   const cambiarLugar = document.getElementById("cambiarLugar");
   const fechaTrabajar = document.getElementById("fechaTrabajar");
   const padreNombre = document.getElementById("padreNombre");
   const padreVivo = document.getElementById("padreVivo");
   const padreMuerto = document.getElementById("padreMuerto");
   const padreDomicilio = document.getElementById("padreDomicilio");
   const padreOcupacion = document.getElementById("padreOcupacion");

   const madreNombre = document.getElementById("madreNombre");
   const madreVivo = document.getElementById("madreVivo");
   const madreMuerto = document.getElementById("madreMuerto");
   const madreDomicilio = document.getElementById("madreDomicilio");
   const madreOcupacion = document.getElementById("madreOcupacion");

   const esposaNombre = document.getElementById("esposaNombre");
   const esposaVivo = document.getElementById("esposaVivo");
   const esposaMuerto = document.getElementById("esposaMuerto");
   const esposaDomicilio = document.getElementById("esposaDomicilio");
   const esposaOcupacion = document.getElementById("esposaOcupacion");
   const nombrePrimaria = document.getElementById("nombrePrimaria");
   const domicilioPrimaria = document.getElementById("domicilioPrimaria");
   const dePrimaria = document.getElementById("dePrimaria");
   const aPrimaria = document.getElementById("aPrimaria");
   const aniosPrimaria = document.getElementById("aniosPrimaria");
   const tituloPrimaria = document.getElementById("tituloPrimaria");

   const nombreSecundaria = document.getElementById("nombreSecundaria");
   const domicilioSecundaria = document.getElementById("domicilioSecundaria");
   const deSecundaria = document.getElementById("deSecundaria");
   const aSecundaria = document.getElementById("aSecundaria");
   const aniosSecundaria = document.getElementById("aniosSecundaria");
   const tituloSecundaria = document.getElementById("tituloSecundaria");

   const nombrePrepa = document.getElementById("nombrePrepa");
   const domicilioPrepa = document.getElementById("domicilioPrepa");
   const dePrepa = document.getElementById("dePrepa");
   const aPrepa = document.getElementById("aPrepa");
   const aniosPrepa = document.getElementById("aniosPrepa");
   const tituloPrepa = document.getElementById("tituloPrepa");

   const nombreProfesional = document.getElementById("nombreProfesional");
   const domicilioProfesional = document.getElementById("domicilioProfesional");
   const deProfesional = document.getElementById("deProfesional");
   const aProfesional = document.getElementById("aProfesional");
   const aniosProfesional = document.getElementById("aniosProfesional");
   const tituloProfesional = document.getElementById("tituloProfesional");

   const nombreComercial = document.getElementById("nombreComercial");
   const domicilioComercial = document.getElementById("domicilioComercial");
   const deComercial = document.getElementById("deComercial");
   const aComercial = document.getElementById("aComercial");
   const aniosComercial = document.getElementById("aniosComercial");
   const tituloComercial = document.getElementById("tituloComercial");

   const actualidadEscuela = document.getElementById("actualidadEscuela");
   const actualidadCurso = document.getElementById("actualidadCurso");
   const actualidadGrado = document.getElementById("actualidadGrado");
   const empleoActual = document.getElementById("empleoActual");
   const empleoAnterior1 = document.getElementById("empleoAnterior1");
   const empleoAnterior2 = document.getElementById("empleoAnterior2");

   const nombreActual = document.getElementById("nombreActual");
   const nombreAnterior1 = document.getElementById("nombreAnterior1");
   const nombreAnterior2 = document.getElementById("nombreAnterior2");

   const domicilioActual = document.getElementById("domicilioActual");
   const domicilioAnterior1 = document.getElementById("domicilioAnterior1");
   const domicilioAnterior2 = document.getElementById("domicilioAnterior2");

   const puestoActual = document.getElementById("puestoActual");
   const puestoAnterior1 = document.getElementById("puestoAnterior1");
   const puestoAnterior2 = document.getElementById("puestoAnterior2");

   const puestoFinalActual = document.getElementById("puestoFinalActual");
   const puestoFinalAnterior1 = document.getElementById("puestoFinalAnterior1");
   const puestoFinalAnterior2 = document.getElementById("puestoFinalAnterior2");

   const sueldoActual = document.getElementById("sueldoActual");
   const sueldoAnterior1 = document.getElementById("sueldoAnterior1");
   const sueldoAnterior2 = document.getElementById("sueldoAnterior2");

   const sueldoFinalActual = document.getElementById("sueldoFinalActual");
   const sueldoFinalAnterior1 = document.getElementById("sueldoFinalAnterior1");
   const sueldoFinalAnterior2 = document.getElementById("sueldoFinalAnterior2");

   const separacionActual = document.getElementById("separacionActual");
   const separacionAnterior1 = document.getElementById("separacionAnterior1");
   const separacionAnterior2 = document.getElementById("separacionAnterior2");

   const nombreJefeActual = document.getElementById("nombreJefeActual");
   const nombreJefeAnterior1 = document.getElementById("nombreJefeAnterior1");
   const nombreJefeAnterior2 = document.getElementById("nombreJefeAnterior2");

   const actividadesActual = document.getElementById("actividadesActual");
   const actividadesAnterior1 = document.getElementById("actividadesAnterior1");
   const actividadesAnterior2 = document.getElementById("actividadesAnterior2");

   const informes = document.getElementById("informes");
   const razones = document.getElementById("razones");
   const otrosIngresos = document.getElementById("otrosIngresos");
   const importeOtrosIngresos = document.getElementById("importeOtrosIngresos");
   const conyugeTrabaja = document.getElementById("conyugeTrabaja");
   const importeConyuge = document.getElementById("importeConyuge");
   const casaPropia = document.getElementById("casaPropia");
   const importeCasa = document.getElementById("importeCasa");
   const renta = document.getElementById("renta");
   const importeRenta = document.getElementById("importeRenta");
   const automovil = document.getElementById("automovil");
   const placas = document.getElementById("placas");
   const deudas = document.getElementById("deudas");
   const importeDeudas = document.getElementById("importeDeudas");
   const ingresos = document.getElementById("ingresos");
   const ahorros = document.getElementById("ahorros");
   const egresos = document.getElementById("egresos");
   const total = document.getElementById("total");
   const abona = document.getElementById("abona");

//Se asignan los datos de la url
puesto.textContent = urlParams.get('puesto');
fecha.textContent = urlParams.get('fecha');
sueldoMensual.textContent = urlParams.get('sueldoMensual')
pApellido.extContent = urlParams.get('apellidoPaterno');
sApellido.textContent = urlParams.get('apellidoMaterno');
nombres.textContent = urlParams.get('nombres');
edad.textContent = urlParams.get('edad');
domicilio.textContent = urlParams.get('domicilio');
colonia.textContent = urlParams.get('colonia');
codigoPostal.textContent = urlParams.get('codigoPostal');
telefono.textContent = urlParams.get('telefono');
sexo.textContent = urlParams.get('sexo');
ciudad.textContent = urlParams.get('ciudadDelDomicilio');
fechaNacimiento.textContent = urlParams.get('fechaNacimiento');
nacionalidad.textContent = urlParams.get('nacionalidad');
viveCon.textContent = urlParams.get('viveCon');

estadoCivil.textContent = urlParams.get('estadoCivil');
curp.textContent = urlParams.get('curp');
afore .textContent = urlParams.get('afore');
rfc.textContent = urlParams.get('rfc');
licenciaManejo.textContent = urlParams.get('licenciaManejo');
servicioMilitar.textContent = urlParams.get('cartillaMilitar');
pasaporte.textContent = urlParams.get('rfc');
nss.textContent = urlParams.get('numeroSeguridadSocial');
claseLicencia.textContent = urlParams.get('claseNumeroLicencia');

estadoSalud.textContent = urlParams.get('estadoSalud');
enfermedadCronica .textContent = urlParams.get('enfermedadCronica');
deporte.textContent = urlParams.get('deporte');
club.textContent = urlParams.get('clubSocialDeportivo');
tiempoLibre.textContent = urlParams.get('tiempoLibre');
meta.textContent = urlParams.get('metaVida');
idiomas.textContent = urlParams.get('idiomas');
funcionesOficina.textContent = urlParams.get('funcionesOficina');
maquinasOficina.textContent = urlParams.get('maquinasOficina');
otrosTrabajos.textContent = urlParams.get('otrosTrabajosDomina');
nombreRef1.textContent = urlParams.get('nombrePersona1');
nombreRef2.textContent = urlParams.get('nombrePersona2');
nombreRef3.textContent = urlParams.get('nombrePersona3');
domicilioRef1.textContent = urlParams.get('domicilioPersona1');
domicilioRef2.textContent = urlParams.get('domicilioPersona2');
domicilioRef3.textContent = urlParams.get('domicilioPersona3');
telefonoRef1.textContent = urlParams.get('telefonoPersona1');
telefonoRef2.textContent = urlParams.get('telefonoPersona2');
telefonoRef3.textContent = urlParams.get('telefonoPersona3');
ocupacionRef1.textContent = urlParams.get('ocupacionPersona1');
ocupacionRef2.textContent = urlParams.get('ocupacionPersona2');
ocupacionRef3.textContent = urlParams.get('ocupacionPersona3');
tiempoRef1.textContent = urlParams.get('tiempoPersona1');
tiempoRef2.textContent = urlParams.get('tiempoPersona2');
tiempoRef3.textContent = urlParams.get('tiempoPersona3');
enterarEmpleo.textContent = urlParams.get('enterarEmpleoAnuncio');


padreNombre.textContent = urlParams.get('nombrePadre');
padreVivo.checked = urlParams.get('vivePadre');
padreDomicilio.textContent = urlParams.get('domicilioPadre');
padreOcupacion.textContent = urlParams.get('ocupacionPadre');

madreNombre.textContent = urlParams.get('nombreMadre');
madreVivo.checked = urlParams.get('viveMadre');
madreMuerto.checked = urlParams.get('fallecidoMadre');
madreDomicilio.textContent = urlParams.get('domicilioMadre');
madreOcupacion.textContent = urlParams.get('ocupacionMadre');
esposaNombre.textContent = urlParams.get('nombreEsp');
esposaVivo.checked = urlParams.get('viveEsp');
esposaDomicilio.textContent = urlParams.get('domicilioEsp');
esposaOcupacion.textContent = urlParams.get('ocupacionEsp');

nombrePrimaria.textContent = urlParams.get('nombrePrimaria');
domicilioPrimaria.textContent = urlParams.get('domicilioPrimaria');
dePrimaria.textContent = urlParams.get('fechaInicioPrimaria');
aPrimaria.textContent = urlParams.get('fechaFinPrimaria');
aniosPrimaria.textContent = urlParams.get('aniosPrimaria');
tituloPrimaria.textContent = urlParams.get('tituloPrimaria');

nombreSecundaria.textContent = urlParams.get('nombreSecundaria');
domicilioSecundaria.textContent = urlParams.get('domicilioSecundaria');
deSecundaria.textContent = urlParams.get('fechaInicioSecundaria');
aSecundaria.textContent = urlParams.get('fechaFinSecundaria');
aniosSecundaria.textContent = urlParams.get('aniosSecundaria');
tituloSecundaria.textContent = urlParams.get('tituloSecundaria');

nombrePrepa.textContent = urlParams.get('nombrePreparatoria');
domicilioPrepa.textContent = urlParams.get('domicilioPreparatoria');
dePrepa.textContent = urlParams.get('fechaInicioPreparatoria');
aPrepa.textContent = urlParams.get('fechaFinPreparatoria');
aniosPrepa.textContent = urlParams.get('aniosPreparatoria');
tituloPrepa.textContent = urlParams.get('tituloPreparatoria');

nombreProfesional.textContent = urlParams.get('nombreProfesional');
domicilioProfesional.textContent = urlParams.get('domicilioProfesional');
deProfesional.textContent = urlParams.get('fechaInicioProfesional');
aProfesional.textContent = urlParams.get('fechaFinProfesional');
aniosProfesional.textContent = urlParams.get('aniosProfesional');
tituloProfesional.textContent = urlParams.get('tituloProfesional');

nombreComercial.textContent = urlParams.get('nombreComercial');
domicilioComercial.textContent = urlParams.get('domicilioComercial');
deComercial.textContent = urlParams.get('fechaInicioComercial');
aComercial.textContent = urlParams.get('fechaFinComercial');
aniosComercial.textContent = urlParams.get('aniosComercial');
tituloComercial.textContent = urlParams.get('tituloComercial');

actualidadEscuela.textContent = urlParams.get('escuelaActual');
actualidadCurso.textContent = urlParams.get('cursoActual');
actualidadGrado.textContent = urlParams.get('gradoActual');


/*DE AQUI ABAJO NO SON VÁLIDOS*/
empleoActual.textContent = urlParams.get('tiempoEmpleoActual');
empleoAnterior1.textContent = urlParams.get('tiempoEmpleoAnterior1');
empleoAnterior2.textContent = urlParams.get('tiempoEmpleoAnterior2');

nombreActual.textContent = urlParams.get('nombreEmpleoActual');
nombreAnterior1.textContent = urlParams.get('nombreEmpleoAnterior1');
nombreAnterior2.textContent = urlParams.get('nombreEmpleoAnterior2');

domicilioActual.textContent = urlParams.get('domicilioEmpleoActual');
domicilioAnterior1.textContent = urlParams.get('domicilioEmpleoAnterior1');
domicilioAnterior2.textContent = urlParams.get('domicilioEmpleoAnterior2');

puestoActual.textContent = urlParams.get('puestoEmpleoActual');
puestoAnterior1.textContent = urlParams.get('puestoEmpleoAnterior1');
puestoAnterior2.textContent = urlParams.get('puestoEmpleoAnterior2');

sueldoActual.textContent = urlParams.get('sueldoEmpleoActual');
sueldoAnterior1.textContent = urlParams.get('sueldoEmpleoAnterior1');
sueldoAnterior2.textContent = urlParams.get('sueldoEmpleoAnterior2');

separacionActual.textContent = urlParams.get('motivoSeparacionEmpleoActual');
separacionAnterior1.textContent = urlParams.get('motivoSeparacionEmpleoAnterior1');
separacionAnterior2.textContent = urlParams.get('motivoSeparacionEmpleoAnterior2');

nombreJefeActual.textContent = urlParams.get('jefeEmpleoActual');
nombreJefeAnterior1.textContent = urlParams.get('jefeEmpleoAnterior1');
nombreJefeAnterior2.textContent = urlParams.get('jefeEmpleoAnterior2');

actividadesActual.textContent = urlParams.get('actEmpleoActual');
actividadesAnterior1.textContent = urlParams.get('actEmpleoAnterior1');
actividadesAnterior2.textContent = urlParams.get('actEmpleoAnterior2');

informes.textContent = urlParams.get('informes');
razones.textContent = urlParams.get('razones');
   // Creamos un objeto JSON con los valores
   var formData = { 
      "fecha": "as",
      "apellido paterno": pApellido.value,
      "apellido materno": sApellido.value,
      "nombres": nombres.value,
      "edad": edad.value,
      "domicilio": domicilio.value,
      "colonia": colonia.value,
      "código postal": codigoPostal.value,
      "telefono": telefono.value,
      "sexo": sexo.value,
      "ciudad": ciudad.value,
      "entidad": entidad.value,
      "fecha de nacimiento": fechaNacimiento.value,
      "nacionalidad": nacionalidad.value,
      "Vive con": viveCon.value,
      "Personas que dependen de usted": personasDependen.value,
      "estado civil": estadoCivil.value,
      "curp": curp.value,
      "afore": nombres.value,
      "rfc": rfc.value,
      "liciencia de manejo": licenciaManejo.value,
      "servicio militar": servicioMilitar.value,
      "pasaporte": pasaporte.value,
      "NSS": nss.value,
      "clase de licencia": claseLicencia.value,
      "Es extranjero": extranjero.value,
      "estado de salud": estadoSalud.value,
      "enfermedad cronica": enfermedadCronica.value,
      "realiza deporte": deporte.value,
      "asiste a club": club.value,
      "que hace en su tiempo libre": tiempoLibre.value,
      "cual es su meta": meta.value,
      "que idiomas habla": idiomas.value,
      "funciones de Oficina": funcionesOficina.value,
      "maquinas de Oficina": maquinasOficina.value,
      "otros Trabajos": otrosTrabajos.value,
      "nombre Referencia1": nombreRef1.value,
      "nombre Referencia2": nombreRef2.value,
      "nombre Referencia3": nombreRef3.value,
      "domicilio Referencia1": domicilioRef1.value,
      "domicilio ferencia2": domicilioRef2.value,
      "domicilio Referencia3": domicilioRef3.value,
      "telefono Referencia1": telefonoRef1.value,
      "telefono Referencia2": telefonoRef2.value,
      "telefono Referencia3": telefonoRef3.value,
      "ocupacion Referencia1": ocupacionRef1.value,
      "ocupacion Referencia2": ocupacionRef2.value,
      "ocupacion Referencia3": ocupacionRef3.value,
      "tiempo Referencia1": tiempoRef1.value,
      "tiempo Referencia2": tiempoRef2.value,
      "tiempo Referencia3": tiempoRef3.value,
      "como se entero del empleo": enterarEmpleo.value,
      "tiene familiares en la empresa": familiaresEmpresa.value,
      "esta afianzado": afianzado.value,
      "a que sindicato": sindicato.value,
      "seguro Vida": seguroVida.value,
      "importe": importe.value,
      "puede cambiar lugar": cambiarLugar.value,
      "fecha para iniciar a trabajar": fechaTrabajar.value,
      "padre": {
        "nombre": padreNombre.value,
        "vivo": padreVivo.checked,
        "muerto": padreMuerto.checked,
        "domicilio": padreDomicilio.value,
        "ocupacion": padreOcupacion.value
      },
       "madre": {
           "nombre": madreNombre.value,
           "vivo": madreVivo.checked,
           "muerto": madreMuerto.checked,
           "domicilio": madreDomicilio.value,
           "ocupacion": madreOcupacion.value
       },
       "esposa": {
           "nombre": esposaNombre.value,
           "vivo": esposaVivo.checked,
           "muerto": esposaMuerto.checked,
           "domicilio": esposaDomicilio.value,
           "ocupacion": esposaOcupacion.value
       },
       "primaria": {
           "nombre": nombrePrimaria.value,
           "domicilio": domicilioPrimaria.value,
           "de": dePrimaria.value,
           "a": aPrimaria.value,
           "anios": aniosPrimaria.value,
           "titulo": tituloPrimaria.value
       },
       "secundaria": {
       "nombre": nombreSecundaria.value,
       "domicilio": domicilioSecundaria.value,
       "de": deSecundaria.value,
       "a": aSecundaria.value,
       "anios": aniosSecundaria.value,
       "titulo": tituloSecundaria.value
     },
     "preparatoria": {
       "nombre": nombrePrepa.value,
       "domicilio": domicilioPrepa.value,
       "de": dePrepa.value,
       "a": aPrepa.value,
       "anios": aniosPrepa.value,
       "titulo": tituloPrepa.value
     },
     "profesional": {
       "nombre": nombreProfesional.value,
       "domicilio": domicilioProfesional.value,
       "de": deProfesional.value,
       "a": aProfesional.value,
       "anios": aniosProfesional.value,
       "titulo": tituloProfesional.value
     },
     "comercial": {
       "nombre": nombreComercial.value,
       "domicilio": domicilioComercial.value,
       "de": deComercial.value,
       "a": aComercial.value,
       "anios": aniosComercial.value,
       "titulo": tituloComercial.value
     },
     "actualidad": {
       "escuela": actualidadEscuela.value,
       "curso": actualidadCurso.value,
       "grado": actualidadGrado.value
     },
     "empleos": {
       "actual": {
         "nombre": nombreActual.value,
         "domicilio": domicilioActual.value,
         "puesto": puestoActual.value
       },
       "anterior1": {
         "nombre": nombreAnterior1.value,
         "domicilio": domicilioAnterior1.value,
         "puesto": puestoAnterior1.value
       },
       "anterior2": {
         "nombre": nombreAnterior2.value,
         "domicilio": domicilioAnterior2.value,
         "puesto": puestoAnterior2.value
       }
     }

   };

   // Imprimimos el objeto JSON en una nueva pestana
    const ventana = window.open("", "_blank", "width=400,height=600");
    ventana.document.write(`<div id="myDiv"></div>`);
    // Convertir el objeto en una cadena JSON legible
      var jsonString = JSON.stringify(formData);

      // Obtener una referencia al elemento HTML
      var myDiv = ventana.document.getElementById("myDiv");

      // Asignar el contenido del objeto JSON al elemento HTML
      myDiv.innerText = jsonString;
}