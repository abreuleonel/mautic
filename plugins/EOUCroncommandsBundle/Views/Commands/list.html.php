<?php
/**
 * @copyright   2016 Mautic, Inc. All rights reserved
 * @author      Mautic, Inc
 *
 * @link        https://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
$view->extend('EOUCroncommandsBundle:Commands:index.html.php');

?>
<?php if (count($items)): ?>
<div class="table-responsive">
    <table class="table table-hover table-striped table-bordered monitoring-list" id="monitoringTable">
        <thead>
            <tr>
            	<th>#</th>
                <th>Command</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $k => $item): ?>
                <tr>
                	<td>
                        <div>
                            <?php echo $k; ?>
                        </div>
                    </td>
                    <td>
                        <div>
                        	<?= $item; ?>
                        </div>
                    </td>
                    <td>
                    	<div>
                    		<a href="#" id="<?= $k ?>" data-cmd="<?= $item ?>" class="execute_command">
                    			<span class="icon fa fa-terminal fs-18" ></span>
                    		</a>
                    	</div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php else: ?>
    <?php echo $view->render('MauticCoreBundle:Helper:noresults.html.php', ['tip' => 'mautic.mautic.social.monitoring.noresults.tip']); ?>
<?php endif; ?>

<?php echo $view->render('MauticCoreBundle:Helper:modal.html.php', [
        'id'     => 'MonitoringPreviewModal',
        'header' => false,
    ]);
?>

<?php echo $view['assets']->includeScript('plugins/EOUCroncommandsBundle/Assets/js/command.js', 'commandList', 'commandList'); ?>