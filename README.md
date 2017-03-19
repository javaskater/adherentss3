adherentsS3
===========

# Project for the [Randonneurs Ile De France](http://rifrando.asso.fr/) adherents

* The target of the project is to convert the actual [adherents' web site](http://adh.rifrando.asso.fr/users/login) to the latest technologies
  * [Symfony 3.x](https://symfony.com/download) for the PHP backend
  * [React JS](https://facebook.github.io/react/) for some front end Javascript components
    * [JQuery](http://jquery.com/) to help for the Dom manipulation the Ajax requests and the most common visual effects
  * [Twitter Bootstrap](http://getbootstrap.com/) to support responsive design from the ground up !

# From local devel to production environment

## launching the script:

* __adherentss3/scripts/gitarchive.sh__ is the script meant for that
  * it download the source code from the _master_ branch of my [BitBucket Project](https://bitbucket.org/javaskater/adherentss3)
  * it runs the __composer.json__ file at the root of the project
    * to add the symfony's dependent libraries in the vendor directory
    * to run the _post-install-command_ configuration's scripts
      * the script that interests us is __"Sensio\\Bundle\\DistributionBundle\\Composer\\ScriptHandler::prepareDeploymentTarget"__ (see underneath)
``` javascript
"scripts": {
        "symfony-scripts": [
            "Incenteev\\ParameterHandler\\ScriptHandler::buildParameters",
            "Sensio\\Bundle\\DistributionBundle\\Composer\\ScriptHandler::buildBootstrap",
            "Sensio\\Bundle\\DistributionBundle\\Composer\\ScriptHandler::clearCache",
            "Sensio\\Bundle\\DistributionBundle\\Composer\\ScriptHandler::installAssets",
            "Sensio\\Bundle\\DistributionBundle\\Composer\\ScriptHandler::installRequirementsFile",
            "Sensio\\Bundle\\DistributionBundle\\Composer\\ScriptHandler::prepareDeploymentTarget"
        ],
        "post-install-cmd": [
            "@symfony-scripts"
        ],
        "post-update-cmd": [
            "@symfony-scripts"
        ]
    },
```

* it will ask for the mysql database to connect symfony to.
  * That is where will we give the mysql ovh coordinates:
    * _(Here I enter my local coordinate for the demo -rif- each time)_

``` bash
jpmena@jpmena-P34 ~/RIF/adherentss3/scripts (master *) $ ./gitarchive.sh
....................................
Generating autoload files
> Incenteev\ParameterHandler\ScriptHandler::buildParameters
Creating the "app/config/parameters.yml" file
Some parameters are missing. Please provide them.
database_host (127.0.0.1):
database_port (null):
database_name (symfony): rif
database_user (root): rif
database_password (null): rif
mailer_transport (smtp):
mailer_host (127.0.0.1):
mailer_user (null):
mailer_password (null):
secret (ThisTokenIsNotSoSecretChangeIt):
.....................................
```

## porting it to the french [shared web-hosting OVH](https://www.ovh.com/fr/hebergement-web/hebergement-pro.xml):

* first add a _.ovhconfig_ file at the root of your project (following that [OVH's Help Link](https://docs.ovh.com/fr/fr/web/hosting/configurer-le-php-sur-son-hebergement-web-mutu-2014/)):
  * I want my Symfony3 website to be run in __PHP 7.0__ (the non cgi version!!!!)

``` bash
rifrando:~$ cd dev/jpmena/adherentss3/web/
rifrando:~/dev/jpmena/adherentss3/web$ cat .ovhconfig
app.engine=php
app.engine.version=7.0
http.firewall=none
environment=production
```
* I added the following php file at the root of my project:
  * so that I can confirm my _php/apache configuration_ through the http://example.com/info.php url!!!!

``` bash
rifrando:~/dev/jpmena/adherentss3/web$ cat info.php
<?php phpinfo() ?>
```

# nettoyer les caches

* I embedded a script that calls the _cache:clear_ symfony's console commands
  * in dev and prod modes
  * it sets before and after the corresponding user/groups
    * before because I am the user calling the script and then writing the cache files and directories
    * after because it is Apache who then be writing the cache files and directories

``` bash
jpmena@jpmena-P34 ~/RIF/adherentss3/scripts/dev (master *) $ ./clearCache.sh 
changing the proprietary/group of ../../var/cache
cleaning the symfony cache for dev mode

 // Clearing the cache for the dev environment with debug true                                                          

                                                                                                                        
 [OK] Cache for the "dev" environment (debug=true) was successfully cleared.                                            
                                                                                                                        

cleaning the symfony cache for prod mode

 // Clearing the cache for the prod environment with debug false                                                        

                                                                                                                        
 [OK] Cache for the "prod" environment (debug=false) was successfully cleared.                                          
                                                                                                                        

changing the proprietary/group of ../../var/cache
```

* note that cleaning the only _prod version of the cache_ would impair the apparition of the Debug Bar if  _app_dev.php_ were used in the address
  * it would throw an exception in the logs to be found in: _adherentss3/var/logs_ ...

# Work in Progress

* See the [TODO List](docs/TODO.md)
