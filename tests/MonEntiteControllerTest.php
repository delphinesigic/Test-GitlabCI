<?php

namespace App\Controller;

use App\Entity\MonEntite;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DogControllerTest extends WebTestCase
{
    //-----------------------------------------------------------------------------------------------------------------
    //Entity tests: we test that the functions of the dog entity work properly
    public function testNom()
    {
        $monentite = new MonEntite();
        $prenom = 'Delphine';
        $monentite->setPrenom($prenom);
        $this->assertEquals('Delphine', $monentite->getPrenom());
    }
}
