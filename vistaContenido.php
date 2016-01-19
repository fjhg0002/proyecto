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
		function verListado() {
			document.getElementById("Lista").style.display="block";
		}
		function ocultarCuestionario() {
			document.getElementById("Cuestionario").style.display="none";
		}
	
		function addCuestionario() {
		alert( "adding" );
        $.post( "modelo.php"
			   , { nom_Cuest: $("#nom_Cuest").val()
			   , funcion: "añadirCuestionario" }
			   , function( data ) {
			document.getElementById("Lista").style.display="block";
			alert( "Recibido: "+data )
			//$("#nom_Cuest").attr( "disabled", "disabled");
		});
		}
	
		function addSeccion() {
		alert( "adding seccion "+$("#secciones").val() );
        $.post( "modelo.php"
			   , { nom_Cuest: $("#nom_Cuest").val()
			   , nom_Sec: $("#nom_Sec").val()
			   , secciones: $("#secciones").val()
			   , funcion: "añadirSeccion" }
			   , function( data ) {
			alert( "Recibido: "+data +$("#secciones").val() );
			//$("#nom_Sec").attr( "disabled", "disabled");
		});
		}
		
		function deleteSeccion() {
		alert( "deleting seccion "+$("#secciones").val() );
        $.post( "modelo.php"
			   , { nom_Cuest: $("#nom_Cuest").val()
			   , secciones: $("#secciones").val()
			   , funcion: "eliminaSeccion" }
			   , function( data ) {
			alert( "Recibido: "+data +$("#secciones").val() );
			//$("#nom_Sec").attr( "disabled", "disabled");
		});
		}
	
		function addSubseccion() {
		alert("adding subseccion" + $("#secciones2").val() + $("#listaSubsecciones").val());
		$.post("modelo.php"
			   , { secciones2: $("#secciones2").val()
			   , listaSubsecciones: $("#listaSubsecciones").val()
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
			   , funcion: "eliminaSubseccion" }
			   , function( data ) {
			alert( "Recibido: "+data)
		});
		}
	
		function addPregunta() {
		alert("adding pregunta" + $("#tit_Pregunta").val()+ $("#seccionesP").val() + $("#subseccionesP").val());
		$.post("modelo.php"
			   , { tit_Pregunta: $("#tit_Pregunta").val()
			   , seccionesP: $("#seccionesP").val()
			   , subseccionesP: $("#subseccionesP").val()
			   , TiposRespuestas: $("#TiposRespuestas").val()
			   //, opcion1: $("#opcion1").val()
			   //, opcion2: $("#opcion2").val()
			   //, opcion3: $("#opcion3").val()
			   //, opcion4: $("#opcion4").val()
			   , funcion: "añadirPregunta" }
			   , function( data ) {
			alert( "Recibido: "+data)
		});
		}
		
		function deletePregunta() {
		alert("deleting pregunta" + $("#seccionesP").val() + $("#subseccionesP").val());
		$.post("modelo.php"
			   , { seccionesP: $("#seccionesP").val()
			   , subseccionesP: $("#subseccionesP").val()
			   , funcion: "eliminaPregunta" }
			   , function( data ) {
			alert( "Recibido: "+data)
		});
		}
		
		$(function dialogSeccion() {
              $("#nuevaSeccion").dialog({
                                  autoOpen: false,
                                  modal: true,
                                  buttons: {
                                  "Aceptar": function dialogSeccion() {
                                  $(this).dialog("close");
                                  },
                                  "Cerrar": function dialogSeccion() {
                                  $(this).dialog("close");
                                  }
                                  }
                                  });
              $("#button1")
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
                                  "Aceptar": function dialogDelSeccion() {
                                  $(this).dialog("close");
                                  },
                                  "Cerrar": function dialogDelSeccion() {
                                  $(this).dialog("close");
                                  }
                                  }
                                  });
              $("#button2")
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
                                  "Aceptar": function dialogSubseccion() {
                                  $(this).dialog("close");
                                  },
                                  "Cerrar": function dialogSubseccion() {
                                  $(this).dialog("close");
                                  }
                                  }
                                  });
              $("#button3")
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
                                  "Aceptar": function dialogDelSubseccion() {
                                  $(this).dialog("close");
                                  },
                                  "Cerrar": function dialogDelSubseccion() {
                                  $(this).dialog("close");
                                  }
                                  }
                                  });
              $("#button4")
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
                                  "Aceptar": function dialogPregunta() {
                                  $(this).dialog("close");
                                  },
                                  "Cerrar": function dialogPregunta() {
                                  $(this).dialog("close");
                                  }
                                  }
                                  });
              $("#button5")
              .button()
              .click(function dialogPregunta() {
                     $("#nuevaPregunta").dialog("option", "width", 600);
                     $("#nuevaPregunta").dialog("option", "height", 775);
                     $("#nuevaPregunta").dialog("option", "resizable", false);
                     $("#nuevaPregunta").dialog("open");
                     });
		});
		
		$(function dialogDelPregunta() {
              $("#eliminaPregunta").dialog({
                                  autoOpen: false,
                                  modal: true,
                                  buttons: {
                                  "Aceptar": function dialogDelPregunta() {
                                  $(this).dialog("close");
                                  },
                                  "Cerrar": function dialogDelPregunta() {
                                  $(this).dialog("close");
                                  }
                                  }
                                  });
              $("#button6")
              .button()
              .click(function dialogDelPregunta() {
                     $("#eliminaPregunta").dialog("option", "width", 600);
                     $("#eliminaPregunta").dialog("option", "height", 775);
                     $("#eliminaPregunta").dialog("option", "resizable", false);
                     $("#eliminaPregunta").dialog("open");
                     });
		});	
		</script>
		
	</head>
	
	<body>
		
		

	</body>
</html>


