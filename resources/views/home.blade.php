@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    
                   <form action="/pagos" method="POST" id="customer-form">
                        {!! csrf_field() !!}
                        <!-- div donde se imprimiran los errores (opcional) -->
                        <div class="card-errors"></div>
                        <!-- datos necesarios para tokenizar -->
                        <div class="form-group">
                            <label>Nombre del usuario de tarjeta</label>
                            <input type="text" class="form-control" data-epayco="card[name]" value="user" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" data-epayco="card[email]" value="user@mail.com" />
                        </div>
                        <div class="form-group">
                            <label>Número de tarjeta de crédito</label>
                            <input type="text" class="form-control" data-epayco="card[number]" value="4575623182290326" />
                        </div>
                        <div class="form-group">
                            <label>CVC</label>
                            <input type="text" class="form-control" size="4" data-epayco="card[cvc]" value="123" />
                        </div>
                        <div class="form-group">
                            <label>Mes de expiración(MM)</label>
                            <input type="text" class="form-control" data-epayco="card[exp_month]" value="06" />
                            <span>Año de expiración(AAAA)</span>
                            <input type="text" class="form-control" data-epayco="card[exp_year]" value="2018" />
                        </div>
                        <!-- botón con la acción para enviar el formulario -->
                        <button type="submit" class="btn btn-success">¡Pagar ahora!</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>    
    // Autenticación con tu public_key (Requerido)
    ePayco.setPublicKey('');
    
    $('#customer-form').submit(function(event) {
        //detiene el evento automático del formulario
        event.preventDefault();
        //captura el contenido del formulario
        var $form = $(this);
        //deshabilita el botón para no acumular peticiones
        $form.find("button").prop("disabled", true);
        //hace el llamado al servicio de tokenización
        ePayco.token.create($form, function(error, token) {
            //habilita el botón al obtener una respuesta
            $form.find("button").prop("disabled", false);
            if(!error) {
                let $inp = $('<input>')
                $inp.attr({
                    'type': 'hidden',
                    'name': 'epaycoToken'
                }).val(token);//$("<input type="hidden" name="epaycoToken">").val(token)
                //si la petición es correcta agrega un input "hidden" con el token como valor
                $form.append($inp);
                //envia el formulario para que sea procesado
                $form.get(0).submit();
            } else {
                //muestra errores que hayan sucedido en la transacción
                $('.customer-errors').text(error.data.description);
            }
        });
    });
</script>

@endsection
