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



	public function getEmergenciaAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();     
        

        if ($request->isMethod('POST')) {

            $emergenciaJSON = $request->request->get('emergencia');


	        $emergencia = $this->getDoctrine()->getRepository("AppCoreBundle:Emergencia")->findOneBy(
	        	array(
	            	"id" => $emergenciaJSON["id"]
	            )
	        );

	        $arrEmergencia = array(
	        	'idEmergencia' => $emergencia->getId(),
	        	'tipoEmergencia' => $emergencia->getTipoEmergencia(),
	        	'descripcion' => $emergencia->getDescripcion(),
	        	'latitud' => $emergencia->getLatitud(),
	        	'longitud' => $emergencia->getLonguitud(),
	        	'idUsuario' => $emergencia->getUsuario()->getId(),
	        	'username' => $emergencia->getUsuario()->getUsername(),
	        	'fecha' => $emergencia->getCreated()->format('Y-m-d H:i:s')
	        );

	        return new JsonResponse(array(
	            'codigo' => 1,
	            'mensaje' => "Emergencias encontradas",
	            'emergenciaDetalle' => $arrEmergencia
	        ), 200); //codigo de error diferente

	    }else{
        	return new JsonResponse(array(
	            'codigo' => 0,
	            'mensaje' => "No se encontraron emergencias"
	        ), 200); //codigo de error diferente
        }
	}
	

	public function atenderEmergenciaAction($idEmergencia)
	{
		$em = $this->getDoctrine()->getManager();
		$emergencia = $this->getDoctrine()->getRepository("AppCoreBundle:Emergencia")->findOneBy(
        	array(
            	"id" => $idEmergencia
            )
        );
        return new JsonResponse(array(
            'codigo' => 0,
            'mensaje' => "No se atiende"
        ), 200); //codigo de error diferente
	}
}
