<?php
    class Controller
    {
        public $vars = [];
        public $layout = "default";
	protected $controller;

	function __construct() 
	{     
	
	require_once(ROOT . 'router.php');
	require_once(ROOT . 'request.php');
	
	$this->request = new Request();
	Router::parse($this->request->url,$this->request);
	
	}


        function set($d)
        {
            $this->vars = array_merge($this->vars, $d);
        }
        function render($filename)
        {
		       
		extract($this->vars);
            ob_start();
            require(ROOT . "Views/" . ucfirst(str_replace('Controller', '', get_class($this))) . '/' . $filename . '.php');
            $content_for_layout = ob_get_clean();
            if ($this->layout == false)
            {
                echo($content_for_layout);
            }
            else
            {
                require(ROOT . "Views/Layouts/" . $this->layout . '.php');
		  
            }
        }
	public function isauthenticated($action) 
	{
		if ($action ==='login' || $action === 'logout') {
			return true;
		} 
		if(!isset($_SESSION['user'])) {
		return false;
		}
		return true; 
	}
        private function secure_input($data)
        {
           $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        protected function secure_form($form)
        {
            foreach ($form as $key => $value)
            {
                $form[$key] = $this->secure_input($value);
            }
		return $form;
        }
    }
?>
