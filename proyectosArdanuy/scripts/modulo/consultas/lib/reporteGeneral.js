// JavaScript Document
		function reporGeneral(){
			document.getElementById('general').style.display='block';
			document.getElementById('gastos').style.display='none';
			document.getElementById('facturacion').style.display='none';
			document.getElementById('utilidades').style.display='none';
			document.getElementById('factServProf').style.display='none';
			document.getElementById('contratistas').style.display='none';
		}
    
		function reporGastos(){
			document.getElementById('general').style.display='none';
			document.getElementById('gastos').style.display='block';
			document.getElementById('facturacion').style.display='none';
			document.getElementById('utilidades').style.display='none';
			document.getElementById('factServProf').style.display='none';
			document.getElementById('contratistas').style.display='none';
		}
    
		function reporFactur(){
			document.getElementById('general').style.display='none';
			document.getElementById('gastos').style.display='none';
			document.getElementById('facturacion').style.display='block';
			document.getElementById('utilidades').style.display='none';
			document.getElementById('factServProf').style.display='none';
			document.getElementById('contratistas').style.display='none';
		}
    
		function reporUtilid(){
			document.getElementById('general').style.display='none';
			document.getElementById('gastos').style.display='none';
			document.getElementById('facturacion').style.display='none';
			document.getElementById('utilidades').style.display='block';
			document.getElementById('factServProf').style.display='none';
			document.getElementById('contratistas').style.display='none';
		}
    
		function reporFactServProf(){
			document.getElementById('general').style.display='none';
			document.getElementById('gastos').style.display='none';
			document.getElementById('facturacion').style.display='none';
			document.getElementById('utilidades').style.display='none';
			document.getElementById('factServProf').style.display='block';
			document.getElementById('contratistas').style.display='none';
		}
    
		function reporContratistas(){
			document.getElementById('general').style.display='none';
			document.getElementById('gastos').style.display='none';
			document.getElementById('facturacion').style.display='none';
			document.getElementById('utilidades').style.display='none';
			document.getElementById('factServProf').style.display='none';
			document.getElementById('contratistas').style.display='block';
		}
