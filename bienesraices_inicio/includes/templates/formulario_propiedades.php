<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo:</label>
    <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo sanitize($propiedad->titulo); ?>"/>

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo sanitize($propiedad->precio); ?>"/>

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion"><?php echo sanitize($propiedad->descripcion); ?></textarea>

</fieldset>

<fieldset>
    <legend>Información Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9" value="<?php echo sanitize($propiedad->habitaciones); ?>"/>

    <label for="wc">Baños:</label>
    <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9" value="<?php echo sanitize($propiedad->wc); ?>"/>

    <label for="estacionamiento">Estacionamiento:</label>
    <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9" value="<?php echo sanitize($propiedad->estacionamiento); ?>"/>

</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <select name="vendedores_id">
        <option value="">-- Seleccione --</option>
        <?php while($vendedor = mysqli_fetch_assoc($resultado) ): ?>

            <option <?php echo $vendedores_id == $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id'] ?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> </option>

        <?php endwhile ?>
    </select>

</fieldset>