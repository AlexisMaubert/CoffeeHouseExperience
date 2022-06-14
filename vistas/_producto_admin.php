<div class="producto">
  <div>
    <img src="<?php echo BASE_URL ?>img/<?php echo $producto->id_producto ?>.png" alt="<?php echo $producto->nombre_producto ?>" width="115px" height="100pxs">
  </div>

  <div class="contenido-producto">
    <div>
      <a class="producto-titulo" href=""><?php echo $producto->nombre_producto ?></a>
      <p class="descripcion-producto"><?php echo $producto->descripcion_producto ?></p>

      <div class="botones-admin">
        <div>
          <a href="modificar_producto.php?id_producto=<?php echo $producto->id_producto ?>">
            <button class="boton-admin"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#002196" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                <line x1="16" y1="5" x2="19" y2="8" />
              </svg></button></a>

        </div>
        <div>
          <a href="#" onclick="eliminarProducto('eliminar_producto.php?ide=<?php echo $producto->id_producto ?>')">
            <button class="boton-admin"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="4" y1="7" x2="20" y2="7" />
                <line x1="10" y1="11" x2="10" y2="17" />
                <line x1="14" y1="11" x2="14" y2="17" />
                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
              </svg></button></a>
        </div>
      </div> <!-- Fin Botones-Admin -->
    </div>
    <p class="precio-producto">$<?php echo $producto->precio_producto ?></p>
  </div>
</div> <!-- Fin producto -->