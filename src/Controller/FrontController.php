<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="app_front")
     */
    public function index(): Response
    {
        return $this->render('front/index.html.twig');
    }

	/**
	 * @Route("/video_list", name="video_list")
	 */
	public function video_list(): Response
	{
		return $this->render('front/video_list.html.twig');
	}

	/**
	 * @Route("/video_details", name="video_details")
	 */
	public function video_details(): Response
	{
		return $this->render('front/video_details.html.twig');
	}

	/**
	 * @Route("/search_results", methods={"POST"}, name="search_results")
	 */
	public function search_results(): Response
	{
		return $this->render('front/search_results.html.twig');
	}

	/**
	 * @Route("/pricing", name="pricing")
	 */
	public function pricing(): Response
	{
		return $this->render('front/pricing.html.twig');
	}

	/**
	 * @Route("/register", name="register")
	 */
	public function register(): Response
	{
		return $this->render('front/register.html.twig');
	}

	/**
	 * @Route("/login", name="login")
	 */
	public function login(): Response
	{
		return $this->render('front/login.html.twig');
	}
}
