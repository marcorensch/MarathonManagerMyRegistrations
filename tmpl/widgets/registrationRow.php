<?php
defined('_JEXEC') or die;

use Joomla\CMS\Date\Date;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

$paidIcon = intval($registration->paid) ? '<span uk-tooltip="Startgeld verbucht" class="uk-text-success"><i class="fas fa-check"></i></span>': '<span uk-tooltip="Startgeld noch nicht verbucht" class="uk-text-warning"><i class="fas fa-hourglass-start"></i></span>';
$date = new Date($registration->created);
$creation = HtmlHelper::date($registration->created, 'd.m.Y');
?>

<tr>
    <td><?php echo $registration->name;?></td>
    <td><?php echo $registration->teamname;?></td>
    <td><?php echo $creation;?></td>
    <td><?php echo $paidIcon;?></td>
    <td><?php include 'payment_modal.php';?></td>
</tr>
