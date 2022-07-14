<?php
namespace App\Service;


class  MontantCommande
{
    public function calculMontantCommande($data){
       
       $montantCommande = $prixZone = $data->getZone()->getPrix();

        $burgers = $data->getBurgerCommandes();
        $boissons = $data->getBoissonCommandes();
        $frites = $data->getFriteCommandes();
        $menus = $data->getMenuCommandes();

        foreach($burgers as $burger ){
            $burger->setPrix($burger->getBurger()->getPrix() * $burger->getQuantite());
            $montantCommande += $burger->getBurger()->getPrix() * $burger->getQuantite();
        }

        foreach($boissons as $boisson ){
            $boisson->setPrix($boisson->getBoissonTailleBoisson()->getTailleBoisson()->getPrix() * $boisson->getQuantite());
            $montantCommande += $boisson->getBoissonTailleBoisson()->getTailleBoisson()->getPrix() * $boisson->getQuantite();
        }

        foreach($frites as $frite ){
            $frite->setPrix($frite->getPortionFrite()->getPrix() * $frite->getQuantite());
            $montantCommande += $frite->getPortionFrite()->getPrix() * $frite->getQuantite();
        }
        foreach($menus as $menu ){
            $menu->setPrix($menu->getMenu()->getPrix() * $menu->getQuantite());
            $montantCommande += $menu->getMenu()->getPrix() * $menu->getQuantite();
        }
        return $montantCommande;
    }
}