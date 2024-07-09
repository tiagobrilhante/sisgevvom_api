<?php

/** @var Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/** @var Router $router */

use Laravel\Lumen\Routing\Router;

$router->get('/', function () use ($router) {
    return '<h1>API SisGeVVOm</h1> <b>Framework da Api:</b> ' . $router->app->version() . '<br> <b>Versão da api:</b> 1.5<br><b>Desenvolvedor: </b> TC Brilhante <br>Todos os Direitos dessa API pertencem ao Exército Brasileiro. <br> Todo o poder emana do código.';
});

$router->post('/api/login', 'TokenController@gerarToken');
$router->get('/api/painelvc', 'VideoConferenciaController@mostraPainel');
$router->get('/api/postograd', 'PostoGradController@index');
$router->get('/api/oms', 'OmController@index');
$router->get('/api/secoes/porom/{id}', 'SecaoController@porOm');
$router->post('/api/users/autocadastro', 'UserController@autocadastro');
$router->post('/api/users/cpfnovo/', 'UserController@cpfExistNovo');

// autenticado ...
$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {

    // USUARIOS
    $router->group(['prefix' => 'users'], function () use ($router) {

        $router->get('/problemas', 'UserController@verificaProblemas');
        $router->get('/naohomologado', 'UserController@solucionaNaoHomologado');
        $router->get('', 'UserController@index');
        $router->get('/porom/{id}', 'UserController@porOm');
        $router->post('', 'UserController@createUser');
        $router->post('/password/reset', 'UserController@alteraSenhaResetada');
        $router->post('/password/change', 'UserController@alteraSenhaNormal');
        $router->post('/reset/password', 'UserController@resetaSenha');
        $router->post('email/', 'UserController@emailExist');
        $router->post('cpf/', 'UserController@cpfExist');
        $router->put('{id}', 'UserController@update');
        $router->delete('{id}', 'UserController@destroy');

    });


    // Secoes
    $router->group(['prefix' => 'secoes'], function () use ($router) {
        $router->get('', 'SecaoController@index');
        $router->get('/funcoes', 'SecaoController@secoesFuncoes');
        $router->get('/funcoesom/{id}', 'SecaoController@secoesFuncoesOm');
        $router->post('', 'SecaoController@store');
        $router->put('{id}', 'SecaoController@update');
        $router->delete('{id}', 'SecaoController@destroy');
    });

    // Funções
    $router->group(['prefix' => 'funcoes'], function () use ($router) {
        $router->get('', 'FuncaoController@index');
        $router->get('/porom/{id}', 'FuncaoController@porOm');
        $router->post('', 'FuncaoController@store');
        $router->put('{id}', 'FuncaoController@update');
        $router->delete('{id}', 'FuncaoController@destroy');
    });

    // OMs
    $router->group(['prefix' => 'oms'], function () use ($router) {
        $router->post('', 'OmController@store');
        $router->put('{id}', 'OmController@update');
        $router->delete('{id}', 'OmController@destroy');
        $router->get('/lepais', 'OmController@getPais');
        $router->get('/chart/{id}', 'OmController@getChart');
    });

    // PostoGrad
    $router->group(['prefix' => 'postograd'], function () use ($router) {
        $router->post('', 'PostoGradController@store');
        $router->put('{id}', 'PostoGradController@update');
        $router->delete('{id}', 'PostoGradController@destroy');
    });


    // home
    $router->group(['prefix' => 'home'], function () use ($router) {
        $router->get('', 'HomeController@getInitialStatistics');
    });

    // videoconferências
    $router->group(['prefix' => 'vcs'], function () use ($router) {
        $router->get('', 'VideoConferenciaController@index');
        $router->get('/portipo/{tipo}', 'VideoConferenciaController@porTipo');
        $router->post('', 'VideoConferenciaController@store');
        $router->post('/pesquisatipo', 'VideoConferenciaController@pesquisaTipo');
        $router->put('{id}', 'VideoConferenciaController@update');
        $router->delete('{id}', 'VideoConferenciaController@destroy');
    });

});
