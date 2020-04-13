<?php

namespace App\Controller;

use App\Entity\Instrument;
use App\Form\InstrumentType;
use App\Repository\CategoryRepository;
use App\Repository\InstrumentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class InstrumentAdmintController extends AbstractController
{

    /**
     * @var InstrumentRepository
     */

    private $repository;


    /**
     * AdminInstrumentController constructor.
     * @param InstrumentRepository $repository
     */
    public function __construct(InstrumentRepository $repository)
    {
        $this->repository = $repository;
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
     * @param Instrument $instrument
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit($id)
    {
        $instrument=$this->repository->find($id) ;

        $form = $this->createForm(InstrumentType::class,$instrument);
        return $this->render('instrument/admin_index.html.twig', [
            'instrument' => $instrument,
            'form' => $form->createView()
        ]);
    }
}
