<style>
    th {
        text-align: center;
        background-color: #f5f5f5 !important;
    }
</style>
<div class="row">

    <h1>Orders</h1>

    <div class="table-responsive">

        <table class="ui celled table table-striped table-bordered">


            <tbody>

            <tr>
                <th>ID</th>
                <td><?= $order['orderId'] ?></td>
            </tr>
            <tr>
                <th><?= __('Order Name') ?></th>
                <td><?= $order['orderName'] ?></td>
            </tr>

            </tbody>

        </table>

    </div>
</div>