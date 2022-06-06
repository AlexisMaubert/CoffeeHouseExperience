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
        <tr>
          <td><img src="<?php echo BASE_URL ?>img/bebida_2.png" alt="" class="img-responsive"></td>
          <td class="table-prod">Café con crema especial</td>
          <td>1</td>
          <td>$280</td>
        </tr>
        <tr>
          <td><img src="<?php echo BASE_URL ?>img/bebida_1.png" class="img-responsive" alt=""></td>
          <td class="table-prod">Lemon juice</td>
          <td>1</td>
          <td>$200</td>
        </tr>
        <tr>
          <td><img src="<?php echo BASE_URL ?>img/bebida_3.png" class="img-responsive" alt=""></td>
          <td class="table-prod">Café con leche</td>
          <td>1</td>
          <td>$200</td>
        </tr>
        <tr>
          <td><img src="<?php echo BASE_URL ?>img/bebida_4.png" alt="" class="img-responsive"></td>
          <td class="table-prod">Café doble con whisky</td>
          <td>1</td>
          <td>$350</td>
        </tr>
      </table>
      <form action="<?php echo BASE_URL ?>pages/pago.html" method="post">
        <button type="submit" class="boton-carrito">Comprar</button>
      </form>
      <p class="total">total = $1030.00</p>
    </div>
  </div>

  <span onclick="openCart()" class="carrito-icon"><img src="<?php echo BASE_URL ?>img/carrito.png" alt="carrito de compras">
  </span>
</div>