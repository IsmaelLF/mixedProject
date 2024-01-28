<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class TestRequestController extends AbstractController{

    #[Route('/ip', name: 'app_ip')]

    public function getIp(Request $req){
        $ip = $req->getClientIp();
        return $this->render('projectTemplates/ip.html.twig',[
            'ip'=>$ip,
            'title'=> 'IP:'
        ]);
    }
}