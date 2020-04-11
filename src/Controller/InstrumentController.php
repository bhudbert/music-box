<?php

namespace App\Controller;


use App\Repository\InstrumentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InstrumentController extends AbstractController
{

    private $repository;
        // I prefer make injection in constructor for multiple uses
    public function __construct(InstrumentRepository $instRepo)
    {
        $this->repository =  $instRepo;

    }


    /**
     * @Route("/instruments", name="instruments")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {

        $inst=$this->repository->findInStock();


        return $this->render('instrument/index.html.twig', [
            'instruments' => $inst
        ]);
    }
    /**
     * @Route("/instrument/{name}_{id}", name="instrument/" ,requirements={"slug":"[a-Z0-9\-\_]*"})
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show($id)
    {

        $inst=$this->repository->find($id) ;
        dump($id);


        return $this->render('instrument/show.html.twig', [
            'instrument' => $inst
        ]);
    }
}
