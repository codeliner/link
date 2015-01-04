<?php
/*
 * This file is part of the Ginger Workflow Framework.
 * (c) Alexander Miertsch <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 06.12.14 - 22:26
 */
return array(
    'fileconnector' => [
        //The FileConnector module uses an own plugin manager to resolve file type adapters for file types
        //You can configure the file type adapter manager like a normal service manager
        //The file type is the alias that resolves to a FileConnector\Service\FileTypeAdapter
        'file_types' => [
            'invokables' => [
                'csv'  => 'FileConnector\Service\FileTypeAdapter\LeagueCsvTypeAdapter',
                'json' => 'FileConnector\Service\FileTypeAdapter\JsonTypeAdapter',
            ]

        ],
        //Filename templates are rendered with a mustache template engine. Mixins extend mustache with additional functions
        //A MixinManager is used to resolve mixins.
        //A Mixin should implement the __invoke() method to be used as a callable.
        //The alias of the mixin should also be used in the template.
        'filename_mixins' => [
            'invokables' => [
                'now' => 'FileConnector\Service\FileNameRenderer\Mixin\NowMixin',
            ]
        ]
    ],
    'dashboard' => [
        'fileconnector_config_widget' => [
            'controller' => 'FileConnector\Controller\DashboardWidget',
            'order' => 91 //50 - 99 connectors range
        ]
    ],
    'router' => [
        'routes' => [

        ]
    ],
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'service_manager' => [
        'factories' => [
            'fileconnector.file_type_adapter_manager' => 'FileConnector\Service\FileTypeAdapter\FileTypeAdapterManagerFactory',
            'fileconnector.filename_mixin_manager'    => 'FileConnector\Service\FileNameRenderer\MixinManagerFactory',
            'fileconnector.filename_renderer'         => 'FileConnector\Service\FileNameRenderer\FileNameRendererFactory',
        ],
        'abstract_factories' => [
            //Resolves a alias starting with "filegateway:::" to a FileConnector\Service\FileGateway
            'FileConnector\Service\FileGateway\AbstractFileGatewayFactory',
        ]
    ],
    'controllers' => array(

    ),
    'prooph.psb' => [
        'command_router_map' => [

        ]
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'FileConnector\Controller\Configuration' => 'Json',
        ],
        'accept_whitelist' => [
            'FileConnector\Controller\Configuration' => ['application/json'],
        ],
        'content_type_whitelist' => [
            'FileConnector\Controller\Configuration' => ['application/json'],
        ],
    ],
);