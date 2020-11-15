<?php

/* Configurando a Sessao:
* 1° Parametros: INTERIO -> tempo de vida da sessão em segundos, 0 (só apaga quando fecha o navegador)
* 2° Parametros: PATH -> indica caminho de algo,
* 3° Parametros: Dominio -> indica qual dominio pode acesso os dados da Sessao
* 4° Parametros: SSL(https) -> Indica se o site é seguro
* 5° Parametros: Tipo PROTOCOLO -> Pemite o acesso somento a um HTTP ou OUTROS (Boleano)
*/

session_set_cookie_params(0, 'localhost/infinity_free_v1/', null, false, true);

session_start();