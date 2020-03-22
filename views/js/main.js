$(function(){

	// Elementos ocultos
	$("#my_account_save_name,#my_account_save_pass,#frmEditUser,#btn-editsave-user, #tableTrab, #form-reposo").hide();
	
	// Elementos bloqueados
	$('#my_a_name,#my_a_pass,#my_a_pass_confirm,#my_a_pass_actual').attr('disabled', true);

	// Ejecutar función que muestra la lista de usuarios en la vista users
	list_users();

	// Cerrar sesión
	$(document).on("click", "#closesesion", function (){
		
		alertify.confirm("Cerrar sesión", "¿Estás seguro de querer cerrar la sesión?", function(){

			window.location = '../controllers/cerrarSesion.php';

		},function(){ });

		return false;

	});



		

	

	

// 	// mostrar modal de registro de centro medico
// 	$(document).on("change","#CenmediT", function () {
		
	
// 		$('#frm-reg-centroMedico').modal('show');
		
	
// });

	// ocultar el formulario del medico
	$(document).on("click","#reg-reposo-modal", function () {
		// alert("hola");
		
			$('#tableR').hide();
			$('#tableRe').hide();
			$('#historia').hide();
			$('#form-reposo').show();
		
	});

	$(document).on("click","#cerrarMedico", function () {
		// alert("hola");
			window.location = 'buscar';
			$('#tableR').hide();
			$('#tableRe').hide();
			$('#historia').hide();
			$('#form-reposo').show();
		
	});
	

	// Botón de editar usuario
	$(document).on("click", "#btn-edit-user", function(){

		$("#frmEditUser,#btn-editsave-user").show();
		$("#frmEditName").val(document.getElementById('nombre').innerHTML);
		$("#frmEditStatus").val(1);
		$(this).hide();
		return false;

	});

	// Guardar cambios editar usuario
	$(document).on("click", "#btn-editsave-user", function(){

		user = document.getElementById('usuario').innerHTML;

		$.ajax({
			type: "post",
			url: "../controllers/ajaxController.php",
			// url: "../controllers/editUserController.php",
			data: { usuario : user, name : $("#frmEditName").val(), status : $("#frmEditStatus").val() },
			success: function (r){

				switch(r){
					case "1":
						alertify.success("Actualizado con éxito!");
						$("#frmEditUser")[0].reset();
						$("#zoom-user-modal").modal('hide');
						$("#frmEditUser").hide();
						list_users();
						break;
				
					case "":
						alertify.warning("No se pudo actualizar los datos!");
						break;
				}

			}
		});
		
		return false;

	});

	// Registrar usuarios
	$(document).on("submit", "#frm-reg-user", function(){
		

		$.ajax({
			type: "post",
			url: "../controllers/ajaxController.php",
			data: $("#frm-reg-user").serialize(),
			success: function (r) { console.log(r);

				switch (r) {
					case '1':
						alertify.success("Usuario registrado correctamente");
						$("#frm-reg-user")[0].reset();
						$("#reg-user-modal").modal('hide');
						list_users();
						break;

					case '2':
							alertify.warning("Formulario incompleto");
							break;
				
					case "":
						alertify.error("No se pudo registrar!");
						$("#frm-reg-user")[0].reset();
						break;
				}

			}
		});

		return false;

	});
	
		// mostrar modal de registro de medico y a su vez registrar el MEDICO
		$(document).on("change","#mediT", function () {
		
			var modalMedico=$('#mediT').val();

			if (modalMedico == 1) {
		
				$('#reg-medico-modal').modal('show');
			
			}
		});
		recargaMedico();

			// mostrar modal de registro de medico y a su vez registrar el MEDICO
			$(document).on("change","#CenmediT", function () {
		
				
				var CMedico=$('#CenmediT').val();
				// console.log(CMedico);
	
				if (CMedico == 1) {
			
					$('#reg-CentroMedico-modal').modal('show');
					// alert("hola");
				
				}
			});
		recargaCMedico();
	//Registrar reposo modal

	$(document).on("submit", "#frm-reg-medico-modal", function(){
		
		
		// console.log( $("#frm-reg-medico-modal").serialize());

		alertify.confirm('Registrar Medico', '<br> <center> Esta Seguro de Registar Este Medico?</c> ', function(){
			alertify.success('Procesando Registro!');
			$.ajax({
				type: "post",
				url: "../controllers/ajaxController.php",
				data: $("#frm-reg-medico-modal").serialize(),
				success: function (r) { console.log(r);
	
					switch (r) {
						case '1':
							alertify.success("Medico registrado correctamente");
							$("#frm-reg-medico-modal")[0].reset();
							$('#reg-medico-modal').modal('hide');
							recargaMedico();
							break;
						case '2':
								alertify.warning("Formulario incompleto");
								break;
					
						case "":
							alertify.error("No se pudo registrar!");
							break;
					}	
				}
			});
		},function(){
			alertify.error('Se Cancelo el Registro!');
			
		}).set({labels:{ok:'Si', cancel: 'Cancelar'}, padding: false});

		
		return false;
		

	});

	// Registrar reposo
	$(document).on("submit", "#frm-reg-repos", function(){
		var trabajador = $("#cd").val();
		var cedul = $("#cd").val();
		var centroM = $("#CenmediT").val();
		var medico = $("#mediT").val();
		var diagnostico = $("#repoDiag").val();
		var desde = $("#desdeRep").val();
		var hasta = $("#hastaRep").val();
		var observasion = $("#repObserva").val();
		var archivoRep = $("#archivoRepo").val();

		var date_1 = new Date(desde);
		var date_2 = new Date(hasta);

		var day_as_milliseconds = 86400000;
		var diff_in_millisenconds = date_2 - date_1;
		var diff_in_days = diff_in_millisenconds / day_as_milliseconds;

		console.log( diff_in_days );
		if (diff_in_days > 3) {
			console.log("Debes ingrese la fecha de convalidacion");
			console.log(cedul);
		}

		// VALIDAMOS CON UN IF SI LOS CAMPOS DEL FORMULARIOS NO ESTAN VACIOS
		if ((centroM && medico && diagnostico && desde && hasta && observasion).length > 0) {
			// alertify.success('Formulario incompleto!');
		// 	console.log(centroM);
		// console.log(medico);
		// console.log(diagnostico);
		// console.log(desde);
		// console.log(hasta);
		// console.log(observasion);
		// console.log(archivoRep);

		
	

		
		var datos = {
			"cemtroM" : centroM,
			"medico" : medico,
			// "idtrabajador" : trabajador,
			"cedula" : cedul,
			"diagnostico" : diagnostico,
			"desde" : desde,
			"hasta" : hasta,
			"dias" : diff_in_days,
			"observasion" : observasion,
			"archivoRep" : archivoRep
		};
		console.log(datos);
		// 	alertify.confirm('Registrar Medico', '<br> <center> Esta Seguro de Registar Este Medico?</c> ', function(){
		// 	alertify.success('Procesando Registro!');
		// 	$.ajax({
		// 		type: "post",
		// 		url: "../controllers/ajaxController.php",
		// 		data: datos,
		// 		success: function (r) { console.log(r);
	
		// 			switch (r) {
		// 				case '1':
		// 					alertify.success("Medico registrado correctamente");
		// 					$("#frm-reg-medico-modal")[0].reset();
		// 					$('#reg-medico-modal').modal('hide');
		// 					recargaMedico();
		// 					break;
		// 				case '2':
		// 						alertify.warning("Formulario incompleto");
		// 						break;
					
		// 				case "":
		// 					alertify.error("No se pudo registrar!");
		// 					break;
		// 			}	
		// 		}
		// 	});
		// },function(){
		// 	alertify.error('Se Cancelo el Registro!');
			
		// }).set({labels:{ok:'Si', cancel: 'Cancelar'}, padding: false});

		} else {
			
		alertify.success('Formulario incompleto!');
		}
		

		
		return false;
		

	});

	// Registrar medico
	$(document).on("submit", "#formMedico", function(){
		
		console.log( $("#formMedico").serialize());
			 
			alertify.confirm('Registrar Medico', '<br> <center> Esta Seguro de Registar Este Medico?</c> ', function(){
				alertify.success('Procesar Registro!');
				// alert('Excelente');
				$.ajax({
					type: "post",
					url: "../controllers/ajaxController.php",
					data: $("#formMedico").serialize(),
					success: function (r) { console.log(r);
		
						switch (r) {
							case '1':
								alertify.success("Medico registrado correctamente");
								
								$("#formMedico")[0].reset();
								
								break;
		
							case '2':
									alertify.warning("Formulario incompleto");
									break;
						
							case "":
								alertify.error("No se pudo registrar!");
								// $("#formMedico")[0].reset();
								break;
						}
		
					}
				});
			},function(){
				alertify.error('Se Cancelo el Registro!');
				
			}).set({labels:{ok:'Si', cancel: 'Cancelar'}, padding: false});

		
		

		return false;

	});

	// Registrar Centro medico
	$(document).on("submit", "#frm-reg-centroMedico", function(){
		

		if ($('#centroM').val()=="") {
			alertify.error("Ingrese el nombre de la clinica!");
			return false;
		}
		 
		alertify.confirm('Registrar Centro Medico', '<br> <center> Esta Seguro de Registar Este Centro Medico?</c> ', function(){
			alertify.success('Procesar Registro!');
			// alert('Excelente');
			$.ajax({
				type: "post",
				url: "../controllers/ajaxController.php",
				data: $("#frm-reg-centroMedico").serialize(),
				success: function (r) { console.log(r);
	
					switch (r) {
						case '1':
							alertify.success("Centro medico registrado correctamente");
						
							$("#frm-reg-centroMedico")[0].reset();
							break;
	
						case '2':
								alertify.warning("Formulario incompleto");
								break;
					
						case "":
							alertify.error("No se pudo registrar!");
							// $("#frm-reg-centroMedico")[0].reset();
							break;
					}
	
				}
			});
		},function(){
			alertify.error('Se Cancelo Registro!');
			
		}).set({labels:{ok:'Si', cancel: 'Cancelar'}, padding: false});

	
	

	return false;

});

	// Función de interacción de los botones en la vista myaccount
	$(document).on('click', '#my_account_name', function(){

		$("#my_account_save_name").show();
		$("#my_account_save_pass").hide();
		$("#my_a_name").attr('disabled', false);
		$("#my_a_pass,#my_a_pass_confirm,#my_a_pass_actual").attr('disabled', true);
		return false;

	});

	// Función de interacción de los botones en la vista myaccount
	$(document).on('click', '#my_account_pass', function(){

		$("#my_account_save_pass").show();
		$("#my_account_save_name").hide();
		$("#my_a_name").attr('disabled', true);
		$("#my_a_pass,#my_a_pass_confirm,#my_a_pass_actual").attr('disabled', false);
		return false;

	});

	// Función que actualiza la el nombre del usuario en la vista myaccount
	$(document).on('click', '#my_account_save_name', function(){

		name = $("#my_a_name").val();
		myaccount_update(name);
		$(this).hide();
		return false;

	});

	// Función que actualiza la contraseña del usuario en la vista myaccount
	$(document).on('click', '#my_account_save_pass', function(){

		$("#my_a_pass,#my_a_pass_actual").attr('disabled', false);
		new_pass = $("#my_a_pass").val();
		old_pass = $("#my_a_pass_actual").val();
		myaccount_update_pass(old_pass,new_pass);
		return false;

	});

	// Comparar contraseñas
	$(document).on("focusout", "#my_a_pass", function(){

		var vacio = "La contraseña no puede estar vacía";
		var longitud = "La contraseña debe estar formada entre 6-10 carácteres";

		pass1 = $('#my_a_pass').val();
		pass2 = $('#my_a_pass_confirm').val();

		if(pass1.length==0 || pass1==""){

			document.getElementById("msg_pass").innerHTML = vacio;
			$("#msg_pass").addClass("text-danger");
			$("#msg_pass").removeClass("text-success");	
	
		}else{

			if(pass1.length<6 || pass1.length>10){

				document.getElementById("msg_pass").innerHTML = longitud;
				$("#my_a_pass_confirm").attr('disabled', true);
		
			}else{

				if(pass1.length>5 || pass1.length<11){

					$("#my_a_pass_confirm").attr('disabled', false);

					$("#my_a_pass_confirm").on('keyup', function (){
						
						coincidePassword();

					});
			
				}else{
		
					$("#my_a_pass_confirm").attr('disabled', true);
		
				}

			}

		}
		
	});

}); // Cierre de la función ready

//función que comprueba las dos contraseñas
function coincidePassword(){

	var confirmacion = "Las contraseñas coinciden";
	var negacion = "No coinciden las contraseñas";
	
	var valor1 = $('#my_a_pass').val();
	var valor2 = $('#my_a_pass_confirm').val();
	
	//condiciones dentro de la función
	
	if(valor1 != valor2){

		document.getElementById("msg_pass").innerHTML = negacion;
		$("#msg_pass").addClass("text-danger");
		$("#msg_pass").removeClass("text-success");

	}

	if(valor1.length!=0 && valor1==valor2){

		document.getElementById("msg_pass").innerHTML = confirmacion;
		$("#msg_pass").removeClass("text-danger");
		$("#msg_pass").addClass("text-success");
		$("#my_a_pass_actual").attr('disabled', false);
		$("#my_a_name,#my_a_pass,#my_a_pass_confirm").attr('disabled', true);

	}

}

// Función que carga los datos del usuario en la vista myaccount
function myaccount(){

	$.ajax({
		type: "get",
		url: "../controllers/myAccountController.php",
		success: function (r){

			datos = JSON.parse(r);
			document.getElementById('my_a_user').innerHTML = datos[0];
			document.getElementById('my_a_name').value = datos[1];
			document.getElementById('my_a_date').innerHTML = datos[2];
			document.getElementById('my_a_rol').innerHTML = datos[3];
			document.getElementById('my_a_status').innerHTML = datos[4];
			
		}
	});

}

// Función que actualiza el nombre del usuario en la vista myaccount
function myaccount_update(name){

	$.ajax({
		type: "post",
		url: "../controllers/ajaxController.php",
		data: { my_a_name : name },
		success: function (r){

			switch (r) {
				case "1":
					alertify.success('Datos actualizados correctamente!');
					myaccount();
					$('#my_a_name,#my_a_pass,#my_a_pass_confirm,#my_a_pass_actual').attr('disabled', true);
					$("#my_account_save").hide();
					$("#my_account_edit").show();
					break;
			
				case "":
					alertify.warning('No se pudo actualizar el nombre!');
					break;
			}

		}

	});
	
}

// Función que actualiza la contraseña del usuario en la vista myaccount
function myaccount_update_pass(old_pass,new_pass){

	$.ajax({
		type: "post",
		url: "../controllers/ajaxController.php",
		data: { current_pass : old_pass, new_pass : new_pass },
		success: function (r){

			switch (r) {
				case "":
					alertify.error("No se pudo actualizar la clave");
					break;
			
				case "1":
					alertify.success('Contraseña actualizada correctamente!');
					myaccount();
					$('#my_a_name,#my_a_pass,#my_a_pass_confirm,#my_a_pass_actual').attr('disabled', true);
					$("#my_a_pass,#my_a_pass_confirm,#my_a_pass_actual").val("");
					document.getElementById("msg_pass").innerHTML = "";
					$("#my_account_save_pass").hide();
					break;
			}

		}
		
	});
	
}

// Obtener lista de usuarios
function list_users(){

	$('#userTable').DataTable({
		"destroy": true,
		"ajax":{
			"url": "../controllers/usersController.php"
		},
		"columns":[
			{"data": "nro"},
			{"data": "civ"},
			{"data": "nombre"},
			{"data": "rol"},
			{"data": "reg_date"},
			{"data": "opciones"}
		],
		"columnDefs": [
			{
			"targets": 0,
			"className": "text-center",
			"width": "4%"
		   },
		   {
			"targets": 1,
			"className": "text-center",
		   },
		   {
			"targets": 3,
			"className": "text-center",
			},
			{
			"targets": 4,
			"className": "text-center",
			},
			{
			"targets": 5,
			"className": "text-center"
		   	}
		],
		"language": spanish
	});

}

// Zoom usuarios
function zoom_user(id){

	$.get("../controllers/ajaxController.php", { zoom_user : id }, function (r){

		datos = JSON.parse(r);
		$("#usuario").html(datos.civ).addClass('font-weight-bold');
		$("#nombre").html(datos.nombre).addClass('font-weight-bold');
		$("#rol").html(datos.rol).addClass('font-weight-bold');
		$("#fecha").html(datos.reg_date).addClass('font-weight-bold');

	});

}

// Borrar usuarios
function delete_user(id){

	alertify.confirm("Eliminar usuario", "¿Seguro quieres eliminar este usuario?", function(){

    	$.get("../controllers/ajaxController.php", { d_user : id }, function (r){
			
			alertify.success("Usuario eliminado con éxito");
			list_users();

		});

	}, function(){});

}

// Idioma español para datatables
var spanish = {

	"sProcessing":     "Procesando...",
	"sLengthMenu":     "Mostrar _MENU_ registros",
	"sZeroRecords":    "No se encontraron resultados",
	"sEmptyTable":     "Ningún dato disponible en esta tabla",
	"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	"sInfoPostFix":    "",
	"sSearch":         "Buscar:",
	"sUrl":            "",
	"sInfoThousands":  ",",
	"sLoadingRecords": "Cargando...",
	"oPaginate": {
	"sFirst":    "Primero",
	"sLast":     "Último",
	"sNext":     "Siguiente",
	"sPrevious": "Anterior"
		},
	"oAria": {
	"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	"sSortDescending": ": Activar para ordenar la columna de manera descendente"
	}

}

// Grafica
function crearCadenaLineal(json){
	var parsed = JSON.parse(json);
	var arr = [];
	for(var x in parsed){
	arr.push(parsed[x]);
	}
	return arr;
}

function graficaHome(datosX1,datosY1,datosX2,datosY2){
	var linea1 = {
        x: datosX1,
        y: datosY1,
        type: 'scatter',
        name: 'Administrador'
        };

    var linea2 = {
        x: datosX2,
        y: datosY2,
        type: 'scatter',
        name: 'Analista'
        };

	var layout = {
	title: 'Usuarios',
	xaxis: {
		title: 'Meses',
		showgrid: false,
		zeroline: false
	},
	yaxis: {
		title: 'Total',
		showline: false
	}
	};

	var data = [linea1, linea2];

	Plotly.newPlot('graficaLinea', data, layout,{}, {showSendToCloud: true});
}


// Obtener lista trabajador
function trabBusc(){

	ced = document.getElementById('trab').value;
	// console.log(ced);
	$.ajax({
		type: "POST",
		data: {cedula:ced},
		url: "../controllers/trabajadorController.php",
		success:function(r){
			r = JSON.parse(r);
			// console.log(r.cedula);
			// $('#tableTrab').show();
			$('#cd').html(r.cedula);
			$('#nomb').html(r.nombres);
			$('#jer').html(r.cargo);
			$('#sta').html(r.estatus);
			$('#dep').html(r.dependencia);
			$('#nomina').html(r.nomina);
			$('#tel').html(r.celular);
			$('#correo').html(r.email);
			// $('#cd').html(r.cedula);
			//ocultamos el campo de busqueda
			// $('#buscartrab').hide();
		}
	})
	// $('#table-trab').html()({
	// 	"destroy": true,
	// 	"ajax":{
	// 		"method": "GET",
	// 		"url": "../controllers/trabController.php"
	// 	},
	// 	"columns":[
	// 		{"data": "nro"},
	// 		{"data": "cd"},
	// 		{"data": "nomb"},
	// 		{"data": "nomi"},
	// 		{"data": "est"},
	// 		{"data": "dep"},
	// 		{"data": "fech_mov"},
	// 		{"data": "opciones"}
	// 	],
	// 	"language": spanish
	// });

}

//Cargamos el selec del municipio
$(document).ready(function(){

	mostrarMunicipio();

	$('#estadoC').change(function () { 
		mostrarMunicipio();
		
	});
})
 // enviamos el id del estado 
function mostrarMunicipio(){

	id_estado = $('#estadoC').val(),
	// console.log(id_estado);
	$.ajax({
		type: "POST",
		data: {estado:id_estado},
		url: "../controllers/localidadController.php",
		success:function(r){
			// console.log(r);
			$('#municipio').html(r);
			
		}
	})


}

//Se guardara la informacion de centro medico

function centroM() {
	$.ajax({
		type: "POST",
		url: "../controllers/servicioController.php",
		data: "data",
		
		success: function (response) {
			
		}
	});
}

// Zoom trabajador
function zoom_trab(id_trab){
	
	$.get("../controllers/ajaxController.php", { zoom_trab : id_trab }, function (r){

		
		// id_trab = document.getElementById('trab').value;


		r = JSON.parse(r);
		console.log(r);
		// // alert(datos);
		$("#idtrab").html(r.id_trabajador).addClass('font-weight-bold');
		$("#ced").html(r.cedula).addClass('font-weight-bold');
		$("#nomb").html(r.nombres).addClass('font-weight-bold');
		$("#nomina").html(r.trabajador_nomina).addClass('font-weight-bold');
		$("#sta").html(r.estatus).addClass('font-weight-bold');
		$("#dep").html(r.dependencia).addClass('font-weight-bold');
		$("#fechUlt").html(r.fecha_ultimo_movimiento).addClass('font-weight-bold');
	

	});
		

}
	// recargar el selec del formulario de registro
	function recargaMedico() {

		$.get("../controllers/selectMedicoController.php", function (r){
			// console.log(r);
			
			$('#midicos').html(r);
		});
	}

	// recargar el selec del formulario de registro
	function recargaCMedico() {

		$.get("../controllers/selectCMedicoController.php", function (r){
			// console.log(r);
			
			$('#Cenmedi').html(r);
		});
	}

	// form-doctor
	// function buscarDoctor(){
	// 	$('#form-doctor').shadow();
	// }
