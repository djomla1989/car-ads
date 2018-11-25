<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Session
{
    public $message;
    private $logged_in=FALSE;
    public $user_id;
    public $username;
    public $user_status;

    public function  __construct() {
      if($this->check_login())
              {
          //some code if user is login
          redirect_to('index.php');
              }
          else {
              //code if user is not login
               }
       
      
    }

    public function is_logged_in()
    {
        return $this->logged_in;
    }

    //$user is object of user
    public function login($user)
    {
        if($user)
            {
                $this->user_id =$_SESSION['user_id'] = $user->user_id;
                $this->username=$_SESSION['username'] = $user->username;
                $this->user_status=$_SESSION['user_status']= $user->user_status;
                $this->logged_in=TRUE;
            }
    }
    
    public function logout()
    {
        unset ($_SESSION['user_id']);
        unset ($_SESSION['username']);
        unset ($_SESSION['user_status']);
        unset ($this->user_id);
        $this->logged_in=false;
    }

   private function check_login() {
    if(isset($_SESSION['user_id'])) {
      $this->user_id = $_SESSION['user_id'];
      $this->logged_in = true;
	 
    } else {
      unset($this->user_id);
      $this->logged_in = false;
	 
    }
  }
}
$session=new Session();
?>
