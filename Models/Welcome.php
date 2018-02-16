<?php
/**
 * Created by PhpStorm.
 * User: Win7
 * Date: 16/02/2018
 * Time: 23:16
 */

class Welcome extends Model
{
    protected $validates = array(
      'user_name' => array(
          'between'=> '6:15'
      ) ,
        'user_email'    => array(
            'email' => true,
        ),
        'user_password' => array(
            'complex'   => true
        )
    );

    protected $table = 'users';

}