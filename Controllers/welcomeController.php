<?php
class welcomeController extends  Controller
{
    protected $composants = array(
        'form',
        'session'
    );



    protected $title = 'TutoChat';

    public function connexion()
    {
        $this->title .= ' | Connexion';
        if ($this->Welcome->validate()){
            $data = $_POST;
            $data['user_register'] = date('Y-m-d H:i:s');
            $data['user_token'] = uniqid();
            if ($this->Welcome->save($data)){
                $this->Session->setFlash('Vous êtes inscris, vérifier votre boite email', 'success');
                $_POST = null;

            }
        }
        return $this->render('connexion');
    }

    public function inscription()
    {
        return $this->render('inscription');
    }

    public function resetpassword()
    {
        return $this->render('resetpassword');
    }

    public function confirmtoken($token)
    {
        return $this->render('confirmtoken');
    }

}