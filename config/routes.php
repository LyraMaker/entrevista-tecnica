<?php
use LyraMaker\Entrevista\Misc\Upload;
use LyraMaker\Entrevista\Misc\View;
use LyraMaker\Entrevista\Model\User;
use LyraMaker\Entrevista\Repository\UserRepository;
use LyraMaker\Entrevista\Router\Request;
use LyraMaker\Entrevista\Router\Response;
use LyraMaker\Entrevista\Router\Router;

$request = new Request();
$route = new Router();

$route->get('/', function () {
    $allUsers = (new UserRepository())->listAll();
    echo View::render('header');
    View::addData('allUsers', $allUsers);
    echo View::render('home') . View::render('footer');
});

$route->get('/create', function () {
    echo View::render('header-nonav');
    View::addData('operation', 'insert');
    echo View::render('form') . View::render('footer');
});

$route->post('/create', function (Request $request) {
    $user = new User(...$request->getParams());

    $upload = new Upload();
    $user->setProfile_photo($upload->getName());
    $upload->realocate();

    (new UserRepository())->create($user);

    header("Location:/");
});

$route->get('/update/{id}', function ($id) {
    $user = (new UserRepository())->findById($id);

    echo View::render('header-nonav');
    View::addData('operation', 'update');
    View::addData('user', $user);
    echo View::render('form') . View::render('footer');
});

$route->post('/update', function (Request $request) {
    $user = new User(...$request->getParams());

    $upload = new Upload();
    $user->setProfile_photo($upload->getName());
    $upload->realocate();

    (new UserRepository())->update($request->getParams('user_code'), $user);

    header("Location:/");
});

$route->get('/delete/{id}', function ($id) {
    (new UserRepository())->delete($id);
    header("Location:/");
});

$route->post('/api/create', function (Request $request, Response $response) {
    $user = new User(...$request->getParams());
    (new UserRepository())->create($user);
    $response->json(['message' => 'Usuário criado com sucesso.']);
});

$route->post('/api/update/{id}', function (Request $request, Response $response, $id) {
    $user = new User(...$request->getParams());
    (new UserRepository())->update($id, $user);
    $response->json(['message' => 'Usuário atualizado.']);
});

$route->get('/api/list/{id}', function ($id) {
    $response = new Response();
    $user = (new UserRepository())->findById($id);

    $data = [
        'user_code'     => $user->getUser_code(),
        'profile_photo' => $user->getProfile_photo(),
        'first_name'    => $user->getFirst_name(),
        'second_name'   => $user->getSecond_name(),
        'date_birth'    => $user->getDate_birth(),
        'street'        => $user->getStreet(),
        'neighborhood'  => html_entity_decode($user->getNeighborhood()),
        'city'          => html_entity_decode($user->getCity()),
        'state'         => $user->getState(),
        'description'   => $user->getDescription(),
    ];

    $response->json($data);
});

$route->get('/api/listAll', function () {
    $response = new Response();
    $users = (new UserRepository())->listAll();

    $data = array_map(function ($user) {
        return [
            'user_code'     => $user->getUser_code(),
            'profile_photo' => $user->getProfile_photo(),
            'first_name'    => $user->getFirst_name(),
            'second_name'   => $user->getSecond_name(),
            'date_birth'    => $user->getDate_birth(),
            'street'        => $user->getStreet(),
            'neighborhood'  => html_entity_decode($user->getNeighborhood()),
            'city'          => html_entity_decode($user->getCity()),
            'state'         => $user->getState(),
            'description'   => $user->getDescription(),
        ];
    }, $users);

    $response->json($data);
});

$route->get('/api/remove/{id}', function ($id) {
    $response = new Response();
    (new UserRepository())->delete($id);
    $response->json(['message' => 'Usuário removido com sucesso.']);
});


$route->dispatch($request->getMethod(), $_SERVER['REQUEST_URI']);
