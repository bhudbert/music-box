<?php

namespace App\Controller;

use App\Entity\Instrument;
use App\Entity\Category;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InstrumentController extends AbstractController
{
    /**
     * @Route("/instrument", name="instrument")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $catRepo=$this->getDoctrine()->getRepository(Category::class);
        $cat=$catRepo->find(1);

        $inst=new Instrument();
        $inst->setCategory($cat);
        $inst->setName("stratocaster");
        $inst->setDescription("Une guitare Fender !");
        $em=$this->getDoctrine()->getManager();
        $em->persist($inst);
        $em->flush();
        return $this->render('instrument/index.html.twig', [
            'controller_name' => 'InstrumentController',
        ]);
    }
}
