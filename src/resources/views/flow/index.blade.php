<form method="post" action="">
{{ csrf_field() }}
Orden N°: <input type="text" name="orden" id="orden" /><br />
Monto : <input type="text" name="monto" id="monto" /><br />
Descripcion : <input type="text" name="concepto" id="concepto" /><br />
Email pagador (Opcional) : <input type="text" name="pagador" id="pagador" /><br />
<button id="btnAceptar" type="submit">Aceptar</button>