// JavaScript Document

	$(document).ready(function() {

		$("#btnModificar").click(function(){
			$(".error").remove();
			if($("#txtNumIden").val()==""){
				$("#txtNumIden").focus().after("<span id='error' class='error normal'>Debe ingresar el numero de identificación del funcionario</span>");
				return false;
			}else if($("#txtNombre").val()==""){
				$("#txtNombre").focus().after("<span id='error' class='error normal'>Debe ingresar el nombre del funcionario</span>");
				return false;
			}else if($("#txtApellido").val()==""){
				$("#txtApellido").focus().after("<span id='error' class='error normal'>Debe ingresar el apellido del funcionario</span>");
				return false;
			}else if($("#txtTelefono").val()==""){
				$("#txtTelefono").focus().after("<span id='error' class='error normal'>Debe ingresar el telefono del funcionario</span>");
				return false;
			}else if($("#txtClave").val()!="" && ($("#txtClave").val() != $("#txtReClave").val())){
				$("#txtClave").focus().after("<span id='error' class='error normal'>La contraseña no coincide con la confirmación</span>");
				$("#txtReClave").focus().after("<span id='error' class='error normal'>La contraseña no coincide con la confirmación</span>");
				return false;
			}else{
//				alert('Sofia Araujo');
				$('#txtBandera').attr({'value':'1'});
				$('#frmModificarUsuario').attr('action','./index.php?seccion=MODIUSUARI');
				$('#frmModificarUsuario').submit();
			}
		});

	});
