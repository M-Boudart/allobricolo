# Guide d'installation du projet
## Prérequis nécessaire au bon fonctionnement du site
Vous devrez disposer d'un compte [Stripe](https://stripe.com/en-be?utm_campaign=paid_brand-BE_fr_Search_Brand_Stripe-1045154821&utm_medium=cpc&utm_source=google&ad_content=301638103399&utm_term=kwd-295607662702&utm_matchtype=e&utm_adposition=&utm_device=c).

Ensuite, si vous souhaitez tester le système de mail, je vous conseille de créer un compte [MailTrap](https://mailtrap.io/).

## Marche à suivre
- Cloner le code du projet à l'aide de la commande `git clone`.
- Renommer le fichier `.env.example` en `.env`.
- Ajouter vos clefs Stripe et Mailtrap au fichier .env.
- Exécuter la commande `php artisan migrate` afin de récupérer la base de données.

<<<<<<< HEAD
Si vous ne possédez pas de certificat SSL vous pouvez en télécharger un. Si vous ne le faite pas, la messagerie ne sera pas dynamique, c'est à dire que vous devrez rafraichir la page après chaque envoie de message. Si vous souhaitez qu'elle soit dynamique suivez les étaps si dessous :
=======
Si vous ne possédez pas de certificat SSL vous devez en télécharger un. Néanmoins, il est possible de ne pas réaliser cette étape mais la messagerie ne sera pas dynamique. Il vous faudra donc rafraichir la page à chaque envoie de message.
>>>>>>> badbdd4bbae675437630c27532e7e57b256342e9
- Télécharger un [certifical SSL](https://curl.se/docs/caextract.html).
- Configurer le fichier `php.ini`. Décommenter la ligne `curl.cainfo` et renseigner comme valeur le chemin vers certificat.

Si vous souhaitez disposer de données de test, exécutez les seeder avec `php artisan db:seed`. Le mot de passe des utilisateurs test sera donc `12345678`.