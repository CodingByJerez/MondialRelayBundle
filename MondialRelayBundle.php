<?php
/**
 * Created by PhpStorm.
 * User: CodingByJerez
 * Url: http://coding.by.jerez.me
 * Github: https://github.com/CodingByJerez
 * Date: 17/10/2019
 * Time: 17:44
 */

namespace CodingByJerez\MondialRelayBundle;


use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\HttpKernel\Exception\HttpException;

class MondialRelayBundle extends Bundle
{

    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        if (!extension_loaded('soap'))
            throw new HttpException(400, "Vous devez instaler l'extantion soap sur votre serveur");


        //$container->addCompilerPass(new MondialRelayCompilerPass());
        //echo $container->getParameter('acme_blog.auteur.email');
        // $container->addCompilerPass(new ValidationPass());
        // $container->addCompilerPass(new InjectUserCheckerPass());
        // $container->addCompilerPass(new InjectRememberMeServicesPass());
        // $container->addCompilerPass(new CheckForSessionPass());
        // $container->addCompilerPass(new CheckForMailerPass());

        // $this->addRegisterMappingsPass($container);
    }


}