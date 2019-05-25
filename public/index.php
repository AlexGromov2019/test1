<?php
// Start a Session
if( !session_id() ) @session_start();
ob_start();

require '../vendor/autoload.php';

/*//Faker
$faker = Faker\Factory::create();
$pdo = new PDO('mysql:host=localhost;dbname=lesson01', 'root', '');
$queryFactory = new QueryFactory('mysql');
$insert = $queryFactory->newInsert();
$insert->into('posts');
for ($i=0; $i<30; $i++){
    $insert->cols([
       'title' => $faker->words(3, true),
       'preview_text' => $faker->realText(300,2),
       'full_text' => $faker->realText(2000, 2),
       'category' => 'animal',
       'images' => $faker->imageUrl(1024, 640),
       'creation_date' => $faker->date('Y-m-d', 'now'),
       'author' => $faker->lastName,
    ]);
    $insert->addRow();
}
$sth = $pdo->prepare($insert->getStatement());
$sth->execute($insert->getBindValues());*/

use Aura\SqlQuery\QueryFactory;
use DI\ContainerBuilder;
use Delight\Auth\Auth;
use League\Plates\Engine;
use Bulletproof\Image;

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    Engine::class => function(){
        return new Engine('../app/views');
    },

    PDO::class => function(){
        $cf = include '../config.php';
        $driver = $cf['driver'];
        $host = $cf['host'];
        $database_name = $cf['database_name'];
        $username = $cf['username'];
        $password = $cf['password'];
        return new PDO("$driver:host=$host;dbname=$database_name", $username, $password);
    },

    Auth::class => function($container){
        return new Auth($container->get('PDO'));
    },

    QueryFactory::class => function(){
        $driver = "mysql";
        return new QueryFactory($driver);
    },

    Image::class => function(){
        return new Image($_FILES);
    }
]);

$container = $containerBuilder->build();

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', ['App\controllers\HomeController', 'index']);
    $r->addRoute('GET', '/page/{id:\d+}', ['App\controllers\HomeController', 'singlePage']);
    $r->addRoute('GET', '/category/{namecategory}', ['App\controllers\HomeController', 'Category']);
    $r->addRoute('GET', '/error404', ['App\controllers\HomeController', 'error404']);
    //Auth
    $r->addRoute('GET', '/registration-form', ['App\controllers\AuthController', 'registrationForm']);
    $r->addRoute('POST', '/registration', ['App\controllers\AuthController', 'registration']);
    $r->addRoute('GET', '/verification', ['App\controllers\AuthController', 'emailVerification']);
    $r->addRoute('GET', '/login-form', ['App\controllers\AuthController', 'loginForm']);
    $r->addRoute('POST', '/login', ['App\controllers\AuthController', 'login']);
    $r->addRoute('GET', '/logout', ['App\controllers\AuthController', 'logout']);
    $r->addRoute('GET', '/edit-profile', ['App\controllers\AuthController', 'editAvatar']);
    $r->addRoute('POST', '/update-info-profile', ['App\controllers\AuthController', 'updateAvatar']);
    //Admin
    $r->addRoute('GET', '/admin', ['App\controllers\AdminController', 'admin']);
    $r->addRoute('GET', '/admin-add-post-form', ['App\controllers\AdminController', 'adminAddPostForm']);
    $r->addRoute('GET', '/admin-edit-post-form/{id:\d+}', ['App\controllers\AdminController', 'adminEditPostForm']);
    $r->addRoute('POST', '/update-post', ['App\controllers\AdminController', 'updatePost']);
    $r->addRoute('POST', '/add-post', ['App\controllers\AdminController', 'addPost']);
    $r->addRoute('GET', '/delete-post/{id:\d+}', ['App\controllers\AdminController', 'deletePost']);

    $r->addRoute('POST', '/addcomment', ['App\controllers\HomeController', 'addComment']);
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        header('Location: /error404');
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
    echo 'Метод не разрешен!';
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $container->call($routeInfo[1], $routeInfo[2]);
        break;
}























?>