Démarrer avec MondialRelay
==========================


Prérequis
---------
Cette version du bundle nécessite Symfony 4.3+

Installation
------------

Installation is a quick (I promise!) 3 step process:

1. Télécharger MondialRelay en utilisant composer
2. Activer le bundle
3. Configurez MondialRelay

Étape 1: Télécharger MondialRelay en utilisant composer
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Require the bundle with composer:

.. code-block:: bash

    $ composer require codingbyjerez/mondial-relay

Composer installera le paquet dans le répertoire ``vendor/codingbyjerez/mondial-relay`` de votre projet.
Si vous rencontrez des erreurs d'installation liées à un manque de paramètres de configuration vous devez d'abord effectuer la configuration à l'étape 3,
puis réexécuter cette étape.

Step 2: Activer le bundle
~~~~~~~~~~~~~~~~~~~~~~~~~

Enable the bundle in the kernel:

.. code-block:: php

    <?php
    // config/Bundles.php

    return [
        // ...
        CodingByJerez\MondialRelayBundle\MondialRelayBundle::class => ['all' => true],
        // ...
    ];



Step 3: Configurez MondialRelay
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


Ajoutez la configuration suivante à votre fichier ``config/packages/mondial_relay.yaml``
si le fichier n'existe pas créé est le.


.. code-block:: yaml

    # config/packages/mondial_relay.yaml
    mondial_relay:
        api_identifiants:
            customer_code: ~ #Obligatoire
            brand_id: ~ #Obligatoire
            secret_key: ~ #Obligatoire
            user: ~ #Obligatoire
            password: ~ #Obligatoire
        adresse_commerce:
            identite:             ~ #Obligatoire
            identite_complement:  ~
            adresse:              ~ #Obligatoire
            adresse_complement:   ~
            code_postal:          ~ #Obligatoire
            ville:                ~ #Obligatoire
            pays_code:            ~ #Obligatoire
            tel:                  ~ #Obligatoire
            tel2:                 ~
            courriel:             ~
            language:             ~ #Obligatoire


Exemples d'utilisation:
-----------------------


Recherche un point relais:
~~~~~~~~~~~~~~~~~~~~~~~~~~

a) Recherche un point relais par adresse
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    <?php
    // App\Controller\ExempleController.php

    // use CodingByJerez\MondialRelayBundle\Services\RecherchePointRelais;


    public function rechercheAction(RecherchePointRelais $recherche)
    {
        try{

            // Obligatoire
            $recherche->rechercheByAdresse("FR", "60000");

            // OPTION
            $recherche
                ->setOptionRayonRecherche() #^[0-9]{1,4}$ (en KM)
                ->setOptionDelaiEnvoi() #^-?[0-9]{2})$
                ->setOptionAction() #^(REL|24R|24L|24X|DRI)$
                ->setOptionPoids(100) #^[0-9]{1,6}$ (en grammes)
                ->setOptionTaille("L") #^(XS|S|M|L|XL|XXL|3XL)$

            // Obligatoire
            $result = $recherche->rechercheByAdresse("FR", "60000")->getPoinRelais();

        }catch (RecherchePointRelaisException $e){
            echo $e->getMessage();
            foreach ($e->getErrorValidator() as $valueText)
                echo $valueText;
        }


    }

b) Recherche un point relais par coordonnées géographique
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    <?php
    // App\Controller\ExempleController.php

    // use CodingByJerez\MondialRelayBundle\Services\RecherchePointRelais;


    public function rechercheAction(RecherchePointRelais $recherche)
    {
        try{

            $result = $recherche->rechercheByLatLong(48.8534, 2.3488)->getPoinRelais();

        }catch (RecherchePointRelaisException $e){
            echo $e->getMessage();
            foreach ($e->getErrorValidator() as $valueText)
                echo $valueText;
        }


    }


c) Recherche un point relais par adresse
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    <?php
    // App\Controller\ExempleController.php

    // use CodingByJerez\MondialRelayBundle\Services\RecherchePointRelais;


    public function rechercheAction(RecherchePointRelais $recherche)
    {
        try{

            $result = $recherche
            ->rechercheById("FR", 2678)

            ->getPoinRelais();

        }catch (RecherchePointRelaisException $e){
            echo $e->getMessage();
            foreach ($e->getErrorValidator() as $valueText)
                echo $valueText;
        }


    }

.. Option::




Creation une etiquette:
~~~~~~~~~~~~~~~~~~~~~~~


Creation d'une Expedition:
~~~~~~~~~~~~~~~~~~~~~~~~~~

prochainement

Creation d'une URL de tracing:
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

prochainement
