import Dropzone from "dropzone";

Dropzone.autoDiscover = false; //si no se pone false, por defecto busca un dropzone

//se apunta al id de donde está el campo --> #ID
const dropzone = new Dropzone('#dropzone', {
	dictDefaultMessage: 'Sube aquí tu imagen...',
	acceptedFiles: ".png,.jpg,.jpeg,.gif",
	addRemoveLinks: true,
	dictRemoveFile: 'Borrar archivo',
	maxFiles: 1,
	uploadMultiple: false
});

// dropzone.on("sending", function(file,xhr,formData){
// 	console.log(xhr);
// 	console.log(formData);
// 	console.log(file);
// });

// dropzone.on("success", function(file,response){
// 	console.log(file);
// 	console.log(response);
// });

// dropzone.on("error", function(file,message){
// 	console.log(message);
// });

// dropzone.on('removedfile', function(){
// 	console.log('Archivo eliminado');
// })