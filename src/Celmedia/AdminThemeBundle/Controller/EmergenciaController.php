<?php

namespace Celmedia\AdminThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Celmedia\PortalBundle\Entity\Campana;
use Celmedia\PortalBundle\Entity\Mensaje;

class EmergenciaController extends Controller
{
	


	public function emergenciasAction()
	{
		return $this->render('CelmediaAdminThemeBundle:Pages:emergencias.html.twig');
	}







}
