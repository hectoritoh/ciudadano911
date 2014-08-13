<?php

namespace Celmedia\AdminThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

use Celmedia\PortalBundle\Entity\Campana;
use Celmedia\PortalBundle\Entity\Mensaje;

class EmergenciaController extends Controller
{
	

	public function emergenciasAction()
	{
		return $this->render('CelmediaAdminThemeBundle:Pages:emergencias.html.twig');
	}



	

	public function getEmergenciasAction()
	{
		$em = $this->getDoctrine()->getManager();        
        
        $emergencias = $this->getDoctrine()->getRepository("AppCoreBundle:Emergencia")->findAll();

        if(count($emergencias) > 0){
	        $arrEmergencias = array();

	        foreach ($emergencias as $emergencia) {
	        	array_push($arrEmergencias, array(
	        		'id' => $emergencia->getId(),
	        		'tipoEmergencia' => $emergencia->getTipoEmergencia(),
	        		'latitud' => $emergencia->getLatitud(),
	        		'longitud' => $emergencia->getLonguitud()
	        		)
	        	);
	        }


	        return new JsonResponse(array(
	            'codigo' => 1,
	            'mensaje' => "Emergencias encontradas",
	            'listaEmergencias' => $arrEmergencias
	        ), 200); //codigo de error diferente
        	
        }else{
        	return new JsonResponse(array(
	            'codigo' => 0,
	            'mensaje' => "No se encontraron emergencias"
	        ), 200); //codigo de error diferente
        }
	}


}
