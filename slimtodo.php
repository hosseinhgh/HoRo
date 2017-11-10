<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

session_start();

require_once 'vendor/autoload.php';

DB::$dbName = 'slimtodo';
DB::$user = 'slimtodo';
DB::$encoding = 'utf8';
DB::$password = 'a0PQUlWwD30PRKsX';

DB::$error_handler = 'sql_error_handler';
DB::$nonsql_error_handler = 'nonsql_error_handler';

function sql_error_handler($params) {
    global $app, $log;
    $log->err("SQL Error: " . $params['error']);
    $log->err(" in query: " . $params['query']);
    http_response_code(500);
    $app->render('error_internal.html.twig');
    die;
}

function nonsql_error_handler($params) {
    global $app, $log;
    $log->err("SQL Error: " . $params['error']);
    http_response_code(500);
    $app->render('error_internal.html.twig');
    die;
}

// Slim creation and setup
$app = new \Slim\Slim(array(
    'view' => new \Slim\Views\Twig()
        ));

$view = $app->view();
$view->parserOptions = array(
    'debug' => true,
    'cache' => dirname(__FILE__) . '/cache'
);
$view->setTemplatesDirectory(dirname(__FILE__) . '/templates');

// create a log channel
$log = new Logger('main');
$log->pushHandler(new StreamHandler('logs/everything.log', Logger::DEBUG));
$log->pushHandler(new StreamHandler('logs/errors.log', Logger::ERROR));


if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = array();
}

$twig = $app->view()->getEnvironment();
$twig->addGlobal('userSession', $_SESSION['user']);

$app->get('/', function() use ($app) {
    $todoList = array();
    if ($_SESSION['user']) {
        $todoList = DB::query('SELECT * FROM todos WHERE ownerId=%i', $_SESSION['user']['id']);
    }
    $app->render('index.html.twig', array('todoList' => $todoList));
});

$app->get('/logout', function() use ($app) {
    $_SESSION['user'] = array();
    $app->render('logout.html.twig', array('userSession' => $_SESSION['user']));
});

$app->get('/login', function() use ($app) {
    $app->render('login.html.twig');
});

$app->post('/login', function() use ($app) {
    $email = $app->request()->post('email');
    $pass = $app->request()->post('pass');
    $row = DB::queryFirstRow("SELECT * FROM users WHERE email=%s", $email);
    $error = false;
    if (!$row) {
        $error = true; // user not found
    } else {
        if (password_verify($pass, $row['password']) == FALSE) {
            $error = true; // password invalid
        }
    }
    if ($error) {
        $app->render('login.html.twig', array('error' => true));
    } else {
        unset($row['password']);
        $_SESSION['user'] = $row;
        $app->render('login_success.html.twig', array('userSession' => $_SESSION['user']));
    }
});

$app->get('/isemailregistered/:email', function($email) use ($app) {
    $row = DB::queryFirstRow("SELECT * FROM users WHERE email=%s", $email);
    echo!$row ? "" : '<span style="background-color: red; font-weight: bold;">Email already taken</span>';
});

$app->get('/register', function() use ($app) {
    $app->render('register.html.twig');
});

$app->post('/register', function() use ($app) {
    $name = $app->request()->post('name');
    $email = $app->request()->post('email');
    $pass1 = $app->request()->post('pass1');
    $pass2 = $app->request()->post('pass2');
    //
    $values = array('name' => $name, 'email' => $email);
    $errorList = array();
    //
    if (strlen($name) < 2 || strlen($name) > 50) {
        $values['name'] = '';
        array_push($errorList, "Name must be between 2 and 50 characters long");
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
        $values['email'] = '';
        array_push($errorList, "Email must look like a valid email");
    } else {
        $row = DB::queryFirstRow("SELECT * FROM users WHERE email=%s", $email);
        if ($row) {
            $values['email'] = '';
            array_push($errorList, "Email already in use");
        }
    }
    if ($pass1 != $pass2) {
        array_push($errorList, "Passwords don't match");
    } else { // TODO: do a better check for password quality (lower/upper/numbers/special)
        if (strlen($pass1) < 2 || strlen($pass1) > 50) {
            array_push($errorList, "Password must be between 2 and 50 characters long");
        }
    }
    //
    if ($errorList) { // 3. failed submission
        $app->render('register.html.twig', array(
            'errorList' => $errorList,
            'v' => $values));
    } else { // 2. successful submission
        $passEnc = password_hash($pass1, PASSWORD_BCRYPT);
        DB::insert('users', array('name' => $name, 'email' => $email, 'password' => $passEnc));
        $app->render('register_success.html.twig');
    }
});

$app->get('/add', function() use ($app) {
    if (!$_SESSION['user']) {
        $app->render('access_denied.html.twig');
        return;
    }
    $app->render('todo_addedit.html.twig');
});

$app->post('/add', function() use ($app) {
    if (!$_SESSION['user']) {
        $app->render('access_denied.html.twig');
        return;
    }
    $task = $app->request()->post('task');
    $dueDate = $app->request()->post('dueDate');
    $isDone = $app->request()->post('isDone');
    $isDone = empty($isDone) ? "pending" : "done";
    //
    $values = array('task' => $task, 'dueDate' => $dueDate, 'isDone' => $isDone);

    $errorList = array();
    //
    if (strlen($task) < 2 || strlen($task) > 50) {
        $values['task'] = '';
        array_push($errorList, "Task must be between 2 and 50 characters long");
    }
    if (date_parse($dueDate) == FALSE) {
        $values['dueDate'] = '';
        array_push($errorList, "Date seems invalid");
    }
    //
    if ($errorList) { // 3. failed submission
        $app->render('todo_addedit.html.twig', array(
            'errorList' => $errorList,
            'v' => $values));
    } else { // 2. successful submission
        $values['ownerId'] = $_SESSION['user']['id'];
        DB::insert('todos', $values);
        $app->render('todo_addedit_success.html.twig');
    }
});


$app->get('/delete/:id', function($id) use ($app) {
    if (!$_SESSION['user']) {
        $app->render('access_denied.html.twig');
        return;
    }
    $todo = DB::queryFirstRow("SELECT * FROM todos WHERE id=%i AND ownerId=%i", $id, $_SESSION['user']['id']);
    if (!$todo) {
        echo "Item not found"; // FIXME: 404, not found page
        return;
    }
    $app->render('todo_delete.html.twig', array('todo' => $todo));
});

$app->post('/delete/:id', function($id) use ($app) {
    if (!$_SESSION['user']) {
        $app->render('access_denied.html.twig');
        return;
    }
    $confirmed = $app->request()->post('confirmed');
    if ($confirmed != 'true') {
        echo 'error: confirmation missing'; // TODO: use template
        return;
    }
    DB::delete('todos', "id=%i AND ownerId=%i", $id, $_SESSION['user']['id']);
    if (DB::affectedRows() == 0) {
        echo 'error: record not found'; // TODO: use template
    } else {
        $app->render('todo_delete_success.html.twig');
    }
});

$app->run();
