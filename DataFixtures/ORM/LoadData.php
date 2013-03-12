<?php

namespace Mmucha1\ExampleMenuBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Mmucha1\ExampleMenuBundle\Entity\Menu;
use Symfony\Component\Yaml\Yaml;
use Doctrine\Common\Persistence\ObjectManager;

class LoadData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $file =  __DIR__ . DIRECTORY_SEPARATOR . '..' .
                DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR .
                'data/miasta.yml';

        var_dump();die;
        //$file = ('@Mmucha1ExampleMenuBundle/data/miasta.yml');

        $yml = Yaml::parse($file);
        foreach ($yml as $r) {
            $m = new Menu();
            $m->setTitle($r['title']);
            $m->setContents($r['contents']);
            $manager->persist($m);
        }
        $manager->flush();

    }
}