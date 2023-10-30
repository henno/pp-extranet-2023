<style>
    th {
        text-align: center;
        background-color: #f5f5f5 !important;
    }
</style>
<div class="row">

    <h1>Clients</h1>

    <div class="table-responsive">

        <table class="ui celled table table-striped table-bordered">


            <tbody>

            <tr>
                <th>ID</th>
                <td><?= $client['clientId'] ?></td>
            </tr>
            <tr>
                <th><?= __('Client Name') ?></th>
                <td><?= $client['clientName'] ?></td>
            </tr>

            </tbody>

        </table>

    </div>
</div>