<?php 
class usersController extends Controller
{

protected $controller = 'Users';

		
function __construct() 
	{     
	require_once(ROOT . 'Models/User.php');	

	$this->Controller = new Controller;
	}

function index()
    {
	if($this->isauthenticated($this->Controller->request->action)) {	
	if($this->isauthorized($this->Controller->request->action)) {
        	$users = new User();
        	$d['users'] = $users->showAll();
		$this->set($d);
        	$this->render("index");
	} else {
		header("Location: " . WEBROOT . "schuelers/index");
	}
	
	} else {
		header("Location: " . WEBROOT . "users/login");
	}
	
    }
    function create()
    {
	if($this->isauthenticated($this->Controller->request->action) && $this->isauthorized($this->Controller->request->action)) {	
	     
	if (!empty($_POST))
        {
            $secured_params = $this->secure_form($_POST);
		$user= new User();
        	$user = $user->findUser($secured_params["name"]);
		if ($secured_params['password']===$secured_params['password2'] && empty($user)) 
		{
            		$user= new User();
            		if ($user->create(array($secured_params['name'], password_hash($secured_params['password'], PASSWORD_DEFAULT),$secured_params['role'])))	
            		{
                		header("Location: " . WEBROOT . "users/index");
            		}
		}
        }
        $this->render("create");
	} else {
		header("Location: " . WEBROOT . "users/login");
	}
    }
    function edit($id)
    {
        if($this->isauthenticated($this->Controller->request->action) && $this->isauthorized($this->Controller->request->action)) {
        $user= new User();
        $d["user"] = $user->show($id);
        if (isset($_POST["vorname"]))
        {
		$secured_params = $this->secure_form($_POST); 
		print_r($secured_params); echo('hallo');          
		if ($user->edit($id, $secured_params))
            {
                header("Location: " . WEBROOT . "users/index");
            }
        }
        $this->set($d);
        $this->render("edit");
	} else {
		header("Location: " . WEBROOT . "users/login");
	}
    }
	function login() 
	{
		if (isset($_POST["name"]) && isset($_POST['password'])) {		
			$user= new User();
        		$user = $user->findUser($_POST["name"]);
			$password = $_POST['password'];
			if ($password == password_verify($password, $user['password'])) {  
				$_SESSION['user'] = $user['name'];
				$_SESSION['role'] = $user['role'];
				$_SESSION['id'] = $user['id'];
				header("Location: " . WEBROOT . "users/index");	
			}
			echo("<button class='btn btn-danger btn-xs'>Anmeldung fehlgeschlagen</button>");
		}
		$this->render("login");
	}
    function delete($id)
    {
	if($this->isauthenticated($this->Controller->request->action) && $this->isauthorized($this->Controller->request->action)) {         
	$user = new User();
        if ($user->delete($id))
        {
            header("Location: " . WEBROOT . "users/index");
        }
	} else {
		header("Location: " . WEBROOT . "users/login");
	}
	
    }
	function isauthorized($action){
		if($_SESSION['role']==='admin' || $_SESSION['role']==='schulleiter') {return true;}
		if(in_array($action, ['delete','edit','create']) === true) {
		return false; }
	}
	function logout()
	{
		
		if(Database::closeBdd()) { 		
		session_destroy();
		echo("Sie wurden erfolgreich abgemeldet");}
		die;
		
	}
}
?>
