<?php

namespace App\CoreBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class EmergenciaAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('tipo_emergencia')
            ->add('descripcion')
            ->add('latitud')
            ->add('longuitud')
            ->add('created')
            ->add('updated')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('tipo_emergencia')
            // ->add('descripcion')
            ->add('latitud')
            ->add('longuitud')
            ->add('created')
            // ->add('updated')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

        $tipos_emergencias = array( 'salud' => 'Salud'  , 'seguridad' => 'Seguridad' , 'cte' => "comision transito" , 'bomberos' => "Bomberos" ); 

        $formMapper
            // ->add('id')
            ->add('tipo_emergencia'  , 'choice', array(  'choices' =>  $tipos_emergencias ))
            ->add('usuario', 'sonata_type_model', array(), array(     ))
            ->add('descripcion')
            ->add('latitud')
            ->add('longuitud')
            // ->add('created')
            // ->add('updated')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            // ->add('id')
            ->add('tipo_emergencia')
            ->add('descripcion')
            ->add('latitud')
            ->add('longuitud')
            // ->add('created')
            // ->add('updated')
        ;
    }
}
