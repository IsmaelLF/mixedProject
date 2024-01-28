<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Exception\InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FactorialController extends AbstractController{

    
    #[Route("/factorial/{num}", name: "app_factorial")]
    public function factorial(string $num = null):Response
    {
        
        try {
            $validatedNum = $this->validateNumber($num);
            $result = $this->getFactorial($validatedNum);

            return $this->render('projectTemplates/factorial.html.twig',[
                'number' => $validatedNum,
                'result' => $result,
                'title' => 'Factorial'
            ]);

        } catch (InvalidArgumentException $e) {
            return $this->render('projectTemplates/factorial.html.twig',[
                'isError' => true,
                'errorMsg'=> $e->getMessage(),
                'title' => 'Factorial'
            ]); 
        }
    }
    
        private function validateNumber(string $num):int{
            if($num < 0){
                throw new InvalidArgumentException('You must input a number higher than 0.');
            }
            else if(!is_numeric($num)){
                throw new InvalidArgumentException('You must input a number.');
            }
            return (int)$num;
    }
    private function getFactorial($num)
    {
        $result = 1;
        
        for ($i=$num; $i > 0 ; $i--) { 
            $result *= $i;
        }
        return $result;
    }

}