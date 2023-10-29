<?php require 'order_modal.php' ?>
<a class="ui button" onclick="openCustomModal()"><?= __('Add new order') ?></a>
<script type="text/javascript">

    // TODO: remove this before commit
    $(() => {
        $('.ui.modal.order-modal').modal('show')
    });

    function openCustomModal() {
        $('.ui.modal.order-modal').modal('show')
    }

</script>
