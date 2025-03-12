/*ValidacionPersonalizada Prototype:
-Realiza un seguimiento de la lista de mensajes de invalidez para la entrada.
-Realiza un seguimiento de las comprobaciones de validez que se deben realizar para esta entrada.
-Realiza las comprobaciones de validez y envia comentarios al front-end. */

function ValidacionPersonalizada(input){
	this.invalido = [];
	this.verificarValidez = [];
	//Agrega una referencia al nodo de entrada.
	this.inputNode = input;
	//Metodo de activacion para adjuntar al listener.
	this.registroListener();
}

ValidacionPersonalizada.prototype = {
	agregarInvalidez: function(mensaje) {
		this.invalido.push(mensaje);
	},
	getInvalido: function(){
		return this.invalido.join('. \n');
	},
	verValidez: function(input) {
		for(var i = 0; i < this.verificarValidez.length; i++){
			var esInvalido = this.verificarValidez[i].esInvalido(input);
			if (esInvalido) {
				this.agregarInvalidez(this.verificarValidez[i].mensajeInvalido);
			}//Cierre del if

			var requirementElement = this.verificarValidez[i].element;
			if (requirementElement){
				if (esInvalido){
					requirementElement.classList.add('invalido');
					requirementElement.classList.remove('valido');

				} else {
					requirementElement.classList.remove('invalido');
					requirementElement.classList.add('valido');
				} //cierre del else
			}//cierre del if (requirementElement)
		}//fin del ciclo for
	}, // cierre de verValidez.
	checkInput: function() { //encapsulamos el contenido del checkInput.
		this.invalido = [];
		this.verValidez(this.inputNode);
		if (this.invalido.length === 0 && this.inputNode.value !== ''){
			this.inputNode.setCustomValidity('');
		} else {
			var mensaje = this.getInvalido();
			this.inputNode.setCustomValidity(mensaje);
		} //fin del else
	}, //fin del checkInput.
	registroListener: function() { //Registramos al listener.
		var ValidacionPersonalizada = this;
		this.inputNode.addEventListener('keyup', function() {
			ValidacionPersonalizada.checkInput();
		});
	} //fin del registroListener
}; //Fin de la ValidacionPersonalizada.prototype

/*
Validity Checks
Son las matrices de comprobación de validez de cada entrada. Constan de 3 cosas:
1. esInvalido() - Es la función para determinar si la entrada cumple un requisito particular.
2. mensajeInvalido() - Es el mensaje de error para mostrar si el campo no es válido.
3. element - Es el elemento que establece el requisito.
*/

var passwordverificarValidez = [
	{
		esInvalido: function(input){
			return input.value.length < 8 || input.value.length > 100;
		},
		mensajeInvalido: 'Esta entrada debe tener entre 8 y 100 caracteres.',
		element: document.querySelector('#registration .input-requirements li:nth-child(1)')
	},
	{
		esInvalido: function(input){
			return !input.value.match(/[0-9]/g);
		},
		mensajeInvalido: 'Se requiere al menos 1 número.',
		element: document.querySelector('#registration .input-requirements li:nth-child(2)')
	},
	{
		esInvalido: function(input){
			return !input.value.match(/[a-z]/g);
		},
		mensajeInvalido: 'Se requiere al menos una letra minúscula.',
		element: document.querySelector('#registration .input-requirements li:nth-child(3)')
	},
	{
		esInvalido: function(input){
			return !input.value.match(/[A-Z]/g);
		},
		mensajeInvalido: 'Se requiere al menos 1 letra mayúscula.',
		element: document.querySelector('#registration .input-requirements li:nth-child(4)')
	},
	{
		esInvalido: function(input) {
			return !input.value.match(/[\!\@\#\$\%\^\&\*\.\_\¡\/\=\?\¿\-\,\;]/g);
		},
		mensajeInvalido: 'Se requiere algun caracter especial.',
		element: document.querySelector('#registration .input-requirements li:nth-child(5)')
		
	}
];

var passwordRepeatverificarValidez = [
	{
		esInvalido: function() {
			return repetirPasswordInput.value != passwordInput.value;
		},
		mensajeInvalido: 'Esta contraseña debe coincidir con la primera.'
	}
];

/*
Setup ValidacionPersonalizada
1. Configuramos el prototype ValidacionPersonaliza para cada input.
2. Y también establecemos que matriz de comprabación de validez se utilizará en cada input.
*/

var passwordInput = document.getElementById('password');
var repetirPasswordInput = document.getElementById('password_repeat');

passwordInput.ValidacionPersonalizada = new ValidacionPersonalizada(passwordInput);
passwordInput.ValidacionPersonalizada.verificarValidez = passwordverificarValidez;

repetirPasswordInput.ValidacionPersonalizada = new ValidacionPersonalizada(repetirPasswordInput);
repetirPasswordInput.ValidacionPersonalizada.verificarValidez = passwordRepeatverificarValidez;

/*
Eventos de Listeners
*/

var inputs = document.querySelectorAll('input:not([type="submit"])');
var submit = document.querySelector('input[type="submit"]');
var form = document.getElementById('registration');
function validar(){
	for (var i=0; i < inputs.length; i++){
		inputs[i].ValidacionPersonalizada.checkInput();
	}
}
submit.addEventListener('click', validar);
form.addEventListener('submit', validar);