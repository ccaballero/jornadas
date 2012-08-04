<div class="tasks">
<?php if ($this->allowed('activity:manage')) { ?>
<a href="<?php echo $this->url(array(), 'activities') ?>">*administrar</a>
<?php } ?>
<?php if ($this->allowed('activity:view')) { ?>
<a href="<?php echo $this->url(array(), 'activities_assign') ?>">estados</a>
<?php } ?>
</div>

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
