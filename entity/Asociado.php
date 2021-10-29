<?php 
class Asociado{
        /**
     * @var string
     */
    private $nombre;
     /**
     *@var string
     */
    private $logo;
    /**
     *@var string
     */
    private $descripcion;

    const RUTA_IMAGENES_LOGO = 'images/index/';

    
    public function __construct(string $nombre,string $logo,string $descripcion)
{
$this->nombre=$nombre;
$this->logo=$logo;
$this->descripcion=$descripcion;
}   

    /**
     * Get *@var string
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set *@var string
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get *@var string
     */ 
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set *@var string
     *
     * @return  self
     */ 
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get the value of nombre
     *
     * @return  string
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @param  string  $nombre
     *
     * @return  self
     */ 
    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
    public function getUrlLogo() : string

    {

        return self::RUTA_IMAGENES_LOGO. $this->getLogo();

    }
}
?>