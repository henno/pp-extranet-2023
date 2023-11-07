<style>
    .good{
        background-color: springgreen;
    }
    .bad{
        background-color: red;
    }
</style>
</head>

<div class="container">

    <h1>Constraints:</h1>
    <ul>
        <?php if (!empty($results)) foreach ($results as $r): ?>
            <li><?= $r ?></li>
        <?php endforeach ?>
    </ul>

</div>
