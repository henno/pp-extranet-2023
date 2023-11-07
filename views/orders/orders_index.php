<div class="row">

    <h1>Orders</h1>

    <div class="table-responsive">
        <!-- Fomantic UI table -->
        <table class="ui celled table table-striped table-bordered">

            <thead>

            <tr>
                <th>ID</th>
                <th><?= __('Order Name') ?></th>
            </tr>

            </thead>

            <tbody>

            <?php foreach ($orders as $order): ?>
                <tr data-href="orders/<?= $order['orderId'] ?>">
                    <td><?= $order['orderId'] ?></td>
                    <td><?= $order['orderName'] ?></td>
                </tr>
            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>
