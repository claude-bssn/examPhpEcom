
<main> 

<?= $cartEmpty ?>
<div>
    <form id='cart' action="/cart" method="post">
        <table style="width:70%">
            <thead>
                <tr>
                    <th></th>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Sub-Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cart as $item) :?>
                    <tr>
                        <th><a href="/cart?remove_item=<?=$item['id_item']?>">x</a></th>
                        <td><?= $item['name']?></td>
                        <td><?=$item['price']?></td>
                        <td><input type='number' name='<?=$item['id_item']?>' value='<?=$item['quantity']?>'></input></td>
                        <td><?=$item['quantity']*$item['price']?></td>
                        <?php $total += $item['quantity']*$item['price']?>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th></th>
                    <td></td>
                    <td></td>
                    <td>total</td>
                    <td><?= $total ?></td>
                </tr>
            </tbody>
        </table>
                    <button form='cart' type="submit">Update cart</button>
    </form>            
</div>
<div>

</div>
<a href="/payment"><button type=button>Payment</button></a>
</main>
