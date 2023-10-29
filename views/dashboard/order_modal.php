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
                        <div class="ui fluid multiple search selection dropdown">
                            <input name="site" id="site" type="hidden">
                            <i class="dropdown icon"></i>
                            <div class="default text"><?= __('Choose a site') ?></div>
                        </div>
                    </div>

                    <!-- PRIORITY -->
                    <div class="field">
                        <label for="priority"><?= __('Priority') ?></label>
                        <div class="ui bottom aligned labeled slider" id="priority"></div>

                    </div>

                    <!-- Add more fields for this column as needed -->
                </div>

                <!-- Second Column -->
                <div class="column">
                    <div class="field">
                        <span for="field2">Field 2</span>
                        <input type="text" name="field2" placeholder="Field 2">
                    </div>
                    <!-- Add more fields for this column as needed -->
                </div>

                <!-- Third Column -->
                <div class="column">
                    <div class="field">
                        <label for="field3">Field 3</label>
                        <input type="text" name="field3" placeholder="Field 3">
                    </div>
                    <!-- Add more fields for this column as needed -->
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
        $('.ui.dropdown').dropdown({
            allowAdditions: true,
            values: <?= json_encode($sites) ?>,
            onChange: function (value, text, $selectedItem) {

                // Close the dropdown after 100ms
                setTimeout(() => {
                    $('.ui.dropdown').dropdown('hide');
                }, 100);

            }
        });

        // PRIORITIES
        var labels = <?= json_encode($priorities) ?>;
        var customLabels = labels;

        $('#priority').slider({
            min: 0,
            max: 2,
            start: 1,
            step: 1,
            interpretLabel: function(value) {
                return customLabels[value];
            }
        });

        $('.ui.modal.order-modal').modal('attach events', '#new-order-button', 'show');
    });
</script>