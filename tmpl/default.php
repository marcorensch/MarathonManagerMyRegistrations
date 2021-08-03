<?php
defined('_JEXEC') or die;
?>

<?php if($registrations && count($registrations)):?>
<div class="nx-myregistrations">
    <table class="uk-table uk-table-divider uk-table-small">
        <thead>
        <tr>
            <th>Lauf</th>
            <th>Team</th>
            <th>Registration</th>
            <th><i uk-tooltip="Zahlungsstatus" class="fas fa-handshake"></i></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($registrations as $registration){
                include 'widgets/registrationRow.php';
            }?>
        </tbody>
    </table>


</div>
<?php endif;
