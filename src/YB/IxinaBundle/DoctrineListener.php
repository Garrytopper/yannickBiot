<?php

namespace YB\IxinaBundle;

use Doctrine\ORM\Event\LifecycleEventArgs;
use YB\IxinaBundle\Entity\Customer;
use YB\IxinaBundle\Entity\Prestation;


class DoctrineListener
{
    private $test;

    public function __construct($test)
    {
        $this->test = $test;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entite = $args->getEntity();
        if (!$entite instanceof Prestation) {
            return;
        }
        $dateLiv = $entite->getClient()->getDateLivSouhaite();   
        $formatDateLiv = $dateLiv->format('y-m-d');
        $timeDateLiv = strtotime($formatDateLiv);
        $entite->setTimeDateLiv($timeDateLiv);
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $entite = $args->getEntity();
        $em = $args->getEntityManager();

        if (!$entite instanceof Customer)
        {
            return ;
        }
        $idCustomer = $entite->getId();
        $prestations = $em->getRepository('YBIxinaBundle:Prestation')->findAllByDate();
        foreach ($prestations as $prestation) {
            $idClientPrestation = $prestation->getClient()->getId();
            if ($idClientPrestation == $idCustomer) {
                $dateLivClient = $prestation->getClient()->getDateLivSouhaite();
                $dateLivClientFormat = $dateLivClient->format('y-m-d');
                $timeDateLivClient = strtotime($dateLivClientFormat);
                $prestation->setTimeDateLiv($timeDateLivClient);
                $em->persist($prestation);
            }
        }
        $em->flush();
    }
}