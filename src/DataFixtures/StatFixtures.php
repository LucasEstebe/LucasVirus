<?php

namespace App\DataFixtures;

use App\Entity\Country;
use App\Entity\Stat;
use App\Repository\CountryRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StatFixtures extends Fixture
{
    private $countryRepository;
    private $startDate = "2019-11-15";
    private $endDate;

    public function __construct(CountryRepository $countryRepository)
    {
        /*$this->countryRepository = $countryRepository;
        $this->startDate = new \DateTime("2019-11-15");
        $this->endDate = new \DateTime();*/
    }

    public function load(ObjectManager $manager)
    {
       /* for ($i = 0; $i < 600; $i++){
            $stat = new Stat();
            $stat->setCountry($this->countryRepository->find(Country::class, rand(1,5)));
            $stat->setHealed(rand(0,100000));
            $stat->setContaminated(rand(0,100000));
            $stat->setZombified(rand(0,100000));
            $stat->setStatDate($this->randomDate());
            $manager->persist($stat);
        }
        $manager->flush();*/
    }
    /*public function getDependencies()
    {
        return array(
            CountryFixtures::class,
        );
    }
    function randomDate()
    {
        // Convert to timetamps
        $min = strtotime($this->startDate->format("Y-m-d"));
        $max = strtotime($this->endDate->format("Y-m-d"));

        // Generate random number using above bounds
        $val = rand($min, $max);

        // Convert back to desired date format
        try {
            return new \DateTime('Y-m-d H:i:s' , $val);
        } catch (\Exception $e) {
            return new \DateTime();
        }
    }*/

}
