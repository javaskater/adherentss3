<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session;
use Symfony\Component\Serializer\Serializer;
//use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
//use Doctrine\ORM\Tools\Pagination\Paginator as Paginator;

class RandonneesController extends Controller {
    

    /**
     * @Route("/randonnees/", name="randos_liste")
     * @Method({"GET","POST"})
     * @Template()
     */
    public function indexAction(Request $request, $filtre = null, $nbRandosPage = 10) {
        $serializer = $this->get('serializer');//see https://symfony.com/doc/current/serializer.html
        //http://www.6ma.fr/tuto/une+pagination+performante+avec+symfony-777         
        $randonnees = $this->getListe();
        /*$logger = $this->get('logger');
        $logger->info("On a trouvé :".count($randonnees)." randonnées de jour");*/
        $langue = $request->getLocale();
        return array('langue' => $langue, 'nbRandos' => count($randonnees), 'randonnees' => $randonnees,  
            'pagination' => null, 'full_title' => 'Randonneurs d\'Ile de France ( '.count($randonnees).' Randos Jour)','short_title' => 'RIF (Jour)');
    }

    /**
     * @Route("/randonnee/{cleRando}")
     * @Template()
     */
    public function viewAction($cleRando, Request $request) {
        //if ($request->isXMLHttpRequest()) {

        $randonnee = $this->getDoctrine()
                ->getRepository('AppBundle:Randonnees')
                ->find($cleRando);

        if (!$randonnee) {
            throw $this->createNotFoundException(
                    'Pas de randonnee pour la cle :' . $cleRando
            );
        }
        //see http://symfony.com/doc/current/components/serializer.html
        //$encoders = array(new XmlEncoder(), new JsonEncoder());
        $encoders = array(new JsonEncoder());
        $normalizer =  new ObjectNormalizer();
        //http://symfony.com/doc/current/components/serializer.html see circulable references
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getCle();
        });
        $normalizers = array($normalizer);
        
        $serializer = new Serializer($normalizers, $encoders);

        $json_datas = $serializer->serialize($randonnee, 'json');
        return new Response($json_datas);
        //}
        //return new Response('This is not ajax!', 400);
    }

    /**
     * @Route("/session", name="add_to_session")
     * @Method({"POST"})
     * @Template()
     */
    public function addsessionAction(Request $request) {
        //if ($request->isXMLHttpRequest()) {
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);
        $resultat = array();
        $session_en_cours  = $this->get("session");
        foreach ($request->request->all() as $cle => $valeur){
            $session_en_cours->set($cle, $valeur);
            $resultat[] = array($cle => $valeur);
        }

        $json_datas = $serializer->serialize($resultat, 'json');
        return new Response($json_datas);
        //}
        //return new Response('This is not ajax!', 400);
    }

    /**
     * Mettre en session le couple cleValeur en variables POST
     * @param string $typerando
     * @param int $page
     * @param int $maxperpage
     * @param string $sortby
     * @param string $sortorder
     * @return Array
     */
    public function getListe($filtre = array(), $sortorder = 'ASC') {

        $filtre = array_merge($filtre, array(
            'typerando' => array('Journée','Surprise'),
            'debut' => new \DateTime('yesterday'),
        ));
        $parametres_requete = array('typerando' => $filtre['typerando'],
            'datedebut' => $filtre['debut'],);
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        //http://doctrine-orm.readthedocs.org/projects/doctrine-orm/en/latest/reference/query-builder.html
        $qb->from('AppBundle:Randonnees', 'r')->select('r')->where(
                $qb->expr()->andX(
                        $qb->expr()->in('r.typerando', ':typerando'), $qb->expr()->gt('r.date ', ':datedebut')
                )
        );
        if ($sortorder == 'ASC') {
            $qb->addOrderBy('r.date', 'ASC');
        } else {
            $qb->addOrderBy('r.date', 'DESC');
        }
        $qb->addOrderBy('r.allure', 'ASC');
        $qb->addOrderBy('r.distancecalculee', 'ASC');
        $query = $qb->setParameters($parametres_requete)->getQuery();
        
        $resultat_requete = $query->getResult();
        

        /*$pr = new Paginator($query);
        $nbRandosTotal = count($pr); //see http://stackoverflow.com/questions/15906051/doctrine2-paginator-getting-total-results
        $pagesCount = ceil($nbRandosTotal / $maxperpage);
        $query->setFirstResult(($page - 1) * $maxperpage)
                ->setMaxResults($maxperpage);

        $resultat_requete = array(
            'paginated_result' => $pr,
            'nbtotalRandos' => $nbRandosTotal,
            'totalPages' => $pagesCount
        );*/

        return $resultat_requete;
    }

}
