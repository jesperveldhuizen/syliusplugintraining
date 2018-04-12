<?php

declare(strict_types=1);

namespace Acme\SyliusExamplePlugin\Form\Extension;

use Sylius\Bundle\AddressingBundle\Form\Type\AddressType;
use Sylius\Bundle\OrderBundle\Form\Type\CartType;
use Sylius\Bundle\PromotionBundle\Form\Type\PromotionCouponToCodeType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class CartTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('giftWrapped', CheckboxType::class);
    }

    public function getExtendedType(): string
    {
        return CartType::class;
    }
}
