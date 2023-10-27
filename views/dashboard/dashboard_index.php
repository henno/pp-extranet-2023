<?php require 'order_modal.php' ?>
<a class="ui button" onclick="openCustomModal()"><?= __('Add new order') ?></a>
<script type="text/javascript">

    function openCustomModal() {
        $('.ui.modal.order-modal').modal('show')
    }

</script>
