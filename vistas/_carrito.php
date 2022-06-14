<div class="carrito-box">
  <div id="carritoCompra" class="carrito">
    <a href="javascript:void(0)" class="closebtn" onclick="closeCart()">&times;</a>
    <div class="carrito-lista">
      <table>
        <tr>
          <th class="table-img"></th>
          <th class="table-prod">Producto</th>
          <th class="table-cant">Cant</th>
          <th class="table-pre">Precio</th>
        </tr>
        <?php $total = 0 ?>
        <?php if (isset($_COOKIE['carrito']) && count($aCarrito) > 0) : ?>
          <?php foreach ($aCarrito as $prodEnCarrito) : ?>
            <tr>
              <td><img src="<?php echo BASE_URL ?>img/<?php echo $prodEnCarrito['id_producto'] ?>.png" alt="<?php echo $prodEnCarrito['nombre_producto'] ?>." class="img-responsive"></td>
              <td class="table-prod"><?php echo $prodEnCarrito['nombre_producto'] ?>.</td>
              <td>1</td>
              <td>$<?php echo $prodEnCarrito['precio_producto'] ?></td>
            </tr>
            <?php $total +=   $prodEnCarrito['precio_producto']?>
          <?php endforeach ?>
        <tr>
          <td></td>
          <td class="total">total = <?php echo $total?></td>
          <td></td>
          <td>
            <form action="<?php echo BASE_URL ?>pages/pago.html" method="post">
              <button type="submit" class="boton-carrito">Comprar</button>
            </form>
          </td>
        </tr>
        <?php endif ?>
      </table>

    </div>
  </div>

  <span onclick="openCart()" class="carrito-icon"><img src="<?php echo BASE_URL ?>img/carrito.png" alt="carrito de compras">
  </span>
</div>