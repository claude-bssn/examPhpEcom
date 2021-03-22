<link rel="stylesheet" type="text/css" href="../public/css/item.css" />

<main>
    <div class="marge">

    </div>

    <div class="item_group">
        <!-- line-->
        <?php foreach ($dataItem as $keyItem => $item) : ?>
            <div class='item'>
                <!-- card-->
                <div class="container">
                    <img src=<?= $item['image'] ?> alt="">
                </div>

                <p><?= $item['name'] ?></p>
                <p>Item n <?= $item['id'] ?></p>
                <p><?= $item['price'] ?> €</p>

                <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                    <input type="hidden" name='id_item' value='<?= $item['id'] ?>'>
                    <label for="quantity">Quantity</label>
                    <input type="number" name='quantity' value='1'>
                    <button type="submit">add to cart</button>
                </form>

                <p>Cat. <?= $item['id_category'] ?></p>
                <p><?= $item['description'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <div class='side'>
        <ul>
            <li><a href="/item?id=1">Flowers</a></li>
            <li><a href="/item?id=2">Green</a></li>
            <li><a href="/item?id=3">Orchid</a></li>
            <li><a href="/item?id=4">Pottery</a></li>
            <li><a href="/item?id=5">Tools</a></li>

        </ul>
    </div>


</main>