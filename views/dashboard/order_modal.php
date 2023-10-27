<div class="ui modal order-modal">
    <header class="header">Form Title</header>
    <div class="content">
        <form class="ui form" name="order-modal-form">
            <div class="ui stackable three column grid">

                <!-- First Column -->
                <div class="column">
                    <div class="field">
                        <label for="field1">Field 1</label>
                        <input type="text" name="field1" placeholder="Field 1">
                    </div>
                    <!-- Add more fields for this column as needed -->
                </div>

                <!-- Second Column -->
                <div class="column">
                    <div class="field">
                        <label for="field2">Field 2</label>
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
    });
</script>