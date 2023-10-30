<style>
    #priority li:first-child {
        text-align: right !important;
    }
    li {
        border: 1px solid red;
        margin: 0 !important;
    }
</style>
<div class="ui modal order-modal">
    <header class="header"><?= __('New order') ?></header>
    <div class="content">
        <form class="ui form" name="order-modal-form">
            <div class="ui stackable three column grid">

                <!-- First Column -->
                <div class="column">

                    <!-- SITE -->
                    <div class="field">
                        <label for="site"><?= __('Site') ?></label>
                        <div class="ui dropdown fluid multiple search selection" id="site">
                            <input name="site" id="site" type="hidden">
                            <i class="dropdown icon"></i>
                            <div class="default text"><?= __('Choose a site') ?></div>
                        </div>
                    </div>

                    <!-- PRIORITY -->

                    <div class="field">
                        <label for="priority"><?= __('Priority') ?></label>
                        <select class="ui selection dropdown" id="priority">
                            <input type="hidden" name="priority" value="normal">
                            <div class="menu"></div>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <footer class="actions">
        <button class="ui button" type="button">Cancel</button>
        <button class="ui primary button" id="order-modal-submit-button" type="button">Submit</button>
    </footer>
</div>


<script>
    $('#order-modal-submit-button').click(() => {
        ajax('orders/add', serializeFormToObject($('.ui.form')), RELOAD);
        ch
    });

    // Load after page is loaded
    $(() => {
        // SITE
        $('#site.ui.dropdown').dropdown({
            allowAdditions: true,
            values: <?= json_encode($sites) ?>,
            onChange: function (value, text, $selectedItem) {

                // Close the dropdown after 100ms
                setTimeout(() => {
                    $('.ui.dropdown').dropdown('hide');
                }, 100);

            }
        });


        // PRIORITIES newer version
        $('#priority.ui.selection.dropdown').dropdown({
            values: <?= json_encode($priorities) ?>
        });
        $('#priority').dropdown('set selected', 'normal');

    });
</script>