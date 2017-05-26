<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use BackendBundle\Entity\Following;
use BackendBundle\Entity\User;

class FollowingController extends Controller {

    private $session;

    function __construct() {
        $this->session = new Session();
    }

    public function followAction(Request $request){
        echo "Follow action";
        die();
    }
   
}
