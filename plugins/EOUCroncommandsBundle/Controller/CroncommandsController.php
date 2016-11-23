<?php
/**
* @copyright   2016 EOU/MRM, Inc. All rights reserved
* @author      Bruno de Abreu
* @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/

namespace MauticPlugin\EOUCroncommandsBundle\Controller;

use Mautic\CoreBundle\Controller\CommonController;

class CroncommandsController extends CommonController
{
    public function indexAction()
    {
        $items = [
                    'cache:clear',
                    'mautic:leadlists:update',
                    'mautic:campaigns:update',
                    'mautic:campaigns:trigger',
                    'mautic:email:process',
                    'mautic:fetch:email',
                    'doctrine:migrations:migrate',
                    'doctrine:schema:update --dump-sql',
                    'doctrine:schema:update --force',

        ];

        return $this->delegateView(
                [
                        'viewParameters' => [
                                'items' => $items,
                        ],
                        'contentTemplate' => 'EOUCroncommandsBundle:Commands:list.html.php',
                ]
        );
    }
}
