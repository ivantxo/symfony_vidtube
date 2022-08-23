<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
		$this->loadMainCategories($manager);
    }

	private function loadMainCategories(ObjectManager $manager)
	{
		foreach ($this->getMainCategoriesData() as $name)
		{
			$category = new Category();
			$category->setName('name');
			$manager->persist($category);
		}
	}

	private function getMainCategoriesData(): array
	{
		return [
			['Electronics', 1],
			['Toys', 2],
			['Books', 3],
			['Movies', 4],
		];
	}
}
