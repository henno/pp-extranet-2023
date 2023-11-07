<style>
    th {
        text-align: center;
        background-color: #f5f5f5 !important;
    }
</style>
<div class="row">

    <h1>Permissions</h1>

    <div class="table-responsive">

        <table class="ui celled table table-striped table-bordered">


            <tbody>

            <tr>
                <th>ID</th>
                <td><?= $user['permissionId'] ?></td>
            </tr>
            <tr>
                <th><?= __('Permission Name') ?></th>
                <td><?= $user['permissionName'] ?></td>
            </tr>

            </tbody>

        </table>

    </div>
</div>