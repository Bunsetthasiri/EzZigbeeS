<?php

class IndexController extends ControllerBase
{
    public function initialize()
    {
    }

    public function indexAction()
    {
        $this->view->disable();
        $this->response->redirect('index/login');
    }
    public function loginAction()
    {
        $this->assets->addCss('/public/css/login.css');
        $this->assets->addJs('http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js');
        $this->assets->addJs('https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js');

     // check conditions
     $namecondition = "[^!#$%&'()*+,-./:;<=>?@0-9/]{1,}" ;
     $telcondition= "[0-9]{10,10}" ;
     $this->view->setVar("namecondition",$namecondition);


     $login = $this->request->getpost('submit');
     $rememberme =  $this->cookies->get("user");
     $checkbox = $this->request->getpost('checkbox') ;

    //  $username = $this->request->getpost('username');
     if($login){
        //  var_dump($username) ; exit();
        if (  $checkbox == 'check') 
        {
         $cookie_name = "user";
         $cookie_value =$this->request->getpost('username');
         $this->cookies->set($cookie_name,$cookie_value);
        }
     if ($checkbox == '') 
        {
            // var_dump($checkbox) ; exit();
            $cookie_name = "user";
            $cookie_value ="";
            $this->cookies->set($cookie_name,$cookie_value);
        }
        // remember
        
        $this->response->redirect('index/dashboard');
     }
     $this->view->setVar("rememberme",$rememberme);
    }
    public function dashboardAction()
    {
    }
}

