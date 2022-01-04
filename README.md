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
SettingsPage contient un paramètre permettant d'ajouter des événements à une date unique, plutôt qu'une date de début et une date de fin.

Cela n'affecte pas les événements existants. Vous pouvez toujours revenir au format précédent à nouveau.

Mais lors de la redémarrage d'un événement existant qui a des dates différentes, la date de début sera remplacée par la date de fin.

##  Featured image
WordPress creates duplicate images in different sizes upon upload. These sizes can be set via Settings > Media.

By default the "post-thumbnail" size of your theme is being used as source for the featured image. This size may vary by theme.

And the maximum width of the featured image is by default 40% of the event info section.

You can change the featured image size and maximum width via Settings > VSEL. Use both settings together, in order to get the size you want.

The featured image on the single event page is handled by your theme.

## Advanced Custom Fields
You can add extra fields to the meta section by using the [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields) plugin. The most commonly used fields are supported.

Create a field group for post type "event" and add fields to this group. This field group will be added to the single event page in dashboard.

The extra fields are displayed in the frontend of your website underneath the location field.

##  Native support
Plugin has basic support for theme template files that are being used for the single event page, the event category page, the post type (event) archive page and the search results page.

Support for the single event page is needed, but support for the other 3 pages is added to make VSEL compatible with page builder plugins. These 3 pages are not generated by VSEL. Events are not ordered by event date.

More info about the single event page is listed underneath.

Plugin activates the post attributes box in the editor. In the post attributes box you can set a custom order for events with the same date.

Plugin makes it possible to add events and event categories to your menu via the menu page. This support is added to make VSEL compatible with page builder plugins.

##  Single event
In most cases PHP file "single" is being used for the single event page. This file is located in your theme folder.

Because a theme file is being used, it might not be displayed properly.

If you want to customize it and you cannot succeed with custom CSS alone, create a duplicate of file "single" and rename it "single-event", add this file to your (child) theme folder and customize it to your needs.

##  Uninstall
If you uninstall plugin via dashboard all events and settings will be removed from database.

All posts of the (custom) post type "event" will be removed.

You can avoid this via Settings > VSEL.


##  Installation
Please check Description section for installation info.


## Frequently Asked Questions
= How can I change date format? =
By default plugin uses date format set in Settings > General.

The datepicker and date input field only support 2 numeric date formats: "day-month-year" (30-01-2016) and "year-month-day" (2016-01-30).

If date format from Settings > General does not match, it will be changed into 1 of the 2 above.

You can change date format for the frontend of your website via Settings > VSEL or by using an attribute.

The date icon only supports 2 date formats: "day-month-year" (30 Jan 2016) and "year-month-day" (2016 Jan 30).

If date format does not match, it will be changed into 1 of the 2 above.

= How do I set plugin language? =
Plugin will use the website language, set in Settings > General.

If plugin isn't translated into this language, language fallback will be English.

= What's the difference between upcoming and future events? =
Only difference between the both is that upcoming events are including today and future events are starting tomorrow or later.

= What do you mean with current events? =
Current events are events you can visit today. So this can be an one-day or multi-day event.

= Are events also listed on time? =
No, this is not possible because input field for time is a regular text input.

In the post attributes box you can set a custom order for events with the same date.

= Can I change the colors of the date icon? =
This is not possible via Settings > VSEL. You should use custom CSS for that.

Change background and text color of whole icon: `.vsel-start-icon, .vsel-end-icon {background:#eee; color:#f26535;}`

Change background and text color of top part: `.vsel-day-top, .vsel-month-top {background:#f26535; color:#eee;}`

= Can I override plugin template via my (child) theme? =
No, this is not possible. But you can override the single event page via your (child) theme. For more info check the "Single event" section.

= What does "Link to more info" mean? =
While adding an event you can add a link (an URL) to a post, page or website.

This can be useful in case additional info is available elsewhere.

You can also redirect the event title to this link.

= What does "Link to all events" mean? =
While adding a widget you can add a link (an URL) to a page with all events.

This can be useful because in most cases you only list a few events in a widget area.

= Why no pagination in widget? =
Pagination is not working properly in a widget.

But you can set a link to a page with all events.

= Why no pagination when using the offset attribute? =
Offset breaks pagination, so that's why pagination is being disabled when using offset.

= Why does the offset attribute have no effect? =
Offset is being ignored when attribute "posts_per_page" has value "-1" (show all events).

= Why is the page with all events not displayed properly? =
This applies to pages where you have added the shortcode.

When using the block editor, go to the page in your dashboard and check the shortcode in "Edit as HTML" mode.

When using the classic editor, go to the page in your dashboard and check the shortcode in "Text" mode.

It might be accidentally wrapped in HTML tags, such as: `<script>[vsel]</script>`

You should remove the HTML tags and resave the page.

= Can the URL of the page with all events end with "event"? =
No, this will cause a conflict with the post type (event) archive page.

You should change this so called "slug" into something else. This can be done by changing the permalink of your events page.

= Why a 404 (nothing found) when I click the title link? =
This is mostly caused by the permalink settings. Please resave the permalinks via Settings > Permalinks.

= Why a 404 (nothing found) when I click the event category link? =
This is mostly caused by the permalink settings. Please resave the permalinks via Settings > Permalinks.

= Can I add multiple shortcodes on the same page? =
This is possible but to avoid a conflict I recommend to disable the pagination. This can be done via Settings > VSEL or by using an attribute.

= Why an error notification instead of a date? =
An error notification is displayed in case of a missing date or when start date begins after end date. To solve this please reset date.

= Why no start date in dashboard? =
All events posted with plugin version 4.0 and older have one date only. To solve this please reset date.

= Why no event meta or event categories box in the editor? =
When using the block editor, click the options icon and select "Preferences".

When using the classic editor, click the "Screen Options" tab.

Probably the checkbox to display the relevant box in the editor is not checked.

= Why no featured image box in the editor? =
When using the block editor, click the options icon and select "Preferences".

When using the classic editor, click the "Screen Options" tab.

Probably the checkbox to display the relevant box in the editor is not checked.

But sometimes your theme does not support featured images. Or your theme does only support it for the native posts and pages.

In that case you must manually add this support for events. This can be done via file "functions" of your (child) theme.

= Why no Advanced Custom Fields field group in the editor? =
When using the block editor, click the options icon and select "Preferences".

When using the classic editor, click the "Screen Options" tab.

Probably the checkbox to display the relevant box in the editor is not checked.

= How does plugin hook into theme template files? =
Plugin only hooks into the native `the_content()` and `the_excerpt()` function. It has no control over anything outside this section.

In some cases there's a conflict with your theme or page builder plugin. That's why you can disable support for theme template files via Settings > VSEL.

= Does this plugin have its own events block? =
No, plugin doesn't have its own block in the editor and there are no plans to add this anytime soon.

= Does plugin support iCal? =
No, because to support the iCal structure there should be input fields for start time and end time.

= Why no Semantic versioning? =
At time of initial plugin release I wasn't aware of the Semantic versioning (sequence of three digits).

This means that version number doesn't give you info about the type of update (major, minor, patch). You should check changelog for that.

= How can I make a donation? =
You like my plugin and you're willing to make a donation? Nice! There's a PayPal donate link at my website.

= Other question or comment? =
Please open a topic in plugin forum.


##  Changelog
Pour consulter toutes les versions, veuillez regarder le fichier changelog du dépôt.
(log obsolète après la version 14 qui constitue le fork, pour la suite il suffit de consulter les commits).
