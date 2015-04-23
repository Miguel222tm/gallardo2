
$(document).ready(function(){
	    

    $("#chat").ready(function(){
    	setInterval(chatsillo, 1500);
    	setInterval(cerrarTodo, 1200000);
	});
	 $("#usuarios").ready(function(){
    	setInterval(members, 1500);
	});

	function chatsillo(){
		$("#chat").load("conversacion.php");
	}
	function members(){
		$("#usuarios").load("members.php");
	}
	function cerrarTodo(){

		$("#cerrar").load("cerrar.php");
	}
       





});
