<?php
/***********************************************************************************************************************
 * Projet: Phpmesure
 * Auteur: Tristan Fleury - tristan.fleury.gre@gmail.com
 * Année de production: 2017
 * Licence: GNU General Public License (GPL), version 3
 * Copyright © 2017 Tristan Fleury
 **********************************************************************************************************************/

namespace viduc\phpmesureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use viduc\phpmesure\src\Controller\Phpmesure;

class DefaultController extends Controller
{
    /**
     * Service container de symfony passé au constructeur par l'instanciation du service
     * @var objet container 
     */
    protected $container;
	
    /**
     * Constructeur de l'objet (service)
     * @param Object service-container
     */
    public function __construct($container)
    {
	$this->container = $container;
        $this->setNomApplication($container->getParameter('viducphpmesure.nomApplication'));
        $this->setServeurNom($container->getParameter('viducphpmesure.serveurNom'));
        $this->setServeurPort($container->getParameter('viducphpmesure.serveurPort'));
        $this->setPhpmesure(new Phpmesure());
        $this->getPhpmesure()->setNomApplication($this->getNomApplication());
        $this->getPhpmesure()->setServeurNom($this->getServeurNom());
        $this->getPhpmesure()->setServeurPort($this->getServeurPort()); 
    }
    
    public function test()
    {
	return $this->getPhpmesure()->getNomApplication();
    }
    
    /**
     * phpmesure
     * @var Instanciation de l'objet phpmesure librairie commune (vendor)
     */
    private $phpmesure;
    
    /**
     * nomApplication
     * @var String Paramètre nom de l'application
     * Récupéré via la configuration de l'application (config.yml)
     */
    private $nomApplication;
    
    /**
     * serveurNom
     * @var String Paramètre nom du serveur de destination
     * Récupéré via la configuration de l'application (config.yml)
     */
    private $serveurNom;
    
    /**
     * serveurPort
     * @var String Paramètre port du serveur de destination
     * Récupéré via la configuration de l'application (config.yml)
     */
    private $serveurPort;
    
/***********************************************************************************************************************
 * GETTER ET SETTER 
 **********************************************************************************************************************/ 
    /**
     * Setter phpmesure
     * @param viduc\Phpmesure\Phpmesure $nomApplication
     * @return $this
     */
    public function setPhpmesure($phpmesure)
    {
        $this->phpmesure = $phpmesure;
        return $this;
    }
    
    /**
     * Getter phpmesure
     * @return viduc\Phpmesure\Phpmesure
     */
    public function getPhpmesure()
    {
        return $this->phpmesure;
    }    
    
    /**
     * Setter nomApplication
     * @param String $nomApplication
     * @return $this
     */
    public function setNomApplication($nomApplication)
    {
        $this->nomApplication = $nomApplication;
        return $this;
    }
    
    /**
     * Getter nomApplication
     * @return String
     */
    public function getNomApplication()
    {
        return $this->nomApplication;
    }
    
    /**
     * Setter serveurNom
     * @param String $serveurNom
     * @return $this
     */
    public function setServeurNom($serveurNom)
    {
        $this->serveurNom = $serveurNom;
        return $this;
    }
    
    /**
     * Getter serveurNom
     * @return String
     */
    public function getServeurNom()
    {
        return $this->serveurNom;
    }
    
    /**
     * Setter serveurPort
     * @param String $serveurPort
     * @return $this
     */
    public function setServeurPort($serveurPort)
    {
        $this->serveurPort = $serveurPort;
        return $this;
    }
    
    /**
     * Getter serveurPort
     * @return String
     */
    public function getServeurPort()
    {
        return $this->serveurPort;
    }
}
