Confirme su orden antes de proceder al pago via Flow<br /><br />
Orden N°: {{$orden['orden_compra']}}<br />
Monto: {{$orden['monto']}}<br />
Descripción: {{$orden['concepto']}}<br />
Email Pagador (Opcional): {{$orden['email_pagador']}}<br />
<form method="post" action="{{config('flow.url_pago')}}">
{{ csrf_field() }}
<input type="hidden" name="parameters" value="{{$orden['flow_pack'] }}" />
<button type="submit">Pagar en Flow</button>
</form>
