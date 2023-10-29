<div class="row">

    <h1>Sites</h1>

    <div class="table-responsive">
        <!-- Fomantic UI table -->
        <table class="ui celled table table-striped table-bordered">

            <thead>

            <tr>
                <th>ID</th>
                <th><?= __('Site Name') ?></th>
            </tr>

            </thead>

            <tbody>

            <?php foreach ($sites as $site): ?>
                <tr data-href="sites/<?= $site['siteId'] ?>">
                    <td><?= $site['siteId'] ?></td>
                    <td><?= $site['siteName'] ?></td>
                </tr>
            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>
