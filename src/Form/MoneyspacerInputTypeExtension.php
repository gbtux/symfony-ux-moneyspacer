<?php

namespace Symfony\UX\Moneyspacer\Form;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MoneyspacerInputTypeExtension extends AbstractTypeExtension
{

    public static function getExtendedTypes(): iterable
    {
        return [
            TextType::class,
        ];
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'spacer' => false,
            'spacer_unsigned' => false,
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new MoneyDataTransformer());
    }

    public function finishView(FormView $view, FormInterface $form, array $options): void
    {
        if (!$options['spacer'] && !$options['spacer_unsigned']) {
            $view->vars['uses_spacer'] = false;

            return;
        }

        $attr = $view->vars['attr'] ?? [];

        $controllerName = 'symfony--ux-moneyspacer--spacer';
        $attr['data-controller'] = trim(($attr['data-controller'] ?? '').' '.$controllerName);
        $attr['data-signed'] = $options['spacer_unsigned'] ? "unsigned" : "signed";
        $attr['data-symfony--ux-moneyspacer--spacer-target'] = 'input';
        $view->vars['uses_spacer'] = true;
        $view->vars['attr'] = $attr;
    }
}