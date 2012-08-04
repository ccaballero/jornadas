<h2>Actividades</h2>
<?php echo $this->partial('index/index-tools.php', array()) ?>

<table style="width: 50%">
    <tr class="nav">
        <th>Nº</th>
        <th>Actividad</th>
        <th>Orden</th>
    </tr>
<?php foreach ($this->activities as $activity) { ?>
    <tr class="<?php echo $this->cycle(array("even", "odd"))->next()?>">
        <td class="center"><?php echo $this->escape($activity->code) ?></td>
        <td><?php echo $this->escape($activity->label) ?></td>
        <td class="center"><?php echo $this->escape($activity->order) ?></td>
    </tr>
<?php } ?>
</table>
