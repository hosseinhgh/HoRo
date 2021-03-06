
<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

session_start();

require_once 'vendor/autoload.php';

//DB::$dbName = 'horo';
//DB::$user = 'horo';
//DB::$encoding = 'utf8';
//DB::$password = 'BlmyWSR011BJTUne';


DB::$dbName = 'cp4809_horoExamOnline';
DB::$user = 'cp4809_horoExamO';
DB::$encoding = 'utf8';
DB::$password = 'horoExamOnline';
DB::$host = 'ipd10.com';

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

$app->get('/students(/:page)', function($page = 1) use ($app) {
    $perPage = 4;
    $totalCount = DB::queryFirstField ("SELECT COUNT(*) AS count FROM students");
    $maxPages = ($totalCount + $perPage - 1) / $perPage;
    if ($page > $maxPages) {
        http_response_code(404);
        $app->render('not_found.html.twig');
        return;
    }
    $skip = ($page - 1) * $perPage;
    $studentList = DB::query("SELECT * FROM users ORDER BY id LIMIT %d,%d", $skip, $perPage);
    $app->render('students.html.twig', array(
        "studentList" => $studentList,
        "maxPages" => $maxPages
        ));
});

$app->get('/', function() use ($app) {
    $studentList = array();
    if ($_SESSION['user']) {
        $studentList = DB::query('SELECT * FROM students WHERE teacherId=%i', $_SESSION['user']['id']);
    }
    $app->render('studentsList.html.twig', array('studentsList' => $studentList));
});

$app->get('/student/list', function() use ($app) {
    $studentList = array();
    if ($_SESSION['user']) {
        $studentList = DB::query('SELECT * FROM students WHERE teacherId=%i', $_SESSION['user']['id']);
    }
    $app->render('studentsList.html.twig', array('studentsList' => $studentList));
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
    $row = DB::queryFirstRow("SELECT * FROM teachers WHERE email=%s", $email);
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
    $row = DB::queryFirstRow("SELECT * FROM teachers WHERE email=%s", $email);
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
        $row = DB::queryFirstRow("SELECT * FROM teachers WHERE email=%s", $email);
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
        DB::insert('teachers', array('name' => $name, 'email' => $email, 'password' => $passEnc));
        $app->render('register_success.html.twig');
    }
});



function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$app->map('/passreset/request', function() use ($app, $log) {
    if ($app->request()->isGet()) {
        // State 1: first show
        $app->render('passreset_request.html.twig');
        return;
    }
    // in Post - receiving submission
    $email = $app->request()->post('email');
    $user = DB::queryFirstRow("SELECT * FROM teachers WHERE email=%s", $email);
    if ($user) {
        $secretToken = generateRandomString(50);
        
        DB::insertUpdate('passresets', array(
            'userId' => $user['id'],
            'secretToken' => $secretToken,
            'expiryDateTime' => date("Y-m-d H:i:s", strtotime("+5 minutes"))
        ));
        $url = 'http://' . $_SERVER['SERVER_NAME'] . '/passreset/token/' . $secretToken;
        $emailBody = $app->view()->render('passreset_email.html.twig', array(
            'name' => $user['name'], // or 'username' or 'firstName'
            // 'name' => 'User', if you don't have user's name in your database
            'url' => $url
        ));
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html\r\n";
        $headers .= "From: Noreply <noreply@ipd10.com>\r\n";
        $headers .= "Date: " . date("Y-m-d H:i:s");
        $toEmail = sprintf("%s <%s>", htmlentities($user['name']), $user['email']);
        // $headers.= sprintf("To: %s\r\n", $user['email']);

        mail($toEmail, "Your password reset for " . $_SERVER['SERVER_NAME'], $emailBody, $headers);
        $log->info('Email sent for password reset for user id=' . $user['id']);
        $app->render('passreset_request_success.html.twig');
    } else { // State 3: failed request, email not registered
        $app->render('passreset_request.html.twig', array('error' => true));
    }
})->via('GET', 'POST');

$app->map('/passreset/token/:secretToken', function($secretToken) use ($app, $log) {
    $row = DB::queryFirstRow("SELECT * FROM passresets WHERE secretToken=%s", $secretToken);//passreset table in database
    if (!$row) { // row not found
        $app->render('passreset_notfound_expired.html.twig');
        return;
    }
    if (strtotime($row['expiryDateTime']) < time()) {
        // row found but token expired
        $app->render('passreset_notfound_expired.html.twig');
        return;
    }
    //
    $user = DB::queryFirstRow("SELECT * FROM teachers WHERE id=%d", $row['userId']);
    if (!$user) {
        $log->err(sprintf("Passreset for token %s user id=%d not found", $row['secretToken'], $row['userId']));
        $app->render('error_internal.html.twig');
        return;
    }
    if ($app->request()->isGet()) { // State 1: first show
        $app->render('passreset_form.html.twig', array(
            'name' => $user['name'], 'email' => $user['email']
        ));
    } else { // receiving POST with new password
        $pass1 = $app->request()->post('pass1');
        $pass2 = $app->request()->post('pass2');
        // FIXME: verify quality of the new password using a function
        $errorList = array();
        if ($pass1 != $pass2) {
            array_push($errorList, "Passwords don't match");
        } else { // TODO: do a better check for password quality (lower/upper/numbers/special)
            if (strlen($pass1) < 2 || strlen($pass1) > 50) {
                array_push($errorList, "Password must be between 2 and 50 characters long");
            }
        }
        if ($errorList) { // 3. failed submission
            $app->render('passreset_form.html.twig', array(
                'errorList' => $errorList,
                'name' => $user['name'],
                'email' => $user['email']
            ));
        } else { // 2. successful submission
            DB::update('users', array('password' => $pass1), 'id=%d', $user['id']);
            $app->render('passreset_form_success.html.twig');
        }
    }
})->via('GET', 'POST');






$app->get('/student/add', function() use ($app) {
    if (!$_SESSION['user']) {
        $app->render('access_denied.html.twig');
        return;
    }
    $app->render('student_addedit.html.twig');
});

$app->post('/student/add', function() use ($app) {
    if (!$_SESSION['user']) {
        $app->render('access_denied.html.twig');
        return;
    }
    
    $id = -1; // FIXME
    
    $firstName = $app->request()->post('firstName');
    $lastName = $app->request()->post('lastName');
    $email = $app->request()->post('email');
    
    
    //
    $values = array(
        'teacherId' => $_SESSION['user']['id'],
        'firstName' => $firstName,
        'lastName' => $lastName,
        'email' => $email);

    $errorList = array();
    //
    if (strlen($firstName) < 2 || strlen($firstName) > 50) {
        $values['firstName'] = '';
        array_push($errorList, "name must be between 2 and 50 characters long");
    }
    if (strlen($lastName) < 2 || strlen($lastName) > 50) {
        $values['firstName'] = '';
        array_push($errorList, "name must be between 2 and 50 characters long");
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
        $values['email'] = '';
        array_push($errorList, "Email must look like a valid email");
    } else {
        $row = DB::queryFirstRow("SELECT * FROM students WHERE email=%s", $email);
        if ($row) {
            $values['email'] = '';
            array_push($errorList, "Email already in use");
        }
    }
    //
    
    $studentImage = array();
    // is file being uploaded
    if ($_FILES['image']['error'] != UPLOAD_ERR_NO_FILE) {
        $studentImage = $_FILES['image'];
        if ($studentImage['error'] != 0) {
            array_push($errorList, "Error uploading file");
            $log->err("Error uploading file: " . print_r($studentImage, true));
        } else {
            if (strstr($studentImage['name'], '..')) {
                array_push($errorList, "Invalid file name");
                $log->warn("Uploaded file name with .. in it (possible attack): " . print_r($studentImage, true));
            }
            // TODO: check if file already exists, check maximum size of the file, dimensions of the image etc.
            $info = getimagesize($studentImage["tmp_name"]);
            if ($info == FALSE) {
                array_push($errorList, "File doesn't look like a valid image");
            } else {
                if ($info['mime'] == 'image/jpeg' || $info['mime'] == 'image/gif' || $info['mime'] == 'image/png') {
                    // image type is valid - all good
                } else {
                    array_push($errorList, "Image must be a JPG, GIF, or PNG only.");
                }
            }
        }
    } else { // no file uploaded
        if ($op == 'add') {
            array_push($errorList, "Image is required when registering new student");
        }
    }

    //
    if ($errorList) { // 3. failed submission
        $app->render('student_addedit.html.twig', array(
            'errorList' => $errorList,
            'isEditing' => ($id != -1),
            'v' => $values));
    } else { // 2. successful submission
        if ($studentImage) {
            $sanitizedFileName = preg_replace('[^a-zA-Z0-9_\.-]', '_', $studentImage['name']);
            $imagePath = 'uploads/' . $sanitizedFileName;
            if (!move_uploaded_file($studentImage['tmp_name'], $imagePath)) {
                $log->err("Error moving uploaded file: " . print_r($studentImage, true));
                $app->render('error_internal.html.twig');
                return;
            }
            // TODO: if EDITING and new file is uploaded we should delete the old one in uploads
            $values['imagePath'] = "/" . $imagePath;
        }
        if ($id != -1) {
            DB::update('students', $values, "id=%i", $id);
        } else {
            DB::insert('students', $values);
        }
        $app->render('student_addedit_success.html.twig', array('isEditing' => ($id != -1)));
    }
})->conditions(array(
    'op' => '(edit|add)',
    'id' => '\d+'
));

$app->get('/delete/:id', function($id) use ($app) {
    if (!$_SESSION['user']) {
        $app->render('access_denied.html.twig');
        return;
    }
    $student = DB::queryFirstRow("SELECT * FROM students WHERE id=%i AND teacherId=%i", $id, $_SESSION['user']['id']);
    if (!$student) {
        echo "Item not found"; // FIXME: 404, not found page
        return;
    }
    $app->render('student_delete.html.twig', array('student' => $student));
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
    DB::delete('students', "id=%i AND adminId=%i", $id, $_SESSION['user']['id']);
    if (DB::affectedRows() == 0) {
        echo 'error: record not found'; // TODO: use template
    } else {
        $app->render('student_delete_success.html.twig');
    }
});



$app->get('/subject/add', function() use ($app) {
    if (!$_SESSION['user']) {
        $app->render('access_denied.html.twig');
        return;
    }
    $app->render('subject_addedit.html.twig');
});

$app->post('/subject/add', function() use ($app) {
    if (!$_SESSION['user']) {
        $app->render('access_denied.html.twig');
        return;
    }
    $name = $app->request()->post('name');
    $description = $app->request()->post('description');
    
    //
    $values = array('name' => $name, 'description' => $description);

    $errorList = array();
    //
    if (strlen($name) < 2 || strlen($name) > 50) {
        $values['name'] = '';
        array_push($errorList, "name must be between 2 and 50 characters long");
    }
    if (strlen($description) < 2 || strlen($description) > 250) {
        $values['description'] = '';
        array_push($errorList, "description must be between 2 and 250 characters long");
    }
    //
    if ($errorList) { // 3. failed submission
        $app->render('subject_addedit.html.twig', array(
            'errorList' => $errorList,
            'v' => $values));
    } else { // 2. successful submission
        
        DB::insert('subjects', $values);
        $app->render('subject_addedit_success.html.twig');
    }
});


$app->get('/deleteSubject/:id', function($id) use ($app) {
    if (!$_SESSION['user']) {
        $app->render('access_denied.html.twig');
        return;
    }
    $subject = DB::queryFirstRow("SELECT * FROM subjects WHERE id=%i", $id);
    if (!$subject) {
        echo "Item not found"; // FIXME: 404, not found page
        return;
    }
    $app->render('subject_delete.html.twig', array('subject' => $subject));
});

$app->post('/deleteSubject/:id', function($id) use ($app) {
    if (!$_SESSION['user']) {
        $app->render('access_denied.html.twig');
        return;
    }
    $confirmed = $app->request()->post('confirmed');
    if ($confirmed != 'true') {
        echo 'error: confirmation missing'; // TODO: use template
        return;
    }
    DB::delete('subjects', "id=%i", $id);
    if (DB::affectedRows() == 0) {
        echo 'error: record not found'; // TODO: use template
    } else {
        $app->render('subject_delete_success.html.twig');
    }
});

$app->get('/subject/list', function() use ($app) {
    $subjectList = array();
    if ($_SESSION['user']) {
        $subjectList = DB::query('SELECT * FROM subjects ORDER BY ID');
    }
    $app->render('subjectList.html.twig', array('subjectsList' => $subjectList));
});


$app->get('/question/add', function() use ($app) {
    if (!$_SESSION['user']) {
        $app->render('access_denied.html.twig');
        return;
    }
    $app->render('question_addedit.html.twig');
});

$app->post('/question/add', function() use ($app) {
    if (!$_SESSION['user']) {
        $app->render('access_denied.html.twig');
        return;
    }
    $question = $app->request()->post('question1');
    $answer1 = $app->request()->post('answer1');
    $answer2 = $app->request()->post('answer2');
    $answer3 = $app->request()->post('answer3');
    
    
    $iscorrect = $app->request()->post('iscorrect');
    
    //
    $values = array('question' => $question, 'answer1' => $answer1, 'answer2' => $answer2, 'answer3' => $answer3, 'iscorrect' => $iscorrect);

    $errorList = array();
    //
    if (strlen($question) < 2 || strlen($question) > 50) {
        $values['name'] = '';
        array_push($errorList, "question must not be empty");
    }
    
    //
    if ($errorList) { // 3. failed submission
        $app->render('question_addedit.html.twig', array(
            'errorList' => $errorList,
            'v' => $values));
    } else { // 2. successful submission
        
        DB::insert('questions', $values);
        $app->render('questions_addedit_success.html.twig');
    }
});


$app->get('/deleteQuestion/:id', function($id) use ($app) {
    if (!$_SESSION['user']) {
        $app->render('access_denied.html.twig');
        return;
    }
    $subject = DB::queryFirstRow("SELECT * FROM questions WHERE id=%i", $id);
    if (!$question) {
        echo "Item not found"; // FIXME: 404, not found page
        return;
    }
    $app->render('questions_delete.html.twig', array('question' => $question));
});

$app->post('/deleteQuestions/:id', function($id) use ($app) {
    if (!$_SESSION['user']) {
        $app->render('access_denied.html.twig');
        return;
    }
    $confirmed = $app->request()->post('confirmed');
    if ($confirmed != 'true') {
        echo 'error: confirmation missing'; // TODO: use template
        return;
    }
    DB::delete('questions', "id=%i", $id);
    if (DB::affectedRows() == 0) {
        echo 'error: record not found'; // TODO: use template
    } else {
        $app->render('questions_delete_success.html.twig');
    }
});

$app->get('/questions/list', function() use ($app) {
    $subjectList = array();
    if ($_SESSION['user']) {
        $subjectList = DB::query('SELECT * FROM questions ORDER BY id');
    }
    $app->render('questionsList.html.twig', array('questionsList' => $questionsList));
});


$app->run();
