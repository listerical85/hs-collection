<?php

namespace Listerical\PackBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HSCardType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cardId')
            ->add('name')
            ->add('cardSet')
            ->add('type')
            ->add('faction')
            ->add('rarity')
            ->add('cost')
            ->add('attack')
            ->add('health')
            ->add('text')
            ->add('flavor')
            ->add('artist')
            ->add('collectible')
            ->add('elite')
            ->add('img')
            ->add('imgGold')
            ->add('locale')
            ->add('mechanics')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Listerical\PackBundle\Entity\HSCard'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'listerical_packbundle_hscard';
    }
}
