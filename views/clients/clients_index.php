<div class="row">

    <h1>Clients</h1>

    <div class="table-responsive">
        <!-- Fomantic UI table -->
        <table class="ui celled table table-striped table-bordered">

            <thead>

            <tr>
                <th>ID</th>
                <th><?= __('Client Name') ?></th>
            </tr>

            </thead>

            <tbody>

            <?php foreach ($clients as $client): ?>
                <tr data-href="clients/<?= $client['clientId'] ?>">
                    <td><?= $client['clientId'] ?></td>
                    <td><?= $client['clientName'] ?></td>
                </tr>
            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>
