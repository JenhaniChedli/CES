<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Club;
use App\Entity\Staff;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(): Response
    {
        $date=new \DateTime();
        //  Obtain doctrine manager
        $em = $this->getDoctrine()->getManager();

        //  Setup repository of some entity
        $repoArticles = $em->getRepository(Article::class);
        //  Query how many rows are there in the Articles table
        $totalArticles = $repoArticles->createQueryBuilder('a')
            // Filter by some parameter if you want
            // ->where('a.published = 1')
            ->select('count(a.id)')
            ->getQuery()
            ->getSingleScalarResult();
        //  Setup repository of some entity
        $repoClub = $em->getRepository(Club::class);
        //  Query how many rows are there in the Articles table
        $totalClub = $repoClub->createQueryBuilder('a')
            // Filter by some parameter if you want
            // ->where('a.published = 1')
            ->select('count(a.id)')
            ->getQuery()
            ->getSingleScalarResult();
        //  Setup repository of some entity
        $repoStaff = $em->getRepository(Staff::class);
        //  Query how many rows are there in the Articles table
        $totalStaff = $repoStaff->createQueryBuilder('a')
            // Filter by some parameter if you want
            // ->where('a.published = 1')
            ->select('count(a.id)')
            ->getQuery()
            ->getSingleScalarResult();
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'totalArticles'=>$totalArticles,
            'totalClubs'=>$totalClub,
            'totalStaffs'=>$totalStaff,
            'date'=>$date,
        ]);
    }
}
