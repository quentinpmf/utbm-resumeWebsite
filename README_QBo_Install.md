# QBo : Préparation/Installation VM

<h4>Téléchargement de débian 9</h4>
C:\Users\quent\Downloads\debian-9.5.0-amd64-xfce-CD-1.iso

<h4>Création de la VM sous Virtual Box</h4>
* Debian 64 bits 
* Mémoire : 4096 Mo 
* CPU : 2
* Accès par pont (Autoriser toutes les connexions)

<h4>Installation des additions invités VirtualBox</h4>
`su -` <br>
`echo deb http://ftp.debian.org/debian stretch-backports main contrib > /etc/apt/sources.list.d/stretch-backports.list` <br>
`apt update` <br>
`apt install virtualbox-guest-dkms virtualbox-guest-x11 linux-headers-$(uname -r)` <br>
<br>
Si problème avec l'install et s'il demande un deb cdrom : 
`nano /etc/apt/sources.list et supprimer les lignes qui contiennent "deb cdrom"`
> source : http://www.codebind.com/linux-tutorials/install-virtualbox-guest-additions-debian-9-virtual-machine-vm

Redemarrer avec :
`shutdown -r now`
 
<h4>Installation des dépendances pour le dépot externe</h4>
`sudo apt -y update` <br>
`sudo apt install apt-transport-https lsb-release ca-certificates wget git` <br> 
`sudo wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg`<br>
`sudo sh -c 'echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'` <br>
`sudo apt update` <br>

<h4>Installation de PHP7.1 et de l'extension php-xml</h4>
`sudo apt install php7.1-common php7.1-cli php7.1-zip php7.1-xml`<br>
Vérification avec : `php -v`<br>

<h4>Installation du serveur web</h4>
`apt install apache2`

<h4>Installation mysql et de phpmyadmin</h4>
`apt install mariadb-server` <br>
On empêche de se connecter avec le login root (sécurité) : `mysql_secure_installation`
`apt install phpmyadmin` <br>
Vérification avec : http://localhost/phpmyadmin

<h4>Installation de l'outil htop pour superviser le serveur en temps réel</h4>
`apt-get install htop`

<h4>Création du dossier partagé entre Windows et Linux pour les sources</h4>
- Création du dossier dans windows (il contiendra les sources du projet), ex : H:\VM\workspace
- Ajout du dossier partagé dans VirtualBox pointant vers le dossier windows crée. 
  - Montage automatique et  configuration permanente
  - Redémarrer la VM si elle était démarrée.
- Dans le cmd debian, se placer dans le dossier de reception. 
  - Ici : /var/www/html car on veut que nos sources windows soient copiées directement dans le répertoire du serveur web.
  - `sudo mount -t vboxsf "nom_partage_virtualbox" /var/www/html`
  - vérification avec `cd /var/www/html et ls -l`
  
<h4>Installation de Composer</h4>
`php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"`<br>
`php composer-setup.php`<br>
`php -r "unlink('composer-setup.php');"`<br>
Pour avoir la commande Composer dans le terminal, on va déplacer le fichier composer.phar dans le dossier /usr/local/bin/ :
`sudo mv composer.phar /usr/local/bin/composer`<br>
Vérification avec : `composer -v`<br>

<h4>Installation de Symfony4</h4>
Création du projet symfony dans /var/www/html : `composer create-project symfony/skeleton /var/www/html` <br>
(Si jamais la commande ci-dessus ne marche pas, passer en version php-xml7.2 avec : `apt-get install php7.2-xml`) <br>
De cette manière, l'architecture sera crée directement dans /var/www/html et partagée sur Windows via le partage de dossier Virtualbox. 

dans le dossier my-cv-project, on lance le serveur web avec : <br>
`composer require server --dev` <br>
puis on accède a l'application via : 127.0.0.1:8000

<h4>Création du repository github</h4>
https://github.com/quentinpmf/siteWebCreationCV vide pour l'instant

<h4>Récupération des sources projets depuis Windows (via le dossier partagé)</h4>
L'architecture du projet à été créée dans le paragraphe ci-dessus <br>
On récupère donc les fichiers dans le dossier H:\VM\workspace puis on les upload sur la branche master du git créé ci-dessus <br>

<h4>Récupération du projet dans  PHPStorm</h4>
- Onglet VCS > Checkout From Version Control > Github <br>
- Repository URL : https://github.com/quentinpmf/siteWebCreationCV.git
- Directory name : n'importe quel dossier sur l'ordinateur (source Actimage)

<h4>Configuration envoi de PHPStorm vers VM</h4>
- Onglet Tools > Deployment > Configuration
- Add new configuration : 
  - Name : VM
  - Type : local or mounted folder
  - Folder : H:\VM\workspace (notre dossier partagé créé entre Windows et Debian)
  - Onglet Mappings : C:\wamp64\www\siteWebCreationCV > / > / 

<h4>Automatisation de l'envoi de PHPStorm vers VM lors d'une modification du code</h4>
Afin de lancer la synchronisation automatiquement, dès qu’un fichier est ajouté/modifié : <br>
- Onglet Tools > Deployment > Options
- Choisir « Always » dans le champ « Upload changed files automatically to the default server »
Maintenant lors de n'importe quelle modification dans le code PHPStorm sur Windows, le projet sera mis à jour dans le dossier partagé sur Windows et donc sur la VM Debian.
