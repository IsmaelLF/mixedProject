<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Car;

class CarController extends AbstractController{

    #[Route('/CarController', name: 'app_car')]
    public function storeSession(SessionInterface $session){

        $number = 1;
        $object = new Car(1, 'Test');
        $objectS = serialize($object);
        $session->set('number', $number);
        $session->set('object', $objectS);

        return $this->redirectToRoute('app_session');
    }

    #[Route('/session', name: 'app_session')]
    public function getSession(SessionInterface $session){
        $seshNum = $session->get('number', 0);
        $seshObj = unserialize($session->get('object', ''));
        return $this->render('projectTemplates/car.html.twig',[
            'number'=> $seshNum,
            'object'=> $seshObj,
            'title'=> 'Car'
        ]);
    }
}