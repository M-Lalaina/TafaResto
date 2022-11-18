<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\Dishes;
use App\Form\OrderType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OrderController extends AbstractController
{
    #[Route('/order/{id}', name: 'app_order', methods: ['GET', 'POST'])]
    public function order(Request $request,  Dishes $dish, EntityManagerInterface $manager): Response
    {
        $order = new Order();
        $form = $this->createForm(OrderType::class, $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $order->setUser($this->getUser());

            $order->setDish($dish);

            $dish->setQuantity($dish->getQuantity() - $order->getQuantity());

            $order->setTotalPrice(($order->getQuantity()) * ($dish->getPrice()));

            $manager->persist($order);

            $manager->persist($dish);

            $manager->flush();

            return  $this->redirectToRoute('app_home');
        }


        return $this->render('order/order.html.twig', [
            'dish' => $dish,
            'form' => $form->createView(),
        ]);
    }
}
