<?php

namespace App\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emergencia
 */
class Emergencia
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $tipo_emergencia;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $latitud;

    /**
     * @var string
     */
    private $longuitud;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     */
    private $usuario;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tipo_emergencia
     *
     * @param string $tipoEmergencia
     * @return Emergencia
     */
    public function setTipoEmergencia($tipoEmergencia)
    {
        $this->tipo_emergencia = $tipoEmergencia;
    
        return $this;
    }

    /**
     * Get tipo_emergencia
     *
     * @return string 
     */
    public function getTipoEmergencia()
    {
        return $this->tipo_emergencia;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Emergencia
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set latitud
     *
     * @param string $latitud
     * @return Emergencia
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    
        return $this;
    }

    /**
     * Get latitud
     *
     * @return string 
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longuitud
     *
     * @param string $longuitud
     * @return Emergencia
     */
    public function setLonguitud($longuitud)
    {
        $this->longuitud = $longuitud;
    
        return $this;
    }

    /**
     * Get longuitud
     *
     * @return string 
     */
    public function getLonguitud()
    {
        return $this->longuitud;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Emergencia
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Emergencia
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set usuario
     *
     * @param \Application\Sonata\UserBundle\Entity\User $usuario
     * @return Emergencia
     */
    public function setUsuario(\Application\Sonata\UserBundle\Entity\User $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Application\Sonata\UserBundle\Entity\User 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
    /**
     * @var string
     */
    private $estado;


    /**
     * Set estado
     *
     * @param string $estado
     * @return Emergencia
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }
}