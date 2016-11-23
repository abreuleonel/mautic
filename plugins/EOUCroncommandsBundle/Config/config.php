<?php
/**
 * @copyright   2014 EOU/MRM. All rights reserved
 * @author      BRuno de Abreu
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

return [
    'menu' => [
        'admin' => [
            'eou.croncommands.croncommands' => [
                    'access'    => 'croncommand:croncommands:view',
                    'route'     => 'eou_croncommands_index',
                    'iconClass' => 'fa-terminal',
            ],
        ],
    ],

    'routes' => [
        'main' => [
            'eou_croncommands_index' => [
                'path'       => '/croncommands',
                'controller' => 'EOUCroncommandsBundle:Croncommands:index',
            ],
        ],
    ],
];
