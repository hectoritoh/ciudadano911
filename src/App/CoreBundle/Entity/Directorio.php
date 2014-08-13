<?php

namespace App\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Directorio
 */
class Directorio
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $tipo;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $infoadicional;

    /**
     * @var string
     */
    private $direccion;

    /**
     * @var string
     */
    private $latitud;

    /**
     * @var string
     */
    private $longuitud;

    /**
     * @var boolean
     */
    private $estado;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $telefonos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->telefonos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set nombre
     *
     * @param string $nombre
     * @return Directorio
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return Directorio
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Directorio
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
     * Set infoadicional
     *
     * @param string $infoadicional
     * @return Directorio
     */
    public function setInfoadicional($infoadicional)
    {
        $this->infoadicional = $infoadicional;
    
        return $this;
    }

    /**
     * Get infoadicional
     *
     * @return string 
     */
    public function getInfoadicional()
    {
        return $this->infoadicional;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Directorio
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set latitud
     *
     * @param string $latitud
     * @return Directorio
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
     * @return Directorio
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
     * Set estado
     *
     * @param boolean $estado
     * @return Directorio
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Directorio
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
     * @return Directorio
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
     * Add telefonos
     *
     * @param \App\CoreBundle\Entity\Telefono $telefonos
     * @return Directorio
     */
    public function addTelefono(\App\CoreBundle\Entity\Telefono $telefonos)
    {
        $this->telefonos[] = $telefonos;
    
        return $this;
    }

    /**
     * Remove telefonos
     *
     * @param \App\CoreBundle\Entity\Telefono $telefonos
     */
    public function removeTelefono(\App\CoreBundle\Entity\Telefono $telefonos)
    {
        $this->telefonos->removeElement($telefonos);
    }

    /**
     * Get telefonos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTelefonos()
    {
        return $this->telefonos;
    }



    public function __toString(){
        return $this->nombre . ""; 
    }


}
