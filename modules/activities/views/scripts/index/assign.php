<h2>Estado de las actividades</h2>

<table>
    <tr class="nav">
        <th>Nombre Completo</th>
        <th>Rol</th>
    <?php foreach ($this->activities as $activity) { ?>
        <th><?php echo $activity->code ?></th>
    <?php } ?>
    </tr>
<?php foreach ($this->participants as $participant) { ?>
    <tr>
        <td><?php echo $participant->getFullname() ?></td>
        <td class="center"><?php echo $participant->role ?></td>
    <?php foreach ($this->activities as $activity) { ?>
        <td class="center"><?php if (true) { ?>:-)<?php } else { ?>:-(<?php } ?></td>
    <?php } ?>
    </tr>
<?php } ?>
</table>