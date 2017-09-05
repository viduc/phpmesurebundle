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
 
    /**
     * Fonction appelée lors du lancement d'une méthode
     * @param String $nomMethode
     * @return String - le nom de la méthode concaténer avec le microtime 
     */
/*    public function debutMesure($nomMethode)
    {
        return $this->getPhpmesure()->debutMesure($nomMethode);
    }
  
    /**
     * Fonction appelée par une méthode pour le calcul et l'envoie de la mesure
     * L'enregistrement est envoyé ensuite au serveur
     * @param microtime $debut Le microtime du début de la méthode
     * @param microtime $fin Le microtime de fin de la méthode
     * @return Boolean
     */
    public function mesure($debut = null, $fin = null)
    {
        if(is_null($debut)){$debut = $this->microtime_float();}
        if(is_null($fin)){$fin = $debut;}
        $trace = debug_backtrace();
        return $this->getPhpmesure()->mesure($trace[1]["class"],$trace[1]["function"],$debut,$fin);
    }

    
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
