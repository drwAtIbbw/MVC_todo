<?php 
class schuelersController extends Controller
{

protected $controller = 'Schuelers';

		
function __construct() 
	{     
	require_once(ROOT . 'Models/Schueler.php');	

	$this->Controller = new Controller;
	}

function index()
    {
	if($this->isauthenticated($this->Controller->request->action)) {	
	if($this->isauthorized($this->Controller->request->action)) {
        	$schuelers = new Schueler();
        	$d['schuelers'] = $schuelers->showAll();
	} else {
		 $schuelers = new Schueler();
        	$d['schuelers'] = $schuelers->findAllSchuelersByClass($_SESSION['id']);
	}
	$this->set($d);
        $this->render("index");
	} else {
		header("Location: " . WEBROOT . "users/login");
	}
	
    }
    function create()
    {
	if($this->isauthenticated($this->Controller->request->action) && $this->isauthorized($this->Controller->request->action)) {	
	if (!empty($_POST))
        {
            
            $schueler= new Schueler();
            if ($schueler->create($_POST))	
            {
                header("Location: " . WEBROOT . "schuelers/index");
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
        $schueler= new Schueler();
        $d["schueler"] = $schueler->show($id);
        if (isset($_POST))
        {
		$secured_params = $this->secure_form($_POST); 
		        
		if ($schueler->edit($id, $secured_params))
            {
                header("Location: " . WEBROOT . "schuelers/index");
            }
        }
        $this->set($d);
        $this->render("edit");
	} else {
		header("Location: " . WEBROOT . "users/login");
	}
    }
	
    function delete($id)
    {
	if($this->isauthenticated($this->Controller->request->action) && $this->isauthorized($this->Controller->request->action)) {
	         
	$schueler = new Schueler();
        if ($schueler->delete($id))
        {
            header("Location: " . WEBROOT . "schuelers/index");
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
	
}
?>
