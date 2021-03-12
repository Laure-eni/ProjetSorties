<?php


namespace App\Data;


use App\Entity\Campus;
use App\Entity\Categorie;
use App\Entity\Participant;

class SearchData
{
    /**
     * @var string
     */
    public $query = '';

    /**
     * @var Categorie[]
     */
    public $categories = [];

    /**
     * @var Campus[]
     */
    public $campus = [];

    /**
     * @var boolean
     */
    public $orga = false;

    /**
     * @var boolean
     */
    public $inscrit = false;

    /**
     * @var boolean
     */
    public $terminee = false;


}