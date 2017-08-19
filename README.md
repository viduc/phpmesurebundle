# phpmesure-bundle

Bundle symfony pour intégrer la librairie phpmesure dans un projet symfony

## Pour démarrer



### Prérequis

Pour fonctionner ce bundle a besoin de ces prérequis:

```
"php": ">=5.5.9",
"symfony/framework-bundle": "~2.7|~3.0|~4.0",
"viduc/phpmesure": "dev-master"
```

### Installation

Pour installer ce bundle, éditer le fichier composer.json de votre application et ajouter ces deux lignes:

```
"require": {
    ...
    "viduc/phpmesure": "dev-master",
    "viduc/phpmesure-bundle": "dev-master"
}
```

Puis faire une mise à jour de composer

```
composer update
```

Activer ensuite le bundle dans le fichier AppKernel

```
$bundles = [
    ...
    viduc\phpmesureBundle\viducphpmesureBundle(),
    ];
```
### Configuration

Il est nécessaire d'ajouter des paramètres de configuration pour l'application.
Editer le fichier config.yml et ajouter cette configuration:

```
viducphpmesure:
    nomApplication: "nomdemonapplication"
    serveurNom: "ip ou nom de mon serveur phpmesure"
    serveurPort: "port de mon serveur phpmesure"
```

## Exécuter les tests

Explain how to run the automated tests for this system

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Built With

* [Symfony](https://symfony.com/) - Le framework utilisé

## Autheurs

* **Tristan Fleury** - *Créateur* - [Viduc](https://github.com/Viduc)

## License

Ce projet est sous licence GPL 3.0. Le fichier de license se trouve à la racine du projet