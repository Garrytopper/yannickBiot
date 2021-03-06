<?php

namespace YB\IxinaBundle\Repository;

/**
 * CustomerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CustomerRepository extends \Doctrine\ORM\EntityRepository
{
    public function ClientsToday()
    {
        $qb = $this->createQueryBuilder('c');
        $qb->Where('c.dateProchaineAction = :today')
            ->setParameter('today', new \DateTime(date('Y-m-d')))
            ->andWhere('c.etatDossier = :etat')
            ->setParameter('etat', 'Prospect')
            ;
        return $qb->getQuery()->getResult();
    }

    public function ClientsByDateAction()
    {
        $qb = $this->createQueryBuilder('c');
        $qb->orderBy('c.dateProchaineAction', 'ASC');
            
        return $qb->getQuery()->getResult();
    }

    public function ClientsByDateCreation()
    {
        $qb = $this->createQueryBuilder('c');
        $qb->orderBy('c.plan', 'DESC')
            ->leftJoin('c.plan', 'p')
            ->addSelect('p');
        return $qb->getQuery()->getResult();
    }

    public function ProspectByDateAction()
    {
        $qb = $this->createQueryBuilder('c')
            ->Where('c.etatDossier = :etat')
            ->setParameter('etat', 'Prospect')
            ->orderBy('c.dateProchaineAction', 'ASC');
        return $qb->getQuery()->getResult();
    }

    public function ClientsDessin()
    {
        $qb = $this->createQueryBuilder('c');
        $qb->Where('c.dessin = :dessin')
            ->setParameter('dessin', false)
            ->orderBy('c.dateProchaineAction', 'ASC');
        $this->MoisEnCours($qb);
        return $qb->getQuery()->getResult();
    }

    public function ClientsPreparer()
    {
        $qb = $this->createQueryBuilder('c')
            ->Where('c.preparation = :preparation')
            ->setParameter('preparation', false)
            ->orderBy('c.dateProchaineAction', 'ASC');
        $this->MoisEnCours($qb);
        return $qb->getQuery()->getResult();
    }

    public function firstDessin()
    {
        $qb = $this->createQueryBuilder('c')
            ->Where('c.dessin = :dessin')
            ->setParameter('dessin', false)
            ->orderBy('c.dateProchaineAction', 'ASC');
            $this->MoisEnCours($qb);
            return $qb->getQuery()->getResult();
    }

    public function firstPreparation()
    {
        $qb = $this->createQueryBuilder('c')
            ->Where('c.preparation = :preparation')
            ->setParameter('preparation', false)
            ->orderBy('c.dateProchaineAction', 'ASC');
            $this->MoisEnCours($qb);
            return $qb->getQuery()->getResult();
    }

/* Récupération lié au mois en cours */

    public function ClientsPerduMoisEnCours()
    {
        $qb = $this->createQueryBuilder('c')
            ->Where('c.etatDossier = :etat')
            ->setParameter('etat', 'Perdu')
            ->orderBy('c.dateProchaineAction', 'ASC');
            $this->MoisEnCours($qb);
        return $qb->getQuery()->getResult();
    }

    public function ClientsVenduMoisEnCours()
    {
        $qb = $this->createQueryBuilder('c')
            ->Where('c.etatDossier = :etat')
            ->setParameter('etat', 'Vendu')
            ->orderBy('c.dateProchaineAction', 'ASC');
            $this->MoisEnCours($qb);
        return $qb->getQuery()->getResult();
    }

    public function ClientsProspectMoisEnCours()
    {
        $qb = $this->createQueryBuilder('c')
            ->Where('c.etatDossier = :etat')
            ->setParameter('etat', 'Prospect')
            ->orderBy('c.dateProchaineAction', 'ASC');
        $this->MoisEnCours($qb);
        return $qb->getQuery()->getResult();
    }

    public function NewProspectDuMois()
    {
        $qb = $this->createQueryBuilder('c')
            ->Where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date('Y-M').'-01'))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00').'+1 month'))
            ;
        return $qb->getQuery()->getResult();
    }

    public function ClientsRetourDuMois()
    {
         $qb = $this->createQueryBuilder('c')
            ->Where('c.etatDossier = :etat')
            ->setParameter('etat', 'Prospect')
            ->andWhere('c.action = :action')
            ->setParameter('action', 'Retour')
            ->orderBy('c.dateProchaineAction', 'ASC');
            $this->MoisEnCours($qb);
        return $qb->getQuery()->getResult();
    }

    public function ClientsCreeMoisEnCours()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01')))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00').'+1 month'))
            ;
        return $qb->getQuery()->getResult();
    }

    public function ClientsCreeLeMoisDernier()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01').'-1 month'))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00')))
            ;
        return $qb->getQuery()->getResult();
    }

    public function ClientsCreeLeMoisDernierArelancer()
    {
        $qb = $this->createQueryBuilder('c')
        ->where('c.dateCreation BETWEEN :debut AND :fin')
        ->setParameter('debut', new \dateTime(date(date('Y-m').'-01').'-1 month'))
        ->setParameter('fin', new \dateTime(date(date('Y-m').'-00')))
        ->andWhere('c.action = :action')
        ->setParameter('action', 'Relance')
        ->andWhere('c.etatDossier = :etat')
        ->setParameter('etat', 'Prospect')
        ;
        return $qb->getQuery()->getResult();
    }

    public function ClientsCreeLes2MoisDernier()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01').'-2 month'))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00').'-1 month'))
            ;
        return $qb->getQuery()->getResult();
    }

    public function ClientsCreeLes3MoisDernier()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01').'-3 month'))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00').'-2 month'))
            ;
        return $qb->getQuery()->getResult();
    }

    public function ClientsCreeLeMoisVendu()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01')))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00').'+1 month'))
            ->andWhere('c.etatDossier = :value')
            ->setParameter('value', 'Vendu')
            ;
            return $qb->getQuery()->getResult();
    }

    public function ClientsCreeLeMoisDernierVendu()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01').'-1 month'))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00')))
            ->andWhere('c.etatDossier = :value')
            ->setParameter('value', 'Vendu')
            ;
            return $qb->getQuery()->getResult();
    }

    public function ClientsCreeMoisDernierVenduFige()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01').'-1 month'))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00')))
            ->andWhere('c.etatDossier = :value')
            ->setParameter('value', 'Vendu')
            ->andWhere('c.dateProchaineAction BETWEEN :depart AND :arrive')
            ->setParameter('depart', new \dateTime(date(date('Y-m').'-01').'-1 month'))
            ->setParameter('arrive', new \dateTime(date(date('Y-m').'-00')))
            ;
            return $qb->getQuery()->getResult();
    }

    public function ClientsCreeLes2MoisDernierVendu()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01').'-2 month'))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00').'-1 month'))
            ->andWhere('c.etatDossier = :value')
            ->setParameter('value', 'Vendu')
            ;
            return $qb->getQuery()->getResult();
    }

    public function ClientsCreeLes3MoisDernierVendu()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01').'-3 month'))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00').'-2 month'))
            ->andWhere('c.etatDossier = :value')
            ->setParameter('value', 'Vendu')
            ;
            return $qb->getQuery()->getResult();
    }

    public function ClientsCreeLeMoisPerdu()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01')))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00').'+1 month'))
            ->andWhere('c.etatDossier = :value')
            ->setParameter('value', 'Perdu')
            ;
            return $qb->getQuery()->getResult();
    }

    public function ClientsCreeLeMoisDernierPerdu()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01').'-1 month'))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00')))
            ->andWhere('c.etatDossier = :value')
            ->setParameter('value', 'Perdu')
            ;
            return $qb->getQuery()->getResult();
    }

    public function ClientsCreeLes2MoisDernierPerdu()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01').'-2 month'))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00').'-1 month'))
            ->andWhere('c.etatDossier = :value')
            ->setParameter('value', 'Perdu')
            ;
            return $qb->getQuery()->getResult();
    }

    public function ClientsCreeLes3MoisDernierPerdu()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01').'-3 month'))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00').'-2 month'))
            ->andWhere('c.etatDossier = :value')
            ->setParameter('value', 'Perdu')
            ;
            return $qb->getQuery()->getResult();
    }

    public function ClientsCreeLeMoisProspect()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01')))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00').'+1 month'))
            ->andWhere('c.etatDossier = :value')
            ->setParameter('value', 'Prospect')
            ;
            return $qb->getQuery()->getResult();
    }

    public function ClientsCreeLeMoisDernierProspect()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01').'-1 month'))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00')))
            ->andWhere('c.etatDossier = :value')
            ->setParameter('value', 'Prospect')
            ;
            return $qb->getQuery()->getResult();
    }

    public function ClientsCreeLes2MoisDernierProspect()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01').'-2 month'))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00').'-1 month'))
            ->andWhere('c.etatDossier = :value')
            ->setParameter('value', 'Prospect')
            ;
            return $qb->getQuery()->getResult();
    }

    public function ClientsCreeLes3MoisDernierProspect()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01').'-3 month'))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00').'-2 month'))
            ->andWhere('c.etatDossier = :value')
            ->setParameter('value', 'Prospect')
            ;
            return $qb->getQuery()->getResult();
    }

    public function ClientsCreeLeMoisDernieArelancer()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01').'-1 month'))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00')))
            ->andWhere('c.etatDossier = :value')
            ->setParameter('value', 'Prospect')
            ->andWhere('c.action = :action')
            ->setParameter('action', 'Relance')
            ;
            return $qb->getQuery()->getResult();
    }

    public function ClientsCreeMoisDernierRdv()
    {
        $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01').'-1 month'))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00')))
            ->andWhere('c.etatDossier = :value')
            ->setParameter('value', 'Prospect')
            ->andWhere('c.action = :action')
            ->setParameter('action', 'Retour')
            ;
            return $qb->getQuery()->getResult();

    }

    public function ClientsPortefeuilleVenduMoisDernier()
    {
         $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation < :debut')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-00').'-1 month'))
            ->andWhere('c.etatDossier = :value')
            ->setParameter('value', 'Vendu')
            ->andWhere('c.dateProchaineAction BETWEEN :depart AND :arrive')
            ->setParameter('depart', new \dateTime(date(date('Y-m').'-01').'-1 month'))
            ->setParameter('arrive', new \dateTime(date(date('Y-m').'-00')))
            ;
            return $qb->getQuery()->getResult();
    }

    public function ClientsPortefeuillePerduMoisDernier()
    {
         $qb = $this->createQueryBuilder('c')
            ->where('c.dateCreation < :debut')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-00').'-1 month'))
            ->andWhere('c.etatDossier = :value')
            ->setParameter('value', 'Perdu')
            ->andWhere('c.dateProchaineAction BETWEEN :depart AND :arrive')
            ->setParameter('depart', new \dateTime(date(date('Y-m').'-01').'-1 month'))
            ->setParameter('arrive', new \dateTime(date(date('Y-m').'-00')))
            ;
            return $qb->getQuery()->getResult();
    }


    public function MoisEnCours($qb)
    {
    
        $qb->andWhere('c.dateProchaineAction BETWEEN :debut AND :fin')
            ->setParameter('debut', new \dateTime(date(date('Y-m').'-01')))
            ->setParameter('fin', new \dateTime(date(date('Y-m').'-00').'+1 month'))
            ;
    }

/* récupération des données avant ou après le mois en cours */

    /* mois prochain */
    public function clientsProspectDuMoisProchain()
    {
        $qb = $this->createQueryBuilder('c')
        ->where('c.etatDossier = :etat')
        ->setParameter('etat', 'Prospect')
        ->andWhere('c.dateProchaineAction BETWEEN :debut AND :fin')
        ->setParameter('debut', new \dateTime(date('Y-m').'-01 +1 month'))
        ->setParameter('fin', new \dateTime(date('Y-m').'-00 +2 month'))
        ->orderBy('c.dateProchaineAction', 'ASC')
        ;
        return $qb->getQuery()->getResult();
    }

    public function avantMoisEnCours($qb)
    {
        $qb->andWhere('c.dateProchaineAction < :date')
            ->setParameter('date', new \dateTime(date('Y-m').'-01'))
            ;
    }

    public function apresMoisEnCours($qb)
    {
        $qb->andWhere('c.dateProchaineAction > :date')
            ->setParameter('date', new \dateTime(date('Y-m').'-00 +1 month'))
            ;
    }

    public function clientsAvantMoisEnCours()
    {
        $qb = $this->createQueryBuilder('c');
        $this->avantMoisEnCours($qb);
        return $qb->getQuery()->getResult();
    }

    public function clientsApresMoisEnCours()
    {
        $qb = $this->createQueryBuilder('c');
        $this->apresMoisEnCours($qb);
        return $qb->getQuery()->getResult();
    }

}
