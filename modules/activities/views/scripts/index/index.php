<h2>Lista de actividades</h2>

<form method="post" action="" accept-charset="utf-8">
<input type="submit" value="Guardar" />
<table style="width: 50%">
    <tr>
        <th>Actividad</th>
        <th>Orden</th>
    </tr>
<?php $count = 0 ?>
<?php foreach ($this->activities as $activity) { ?>
    <tr>
        <td><input type="text" name="act[<?php echo $count ?>][label]" value="<?php echo $this->escape($activity->label) ?>" /></td>
        <td><input type="text" name="act[<?php echo $count ?>][order]" value="<?php echo $this->escape($activity->order) ?>" /></td>
    </tr>
    <?php $count++ ?>
<?php } ?>
    <tr>
        <td><input type="text" name="act[<?php echo $count ?>][label]" value="" /></td>
        <td><input type="text" name="act[<?php echo $count ?>][order]" value="" /></td>
    </tr>
</table>
<input type="submit" value="Guardar" />
</form>