<?php
function Convert(&$equipe) {
        switch ($equipe) {
            case 1:
                $equipe = 'AC Ajaccio';
                break;
            case 2:
                $equipe = 'Auxerre';
                break;
            case 3:
                $equipe = 'Angers';
                break;
            case 4:
                $equipe = 'Monaco';
                break;
            case 5:
                $equipe = 'Clermont';
                break;
            case 6:
                $equipe = 'Troyes';
                break;
            case 7:
                $equipe = 'Lorient';
                break;
            case 8:
                $equipe = 'Nantes';
                break;
            case 9:
                $equipe = 'Lille';
                break;
            case 10:
                $equipe = 'Montpellier';
                break;
            case 11:
                $equipe = 'Nice';
                break;
            case 12:
                $equipe = 'Marseille';
                break;
            case 13:
                $equipe = 'Lyon';
                break;
            case 14:
                $equipe = 'Paris-SG';
                break;
            case 15:
                $equipe = 'Lens';
                break;
            case 16:
                $equipe = 'Strasbourg';
                break;
            case 17:
                $equipe = 'Brest';
                break;
            case 18:
                $equipe = 'Rennes';
                break;
            case 19:
                $equipe = 'Reims';
                break;
            case 20:
                $equipe = 'Toulouse';
                break;    
            default:
                $equipe = $equipe;
                break;
            }
            return $equipe;
        }
?>