# Symfony UX Moneyspacer

Package Symfony UX qui permet d'ajouter des espaces comme séparateur de milliers à la saisie.

## Rendu final

![Rendu final du champs texte](./doc/images/Capture_rendu.png)

## Installation

```
composer require symfony/ux-moneyspacer:dev-main
```

## Utilisation

Dans un classe de formulaire :

```
class AvenantType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('montantTotalRAP', TextType::class, [
                'label' => false,
                'required' => false,
                'spacer' => true
            ])
    }
```

Vous devez donc juste ajouter l'attribut "spacer"=>true à votre champs.
