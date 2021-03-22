<?php

?>
<link rel="stylesheet" type="text/css" href="../public/css/global.css" />
<link rel="stylesheet" type="text/css" href="../public/css/informations.css" />

<h2>Your Account</h2>

<div class="informations">
    <h3>Informations</h3>
    <?php
    echo '<p> Name : ' . $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] . '</p>';
    echo '<p> Email : ' . $_SESSION['email'] . '</p>';
    echo '<p> Phone : ' . $_SESSION['phone'] . '</p>';
    ?>


<p>
<form action="/account_edit" method="post">
    <input type="submit" value="edit account">
</form>
</p>

<p>Past Order</p>
<?php foreach($dataOrder as $value) :?>
    <table style="width:70%">
        <h3>Order n˚<?= $value['id']?></h3>
       
        <thead>
            <tr>
            
            <th>Product name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Sub-Total</th>
        </tr>
    </thead>
    <tbody>
                <?php $order = getHistoricOrder($pdo, $value['id']);?>
                <?php foreach($order as $item) :?>
                    
                    <tr>
                        <td><?= $item['name_item']?></td>
                        <td><?=$item['price']?></td>
                        <td><?=$item['quantity']?></td>
                        <td><?=$item['quantity']*$item['price']?></td>
                        <!-- <?php $total += $item['quantity']*$item['price'];?> -->
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endforeach; ?>