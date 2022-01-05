# Flying bird
* Fork de Very Simple Event List
* Contributeurs·rices: Guido07111975, BeruNoir
* Version: 14.1
* Licence: GNU General Public License v3
* URL Licence: https://www.gnu.org/licenses/gpl-3.0.html
* Obligation PHP: 7.1
* Version minimum: 5.3
* Testé pour la version: 5.8
* Tags: simple, event, events, event list, event manager


## Description
Ce plugin Wordpress vous permet de générer des évènements dans la plus grande des simplicités. 
Il est issu d'une copie de Very Simple Event List, je l'ai adapté pour des raisons personnelles. 

Celui-ci est donc à présent entièrement traduit en français.
Vous pouvez personnaliser votre liste des événements par le biais de la page du paramétrage ou en ajoutant des attributs aux shortcodes ou widgets.

## Comment l'utiliser ?
Après installation, allez à l'élément de menu "Événements" et commencez à ajouter vos événements.

Créez une page puis :

* Ajoutez un shortcode `[vsel]` pour afficher les événements à venir (y compris aujourd'hui)
* Ajoutez un shortcode `[vsel-future-events]` pour afficher les événements futurs (sans aujourd'hui)
* Ajoutez un shortcode `[vsel-current-events]` pour afficher les événements actuels
* Ajoutez un shortcode `[vsel-past-events]` pour afficher les événements passés
* Ajoutez un shortcode `[vsel-all-events]` pour afficher tous les événements

Ou allez dans Apparence > Widgets et utilisez le widget pour afficher vos événements.

## Page de paramétrage
Vous pouvez personnaliser votre liste d'événements via la page du paramétrage. Cette page est accessible via Paramètres > Flying Bird.

Plusieurs paramètres peuvent être remplacés lors de l'utilisation des attributs (shortcode) ci-dessous.

Cela peut être utile lorsque vous avez plusieurs listes d'événements sur votre site Wordpress.

##  Attributs pour vos shortcodes
Vous pouvez également personnaliser votre liste d'événements en ajoutant des attributs aux 5 shortcodes mentionnés ci-dessus.

* Modifier le nombre d'événements par page : `posts_per_page="5"`
* Passer sur un ou plusieurs événements : `offset="1"`
* Changer le format de la date : `date_format="j F Y"`
* Afficher les événements d'une certaine catégorie : `event_cat="your-category-slug"`
* Afficher les événements de plusieurs catégories : `event_cat="your-category-slug-1, your-category-slug-2"`
* Modifier l'ordre de la liste des événements à venir et en cours : `order="desc"`
* Modifier l'ordre du passé et de la liste de tous les événements : `order="asc"`
* Changer le texte s'il n'y a pas d'événements : `no_events_text="votre texte ici"`
* Changer la classe CSS de la liste des événements : `class="your-class-here"`
* Désactiver le lien sur le titre de l'événement : `title_link="false"`
* Désactiver l'image mise en avant : `featured_image="false"`
* Désactiver la pagination : `pagination="false"`

Exemples :

* Un attribut : `[vsel posts_per_page="5"]`
* Un attribut : `[vsel-past-events event_cat="your-category-slug"]`
* Plusieurs attributs : `[vsel posts_per_page="5" event_cat="your-category-slug" class="your-class-here"]`

##  Attributs pour widget
Les widgets vont prendre en charge les mêmes attributs.

Exemples :

* Un attribut : `posts_per_page="5"`
* Plusieurs attributs : `posts_per_page="5" event_cat="your-category-slug" class="your-class-here"`

##  Date des évènements
La page des paramètres contient une option permettant d'ajouter des événements à une date unique, plutôt qu'une date de début et une date de fin.

Cela n'affecte pas les événements existants. Vous pouvez toujours revenir au format précédent à nouveau.

Mais lors de la redémarrage d'un événement existant qui a des dates différentes, la date de début sera remplacée par la date de fin.

##  Image de présentation
WordPress crée des images en double dans différentes tailles lors du téléchargement. Ces tailles peuvent être définies via Paramètres > Média.

Par défaut, la taille "post-thumbnail" de votre thème est utilisée comme source pour l'image sélectionnée. Cette taille peut varier selon le thème.

La largeur maximale de l'image de présentation est par défaut de 40 % de la section des informations sur l'événement.

Vous pouvez modifier la taille de l'image de présentation ainsi que la largeur maximale via Paramètres> Flying Bird. Utilisez les deux paramètres ensemble, afin d'obtenir la taille que vous souhaitez.

L'image présentée sur la page de l'événement unique est gérée par votre thème.

##  Advanced Custom Fields (plugin)
Vous pouvez ajouter des champs supplémentaires à la section méta en utilisant le plugin [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields). Les champs les plus couramment utilisés sont pris en charge.

Créez un groupe de champs pour le type de publication « événement » et ajoutez des champs à ce groupe. Ce groupe de champs sera ajouté à la page d'événement unique dans le tableau de bord.

Les champs supplémentaires sont affichés dans le frontend de votre site Web sous le champ de localisation.

##  Support natif
Le plugin prend en charge de base les fichiers de modèle de thème qui sont utilisés pour la page d'événement unique, la page de catégorie d'événement, la page d'archive de type de publication (événement) et la page de résultats de recherche.

La prise en charge de la page d'événement unique est nécessaire, mais la prise en charge des 3 autres pages est ajoutée pour rendre Flying Bird compatible avec les plugins de création de pages. Ces 3 pages ne sont pas générées par Flying Bird. Les événements ne sont pas classés par date d'événement.

Le reste des informations sur le fonctionnement de la page de l'événement unique sont répertoriées ci-dessous.

Le plugin active la boîte d'attributs de publication dans l'éditeur. Dans la zone des attributs de publication, vous pouvez définir un ordre personnalisé pour les événements avec la même date.

Le plugin permet d'ajouter des événements et des catégories d'événements à votre menu. Cette prise en charge est ajoutée pour rendre Flying Bird compatible avec les plugins de création de pages.

##  Évènement unique
Dans la plupart des cas, le fichier PHP "single" est utilisé pour la page d'événement unique. Ce fichier se trouve dans votre dossier de thème Wordpress.

Étant donné qu'un fichier de thème est utilisé, il peut ne pas s'afficher correctement.

Si vous souhaitez le personnaliser et que vous ne pouvez pas réussir avec le CSS personnalisé seul, créez un duplicata du fichier "single" et renommez-le "single-event", ajoutez ce fichier à votre dossier de thème (enfant) et personnalisez-le selon vos besoins.

##  Désinstaller
Si vous désinstallez le plugin via le tableau de bord, tous les événements et paramètres seront supprimés de la base de données.

Tous les messages « événement » seront supprimés.

Vous pouvez éviter cela via Paramètres > Flying Bird.

##  Installation
Il suffit de télécharger le contenu du dépôt puis de l'extraire dans le répertoire "plugins" de votre Wordpress (.../wp-content/plugis/)

##  Changelog
Pour consulter toutes les versions, veuillez regarder le fichier changelog.txt du dépôt.
(log obsolète après la version 14 qui constitue le fork, pour la suite il suffit de consulter les commits).
