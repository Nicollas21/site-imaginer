<script type="text/javascript">
	function ajaxPOSTRequest(params) {
		params.type = "POST";
		return ajaxRequest(params);
	}

	function ajaxRequest(params) {
	    $.ajax({
	        type: params.type,
	        url: params.url,
	        data: params.data
	    }).done(function(retorno) {
	    	console.log(retorno);
	        if (typeof retorno == 'undefined' || retorno == null) {
	            params.error('Ocorreu um erro inesperado. Se o erro persistir, entre em contato conosco pelo e-mail de suporte: studioimaginer@gmail.com 1');
	        } else {
	            var objRetorno = null;
	            try {
	                objRetorno = JSON.parse(retorno);
	            } catch (exc) {
	                objRetorno = null;
	            }
	            if (objRetorno == null || typeof objRetorno.error == 'undefined') {
	                params.error('Ocorreu um erro inesperado. Se o erro persistir, entre em contato conosco pelo e-mail de suporte: studioimaginer@gmail.com 2');
	            } else if (objRetorno.error == true) {
	                if (objRetorno.message) {
	                    params.error(objRetorno.message);
	                } else {
	                    params.error('Ocorreu um erro inesperado. Se o erro persistir, entre em contato conosco pelo e-mail de suporte: studioimaginer@gmail.com 3');
	                }
	            } else {
	                params.success(objRetorno);
	            }
	        }
	    }).error(function (jqXHR, exception) {
	        console.log(jqXHR);
	        if (exception === 'timeout') {
	            params.error('O servidor demorou muito para responder, por favor tente novamente');
	        } else if (jqXHR.status == 404) {
	            params.error('A página não foi encontrada. Se o erro persistir, entre em contato conosco pelo e-mail de suporte: studioimaginer@gmail.com');
	            console.log('404');
	        } else if (jqXHR.status == 500) {
	            params.error('Ocorreu um erro no servidor. Por favor, entre em contato conosco pelo e-mail de suporte: studioimaginer@gmail.com');
	            console.log('500');
	        } else if (exception === 'parsererror') {
	            params.error('Ocorreu um erro inesperado. Se o erro persistir, entre em contato conosco pelo e-mail de suporte: studioimaginer@gmail.com');
	        } else if (exception === 'abort') {
	            params.error('A conexão foi interrompida');
	        } else if (jqXHR.status === 0) {
	            params.error('Ocorreu um erro de conexão. Por favor, verifique a sua conexão com a internet.');
	        } else {
	            params.error('Ocorreu um erro inesperado. Se o erro persistir, entre em contato conosco pelo e-mail de suporte: studioimaginer@gmail.com');
	        }
	    });
	}

</script>