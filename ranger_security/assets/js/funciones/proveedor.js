$(function(){

	// Lista de docente
	$.post( '../../view/funciones/proveedor.php' ).done( function(respuesta)
	{
		$( '#provee' ).html( respuesta );
	});
	
	
	// Lista de Ciudades
	$( '#provee' ).change( function()
	{
		var el_continente = $(this).val();
		$.post( '../../view/funciones/provee_ruc.php', { continente: el_continente} ).done( function( respuesta )
		{
			$( '#ruc' ).html( respuesta );
		});

	});


	$( '#provee' ).change( function()
	{
		var el_continente = $(this).val();
		$.post( '../../view/funciones/provee_telef.php', { continente: el_continente} ).done( function( respuesta )
		{
			$( '#telef' ).html( respuesta );
		});

	});

	$( '#provee' ).change( function()
	{
		var el_continente = $(this).val();
		$.post( '../../view/funciones/provee_correo.php', { continente: el_continente} ).done( function( respuesta )
		{
			$( '#correo' ).html( respuesta );
		});

	});

	$( '#provee' ).change( function()
	{
		var el_continente = $(this).val();
		$.post( '../../view/funciones/provee_id.php', { continente: el_continente} ).done( function( respuesta )
		{
			$( '#id_prove' ).html( respuesta );
		});

	});

	
})
