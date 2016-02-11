<html>
	<head>
		
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

		<script>
			
		function ocultarBloques() {
			document.getElementById("nuevaSeccion").style.display="none";
			document.getElementById("eliminaSeccion").style.display="none";
			document.getElementById("nuevaSubseccion").style.display="none";
			document.getElementById("eliminaSubseccion").style.display="none";
			document.getElementById("nuevaPregunta").style.display="none";
		}
		function nuevaSeccion() {
			ocultarBloques();
			document.getElementById("nuevaSeccion").style.display="block";
		}
		function eliminaSeccion() {
			ocultarBloques();
			document.getElementById("eliminaSeccion").style.display="block";
		}
		function nuevaSubseccion() {
			ocultarBloques();
			document.getElementById("nuevaSubseccion").style.display="block";
		}
		function eliminaSubseccion() {
			ocultarBloques();
			document.getElementById("eliminaSubseccion").style.display="block";
		}
		function nuevaPregunta() {
			ocultarBloques();
			document.getElementById("nuevaPregunta").style.display="block";
		}
		function ocultaCuestionario() {
            document.getElementById("cuestionario").style.display="none";
        }
		
		function verCuestionario() {
		alert( $("#nom_CuestB").val() );
        $.post( "modelo.php"
			   , { nom_CuestB: $("#nom_CuestB").val()
			   , funcion: "recuperaPreguntas"}
			   , function( data ) {
			$('#ListadoPreguntas').html( data )
			$("Lista").show()
			document.getElementById("Lista").style.display="block";
			//$("#nom_Cuest").attr( "disabled", "disabled");
		});
		}
		
		function listadoSecciones() {
            $.post( "modelo.php"
				   ,{ nom_CuestB: $("#nom_CuestB").val()
				   , funcion: "listadoSecciones" }
				   , function( data ) {
					var opciones=data.split(",");
					$("#seccionesNSu").text("");
					$("#seccionesNPr").text("");
					$("#seccionesDSe").text("");
					$("#seccionesDSu").text("");
					$("#seccionesDPr").text("");
					for( var i=0; i<opciones.length; ++i ){
						$('#seccionesNSu').append( "<option value=\""+ opciones[i] +"\">" + opciones[i] +"</option>" );
						$('#seccionesNPr').append( "<option value=\""+ opciones[i] +"\">" + opciones[i] +"</option>" );
						$('#seccionesDSe').append( "<option value=\""+ opciones[i] +"\">" + opciones[i] +"</option>" );
						$('#seccionesDSu').append( "<option value=\""+ opciones[i] +"\">" + opciones[i] +"</option>" );
						$('#seccionesDPr').append( "<option value=\""+ opciones[i] +"\">" + opciones[i] +"</option>" );
				   }
				   });
        }
		
		function listadoSubseccionesDSu() {
			alert ("añadiendo" + $("#seccionesDSu").val());
            $.post( "modelo.php"
				   ,{ seccionesDSu: $("#seccionesDSu").val()
				   , funcion: "listadoSubseccionesDSu" }
				   , function( data ) {
					alert(data);
					var opciones=data.split(",");
					$("#subseccionesDSu").text("");
					//$('#subseccionesDSu').append( "<option value=\""+ 'ninguna' +"\">" + 'Selecciona una Subsección' +"</option>" );
					for( var i=0; i<opciones.length; ++i ){
						$('#subseccionesDSu').append( "<option value=\""+ opciones[i] +"\">" + opciones[i] +"</option>" );
				   }
				   });
        }
		
		function listadoSubseccionesNPr() {
			alert ("añadiendo" + $("#seccionesNPr").val());
            $.post( "modelo.php"
				   ,{ seccionesNPr: $("#seccionesNPr").val()
				   , funcion: "listadoSubseccionesNPr" }
				   , function( data ) {
					alert(data);
					var opciones2=data.split(",");
					$("#subseccionesNPr").text("");
					for( var i=0; i<opciones2.length; ++i ){
						$('#subseccionesNPr').append( "<option value=\""+ opciones2[i] +"\">" + opciones2[i] +"</option>" );
				   }
				   });
        }
		
		function listadoSubseccionesDPr() {
			alert ("añadiendo" + $("#seccionesDPr").val());
            $.post( "modelo.php"
				   ,{ seccionesDPr: $("#seccionesDPr").val()
				   , funcion: "listadoSubseccionesDPr" }
				   , function( data ) {
					alert(data);
					var opciones2=data.split(",");
					$("#subseccionesDPr").text("");
					for( var i=0; i<opciones2.length; ++i ){
						$('#subseccionesDPr').append( "<option value=\""+ opciones2[i] +"\">" + opciones2[i] +"</option>" );
				   }
				   });
        }
		
		function listadoPreguntas() {
			alert ("añadiendo" + $("#subseccionesDPr").val());
            $.post( "modelo.php"
				   ,{ subseccionesDPr: $("#subseccionesDPr").val()
				   , funcion: "listadoPreguntas" }
				   , function( data ) {
					alert(data);
					var opciones2=data.split(",");
					$("#preguntas").text("");
					for( var i=0; i<opciones2.length; ++i ){
						$('#preguntas').append( "<option value=\""+ opciones2[i] +"\">" + opciones2[i] +"</option>" );
				   }
				   });
        }
		
		function addCuestionario() {
		alert( "adding" );
        $.post( "modelo.php"
			   , { nom_Cuest: $("#nom_Cuest").val()
			   , funcion: "añadirCuestionario"
			   , function: ocultaCuestionario()}
			   , function( data ) {
			document.getElementById("Lista").style.display="block";
			alert( "Recibido: "+data )
			//$("#nom_Cuest").attr( "disabled", "disabled");
		});
		}
	
		function addSeccion() {
		alert( "adding seccion "+$("#seccionesNSe").val() );
        $.post( "modelo.php"
			   , { nom_CuestB: $("#nom_CuestB").val()
			   , nom_Sec: $("#nom_Sec").val()
			   , seccionesNSe: $("#seccionesNSe").val()
			   , funcion: "añadirSeccion" }
			   , function( data ) {
			alert( "Recibido: "+data +$("#seccionesNSe").val() );
			//$("#nom_Sec").attr( "disabled", "disabled");
		});
		}
		
		function deleteSeccion() {
		alert( "deleting seccion "+$("#seccionesDSe").val() );
        $.post( "modelo.php"
			   , { seccionesDSe: $("#seccionesDSe").val()
			   , funcion: "eliminarSeccion" }
			   , function( data ) {
			alert( "Recibido: "+data + " Seccion: " + $("#seccionesDSe").val() );
			
			//$("#nom_Sec").attr( "disabled", "disabled");
		});
		}
	
		function addSubseccion() {
		alert("adding subseccion" + $("#seccionesNSu").val() + $("#subseccionesNSu").val());
		$.post("modelo.php"
			   , { seccionesNSu: $("#seccionesNSu").val()
			   , subseccionesNSu: $("#subseccionesNSu").val()
			   , nom_Sub: $("#nom_Sub").val()
			   , funcion: "añadirSubseccion" }
			   , function( data ) {
			alert( "Recibido: "+data)
		});
		}
		
		function deleteSubseccion() {
		alert("deleting subseccion" + $("#secciones2").val() + $("#listaSubsecciones").val());
		$.post("modelo.php"
			   , { secciones2: $("#secciones2").val()
			   , listaSubsecciones: $("#listaSubsecciones").val()
			   , funcion: "eliminarSubseccion" }
			   , function( data ) {
			alert( "Recibido: "+data)
		});
		}
	
		function addPregunta() {
		alert("adding pregunta" + $("#tit_Pregunta").val()+ $("#seccionesNPr").val() + $("#subseccionesNPr").val());
		$.post("modelo.php"
			   , { tit_Pregunta: $("#tit_Pregunta").val()
			   , seccionesNPr: $("#seccionesNPr").val()
			   , subseccionesNPr: $("#subseccionesNPr").val()
			   , TiposRespuestas: $("#TiposRespuestas").val()
			   , funcion: "añadirPregunta" }
			   , function( data ) {
			alert( "Pregunta añadida: "+data)
		});
		}
		
		function addRespuesta() {
		alert("adding respuesta" + $("#tit_Pregunta").val());
		$.post("modelo.php"
			   , { tit_Pregunta: $("#tit_Pregunta").val()
			   , opcion1: $("#opcion1").val()
			   , opcion2: $("#opcion2").val()
			   , opcion3: $("#opcion3").val()
			   , opcion4: $("#opcion4").val()
			   , funcion: "añadirRespuesta" }
			   , function( data ) {
			alert( "Respuestas Añadidas: "+data)
		});
		}
		
		function deletePregunta() {
		alert("deleting pregunta" + $("#seccionesP").val() + $("#subseccionesP").val());
		$.post("modelo.php"
			   , { seccionesP: $("#seccionesP").val()
			   , subseccionesP: $("#subseccionesP").val()
			   , preguntas: $("#preguntas").val()
			   , funcion: "eliminarPregunta" }
			   , function( data ) {
			alert( "Recibido: "+data)
		});
		}
		
		$(function dialogSeccion() {
              $("#nuevaSeccion").dialog({
                                  autoOpen: false,
                                  modal: true,
                                  buttons: {
                                  "Cerrar": function dialogSeccion() {
                                  $(this).dialog("close");
                                  }
                                  }
                                  });
              $("#buttonDialogo1")
              .button()
              .click(function dialogSeccion() {
                     $("#nuevaSeccion").dialog("option", "width", 600);
                     $("#nuevaSeccion").dialog("option", "height", 370);
                     $("#nuevaSeccion").dialog("option", "resizable", false);
                     $("#nuevaSeccion").dialog("open");
                     });
		});
		
		$(function dialogDelSeccion() {
              $("#eliminaSeccion").dialog({
                                  autoOpen: false,
                                  modal: true,
                                  buttons: {
                                  "Cerrar": function dialogDelSeccion() {
                                  $(this).dialog("close");
                                  }
                                  }
                                  });
              $("#buttonDialogo2")
              .button()
              .click(function dialogDelSeccion() {
                     $("#eliminaSeccion").dialog("option", "width", 600);
                     $("#eliminaSeccion").dialog("option", "height", 290);
                     $("#eliminaSeccion").dialog("option", "resizable", false);
                     $("#eliminaSeccion").dialog("open");
                     });
		});
	
		$(function dialogSubseccion() {
              $("#nuevaSubseccion").dialog({
                                  autoOpen: false,
                                  modal: true,
                                  buttons: {
                                  "Cerrar": function dialogSubseccion() {
                                  $(this).dialog("close");
                                  }
                                  }
                                  });
              $("#buttonDialogo3")
              .button()
              .click(function dialogSubseccion() {
                     $("#nuevaSubseccion").dialog("option", "width", 600);
                     $("#nuevaSubseccion").dialog("option", "height", 450);
                     $("#nuevaSubseccion").dialog("option", "resizable", false);
                     $("#nuevaSubseccion").dialog("open");
                     });
		});
		
		$(function dialogDelSubseccion() {
              $("#eliminaSubseccion").dialog({
                                  autoOpen: false,
                                  modal: true,
                                  buttons: {
                                  "Cerrar": function dialogDelSubseccion() {
                                  $(this).dialog("close");
                                  }
                                  }
                                  });
              $("#buttonDialogo4")
              .button()
              .click(function dialogSubseccion() {
                     $("#eliminaSubseccion").dialog("option", "width", 600);
                     $("#eliminaSubseccion").dialog("option", "height", 420);
                     $("#eliminaSubseccion").dialog("option", "resizable", false);
                     $("#eliminaSubseccion").dialog("open");
                     });
		});
	
		$(function dialogPregunta() {
              $("#nuevaPregunta").dialog({
                                  autoOpen: false,
                                  modal: true,
                                  buttons: {
                                  "Cerrar": function dialogPregunta() {
                                  $(this).dialog("close");
                                  }
                                  }
                                  });
              $("#buttonDialogo5")
              .button()
              .click(function dialogPregunta() {
                     $("#nuevaPregunta").dialog("option", "width", 600);
                     $("#nuevaPregunta").dialog("option", "height", 700);
                     $("#nuevaPregunta").dialog("option", "resizable", false);
                     $("#nuevaPregunta").dialog("open");
                     });
		});
		
		$(function dialogDelPregunta() {
              $("#eliminaPregunta").dialog({
                                  autoOpen: false,
                                  modal: true,
                                  buttons: {
                                  "Cerrar": function dialogDelPregunta() {
                                  $(this).dialog("close");
                                  }
                                  }
                                  });
              $("#buttonDialogo6")
              .button()
              .click(function dialogDelPregunta() {
                     $("#eliminaPregunta").dialog("option", "width", 600);
                     $("#eliminaPregunta").dialog("option", "height", 400);
                     $("#eliminaPregunta").dialog("option", "resizable", false);
                     $("#eliminaPregunta").dialog("open");
                     });
		});
		
</script>
		
	</head>
	
	<body>
		
		

	</body>
</html>


