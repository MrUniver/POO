<?php

/**
 * Class Controller
 */
Class Controller{

	protected $viewPath;
	protected $composants = [];
	protected $db;

	public function __construct()
	{
		preg_match('/[a-z]+/', get_class($this), $matches);
		$this->viewPath = ucfirst($matches[0]).'s';
	}

    /**
     * @param $view
     * @param array $vars
     */
	public function render($view, $vars =[])
	{
		ob_start();
		extract($vars);
		require ROOT."Views/".$this->viewPath.'/'.$view.'.php';
		$page_content = ob_get_clean();
		require ROOT.'Views/Templates/default.php';
	}

    /**
     * @return $composant
     */
	public function loadComposant()
	{
		if (!empty($this->composants)) {
			foreach ($this->composants as $composant) {
				$composant = ucfirst($composant);
				if ($composant === 'Form') {
					$this->$composant = new $composant(new Validateur($_POST));
				}else{
					$this->$composant = new $composant($_POST);
				}
			}
		}
	}

    public function loadModel()
    {
        preg_match("/[a-z]+/", get_called_class(), $matches);
        $entity = ucfirst($matches[0]);
        if (!isset($this->$entity)){
            $this->$entity = new $entity();
            if (isset($this->Form)){ //créer
                $this->$entity->Form = $this->Form;
            }
        }
	}
}