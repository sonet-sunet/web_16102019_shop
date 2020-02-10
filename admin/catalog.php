<?php
    $access_free = false;
    include($_SERVER['DOCUMENT_ROOT'].'/admin/modules/header.php'); 
    $template = [
        'products'=>[]
    ];
?>
<div class="row">
    <div class="col-12">
        <h1>Товары</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>id</th>
                    <th>active</th>
                    <th>name</th>
                    <th>price</th>
                    <th>sku</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Товар</td>
                    <td>999</td>
                    <td>9sdfed3199</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Товар</td>
                    <td>999</td>
                    <td>9sdfed3199</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT'].'/admin/modules/footer.php'); ?>

