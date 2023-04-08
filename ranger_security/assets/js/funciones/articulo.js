$(function(){

	// Lista de docente
	$.post( '../../view/funciones/articulo.php' ).done( function(respuesta)
	{
		$( '#arti' ).html( respuesta );
	});
	
	
	// Lista de articulos
	$( '#arti' ).change( function()
	{
		var el_continente = $(this).val();
		$.post( '../../view/funciones/arti_detalle.php', { continente: el_continente} ).done( function( respuesta )
		{
			$( '#detalle' ).html( respuesta );
		});

	});


	$( '#arti' ).change( function()
	{
		var el_continente = $(this).val();
		$.post( '../../view/funciones/arti_stock.php', { continente: el_continente} ).done( function( respuesta )
		{
			$( '#stock' ).html( respuesta );
		});

	});


	
})
