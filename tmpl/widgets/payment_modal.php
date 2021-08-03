<?php
defined('_JEXEC') or die;
?>
<!-- This is a button toggling the modal -->
<button uk-toggle="target: #my-reg<?php echo $registration->id;?>" type="button"><i class="fas fa-file-invoice-dollar"></i></button>

<!-- This is the modal -->
<div id="my-reg<?php echo $registration->id;?>" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
        <h2 class="uk-modal-title">Einzahlungsinformationen</h2>
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <div>
            <table class="uk-table uk-table-divider">
                <tbody>
                <tr><td class="uk-width-1-2 uk-width-1-4@m">Empfänger</td><td>OK Mountain Marathon<br>8003 Zurich</td></tr>
                <tr><td>Postkonto</td><td>85-334272-4</td></tr>
                <tr><td>Deine Referenz</td><td><span class="referencenum"><?php echo $registration->reference_num;?></span></td></tr>
                <tr><td>IBAN</td><td>CH53 0900 0000 8533 4272 4</td></tr>
                <tr><td>BIC</td><td>POFICH-BEXXX</td></tr>
                <tr><td class="uk-width-1-2 uk-width-1-4@m">Betrag</td><td>CHF <span class="price"><?php echo $registration->total_price;?></span>.-</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
