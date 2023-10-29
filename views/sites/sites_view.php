<style>
    th {
        text-align: center;
        background-color: #f5f5f5 !important;
    }
</style>
<div class="row">

    <h1>Sites</h1>

    <div class="table-responsive">

        <table class="ui celled table table-striped table-bordered">


            <tbody>

            <tr>
                <th>ID</th>
                <td><?= $site['siteId'] ?></td>
            </tr>
            <tr>
                <th><?= __('Site Name') ?></th>
                <td><?= $site['siteName'] ?></td>
            </tr>

            </tbody>

        </table>

    </div>
</div>