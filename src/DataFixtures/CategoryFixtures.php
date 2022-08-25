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
		$this->loadSubCategories($manager, 'Electronics', 1);
    }

	private function loadMainCategories(ObjectManager $manager)
	{
		foreach ($this->getMainCategoriesData() as [$name])
		{
			$category = new Category();
			$category->setName($name);
			$manager->persist($category);
		}
		$manager->flush();
	}

	private function loadSubCategories(ObjectManager $manager, $category, $parentId)
	{
		$parent = $manager->getRepository(Category::class)->find($parentId);
		$methodName = "get{$category}Data";
		foreach ($this->$methodName() as [$name])
		{
			$category = new Category();
			$category->setName($name);
			$category->setParent($parent);
			$manager->persist($category);
		}
		$manager->flush();
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

	private function getElectronicsData(): array
	{
		return [
			['Cameras', 5],
			['Computers', 6],
			['Cell Phones', 7],
		];
	}
}
