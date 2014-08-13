<?php

namespace Celmedia\AdminThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Celmedia\PortalBundle\Entity\Campana;
use Celmedia\PortalBundle\Entity\Mensaje;

class ServiciosController extends Controller
{
	

	/*
	implementar y que devuelva json
	*/
	public function getDirectoriosAction()
	{
	    return new JsonResponse(array(
            'codigo' => 0,
            'mensaje' => "No se encontraron directorios"
        ), 200); //codigo de error diferente
	}



}