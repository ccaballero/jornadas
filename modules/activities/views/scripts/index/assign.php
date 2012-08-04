<h2>Estado de las actividades</h2>
<?php echo $this->partial('index/index-tools.php', array()) ?>

<table>
    <tr class="nav">
        <th>Nombre Completo</th>
        <th>Rol</th>
    <?php foreach ($this->activities as $activity) { ?>
        <th><?php echo $activity->code ?></th>
    <?php } ?>
    </tr>
<?php foreach ($this->participants as $participant) { ?>
    <tr class="<?php echo $this->cycle(array("even", "odd"))->next()?>">
        <td><?php echo $participant->getFullname() ?></td>
        <td class="center"><?php echo $this->role($participant->role) ?></td>
    <?php foreach ($this->activities as $activity) { ?>
        <?php if (isset($this->table[$participant->ident][$activity->ident])) { ?>
            <td class="center happy"><span>:-)</span></td>
        <?php } else { ?>
            <td class="center sad"><span>:-(</span></td>
        <?php } ?>
    <?php } ?>
    </tr>
<?php } ?>
</table>
