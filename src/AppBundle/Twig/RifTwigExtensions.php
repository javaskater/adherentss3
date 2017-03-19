<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// src/AdherentsBundle/Twig/DateTwigExtension.php
namespace AppBundle\Twig;

class RifTwigExtensions extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('heurerif', array($this, 'heureRifFilter')),
             new \Twig_SimpleFilter('daterif', array($this, 'dateRifFilter')),
            new \Twig_SimpleFilter('allurerif', array($this, 'allureRifFilter')),
            new \Twig_SimpleFilter('distancerif', array($this, 'distanceRifFilter')),
        );
    }

    public function heureRifFilter($date)
    {
        $rif_date = date_format($date, 'H:i');

        if ($rif_date == "00:00"){
            $rif_date = "--";
        }
        return $rif_date;
    }

    public function dateRifFilter($date,$langue)
    {
        //https://openclassrooms.com/forum/sujet/avoir-la-date-en-francais-grace-a-un-datetime-29453
        $locale = "en_US.utf8";
        if ($langue == "fr"){
            $locale = "fr_FR.utf8";
        }
        setlocale(LC_TIME, $locale);
        $rif_date = strftime("%A %d %B", $date->getTimestamp());
        //$rif_date = date_format($date, 'l d F');

        return $rif_date;
    }

    public function allureRifFilter($allure)
    {
        $rif_allure = "M";
        $rif_allure_bgclass = "success";

        switch ($allure) {
            case 1:
                $rif_allure = "L";
                $rif_allure_bgclass = "primary";
                break;
            case 3:
                $rif_allure = "S";
                $rif_allure_bgclass = "warning";
                break;
            case 4:
                $rif_allure = "R";
                $rif_allure_bgclass = "danger";
                break;
        }
        //on peut retourner un tableau; cf. http://twig.sensiolabs.org/doc/filters/slice.html
        return array($rif_allure,$rif_allure_bgclass);
    }

    public function distanceRifFilter($randonnee)
    {

        $distance_calculee = $randonnee->getDistancecalculee();
        $output = $distance_calculee." km";

        $unite = $randonnee->getUnite();
        if( $unite == "2" ){
            $distance_inferieure = $randonnee->getDistanceinferieure();
            $output = $distance_inferieure." h ( ". $distance_calculee." km )";
        }
        return $output;
    }

    public function getName()
    {
        return 'adherents_extension';
    }
}
