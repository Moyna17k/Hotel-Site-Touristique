<?php

namespace App\Controller\Admin;

use App\Entity\Activite;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ActiviteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Activite::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('title'),
            TextField::new('slug'),
            TextField::new('description'),
            UrlField::new('url'),
            BooleanField::new('active'),
            
            // Download image avec Vich Uploader

            TextField::new('imageFile')
                ->setFormType(VichImageType::class)
                ->setLabel('Image')
                ->setRequired(false)->hideOnIndex(),
        ];
    }
}
