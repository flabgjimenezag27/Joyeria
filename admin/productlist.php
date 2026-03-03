<?php include('../includes/adminHeader.php');
require_once('../includes/config.php');
require_once('../model/adminDB.php');
require_once('adminController.php');
?>
<main>

    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <h4 class="mb-4 mt-4 text-center text-uppercase"><strong>Lista de Productos</strong></h4>
                <div class="table-responsive">

<form action="" method="post" >
                    <table id="mytable" class="table border cartTable">

                        <thead>

                            <!--<th><input type="checkbox" id="checkall"/>
						</th> -->
                            <th class="text-center">ID Producto</th>
                            <th class="text-center">ID Categoria</th>
                            <th class="text-center">Titulo</th>
                            <th class="text-center">Descripcion</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-center">Precio de Lista</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Color</th>
                            <th class="text-center">Imagen</th>
                            <th>Editar</th>

                        </thead>
                        <tbody>
                            <?php foreach($products as $product):?>
                            <tr>
                                <td>
								<input type="hidden" name="productID" value="<?php echo $product['productID'];?>">
                                    <?php echo $product['productID']; ?>
                                </td>
                                <td>
                                    <?php echo $product['categoryID']; ?>
                                </td>
                                <td>
                                    <?php echo $product['title']; ?>
                                </td>
                                <td><p><?php echo $product['productDescription']; ?></p></td>
                                <td class="text-center">
                                    <?php echo $product['quantity']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $product['listPrice']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $product['price']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $product['color']; ?>
                                </td>
                                <td class="text-center"><img src="<?php echo BASEURL . $product['imgPath']; ?>" class="smallImage"></td>
                                <td>

                                    <p data-placement="top" data-toggle="tooltip" title="Edit"><a class="btn btn-primary btn-xs btn-edit"
                                            name="edit" href="editproduct.php?id=<?php echo $product['productID']; ?>"><i
                                                class="fas fa-edit"></i></a>
                                    </p>
                                </td>

                            </tr>
                            <?php endforeach; ?>

                        </tbody>

                    </table>
</form>
                    <div class="clearfix"></div>


                </div>

            </div>
        </div>
    </div>

</main>

<?php include('../includes/adminFooter.php'); ?>