<?php

namespace App\Controller;

use App\Entity\Instrument;
use App\Form\InstrumentType;
use App\Repository\CategoryRepository;
use App\Repository\InstrumentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class InstrumentAdminController extends AbstractController
{

    /**
     * @var InstrumentRepository
     */

    private $repository;

    /**
     * @var ObjectManager
     */
    private $em;


    /**
     * AdminInstrumentController constructor.
     * @param InstrumentRepository $repository
     */
    public function __construct(InstrumentRepository $repository,EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/admin/instrument", name="admin_instrument")
     */
    public function index()
    {
        $instruments = $this->repository->findAll();
        return $this->render('instrument/admin_index.html.twig', [
            'instruments' => $instruments,
        ]);
    }

    /**
     * @Route("/admin/instrument/edit/{id}", name="admin_instrument.edit")
     * @param $id
     * @param Request $request     * @param ObjectManager $em
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit($id,Request $request)
    {
        $instrument=$this->repository->find($id) ;
        $form = $this->createForm(InstrumentType::class,$instrument);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
           // return $this->redirectToRoute('home');
        }


        return $this->render('instrument/admin_index.html.twig', [
            'instrument' => $instrument,
            'form' => $form->createView()
        ]);
    }
}
