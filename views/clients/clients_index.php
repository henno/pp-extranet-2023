<style>
    .ui.table>tbody>tr>th{cursor:auto;background:#f9fafb;text-align:inherit;color:rgba(0,0,0,.87);padding:.92857143em .78571429em;vertical-align:inherit;font-style:none;font-weight:700;text-transform:none;border-bottom:1px solid rgba(34,36,38,.1);border-left:none;}
    .ui.table>tbody>tr>th:first-child{border-left:none;}
</style>
<div class="row">

    <h1>Clients</h1>

    <div class="table-responsive">
        <!-- Fomantic UI table -->
        <table class="ui celled table table-striped table-bordered">

            <tbody>
            <?php foreach ($clients as $clientId => $client): ?>
                <tr data-href="clients/<?= $clientId ?>">
                    <th colspan="2"><?= $client['clientName'] ?></th>
                </tr>
                <?php foreach ($client['users'] as $userId => $user): ?>
                    <tr>
                        <td><?= $user['userId'] ?></td>
                        <td><?= $user['userName'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endforeach; ?>
            </tbody>

        </table>

    </div>

</div>
