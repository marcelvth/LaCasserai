<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Entity\Room;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $room= $this->getDoctrine()->getRepository(Room::class)->findBy([],['id'=>'DESC'],4,0);;
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'room' => $room,
        ]);
    }
    /**
     * @Route("/viewroom/{id}")
     */
    public function viewroom($id){

        $room = $this->getDoctrine()->getRepository(Room::class)->find($id);

        return $this->render("home/viewroom.html.twig",[

            'room' => $room
        ]);
    }
}
