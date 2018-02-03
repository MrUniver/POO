<?php
/**
 * Form: sert à créer des formulaires
 */
class Form{

	private $posts;
	public $validateur;

    /**
     * Form constructor.
     * @param Validateur $validateur
     */
	public function __construct(Validateur $validateur)
	{
		$this->posts=  $_POST;
		$this->validateur = $validateur;
	}

    /**
     * @param string $name
     * @return null
     */
	private function getValue(string $name)
	{
		return $this->posts[$name] ?? null;
	}

    /**
     * @param string $name
     * @param array $options
     * @return string
     */
	public function create(string $name, array $options = []):string
	{
		$method = $options['method'] ?? 'post';
		$action = $options['action'] ?? null;
		return '<form method="'.$method.'" name="'.$name.'" id="form-'.ucfirst($name).'" action="'.$action.'">';
	}

    /**
     * @param string $name
     * @param string $texte
     * @param array $options
     * @return string
     */
	public function input(string $name, string $texte, array $options = []):string
	{
		$html 	= $this->label($name, $texte); 
		$type 	= $options['type'] ?? 'text';
		$errors = $this->validateur->getError($name);
		//var_dump($this->validateur->getErrors());
		if(!empty($errors)){
			$html .=  '<div class="alert alert-danger">';
			foreach ($errors as $error) {
				$html .= $error. '<br>';
			}
			$html .= '</div>';
		}
		$html .= '<p><input type="'.$type.'" name="'.$name.'" placeholder="'.$texte.'" class="form-control" id="'.$name.'" value="'.$this->getValue($name).'"></p>';
		return $html;
		
	}

    /**
     * @param string $for
     * @param string $texte
     * @return string
     */
	public function label(string $for, string $texte):string
    {
		return '<label for="'.$for.'">'.$texte.'</label><br>';
	}

    /**
     * @param string $texte
     * @return string
     */
	public function end(string $texte):string
	{
		return '<button type="submit" class="btn btn-primary">'.$texte.'</button>
		</form>';
	}
}