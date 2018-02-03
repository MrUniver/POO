<?php
class userController extends Controller {

	public $title = 'Programmation Orientée Objet';


    protected $composants = array(
		'form'
	);

	public function create()
	{
        if ($this->User->validate()){
            $this->User->save($_POST);
        }
       return $this->render('create', compact('data'));
	}

	public function update($id)
	{
		echo ' modifier le profil n° '.$id;
		$this->render('update');
	}

	public function show()
	{
		echo ' mon profil ';
	}

	public function connect()
	{
	    var_dump($this->User->getUsers());
    }

}