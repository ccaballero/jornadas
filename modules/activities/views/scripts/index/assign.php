<h2>Actividades</h2>

<table>
    <tr>
        <th>Nombre Completo</th>
    <?php foreach ($this->activities as $activity) { ?>
        <th><?php echo $activity->code ?></th>
    <?php } ?>
    </tr>
<?php foreach ($this->organizers as $organizer) { ?>
    <tr>
        <td><?php echo $organizer->getFullname() ?></td>
    <?php foreach ($this->activities as $activity) { ?>
        <td><?php echo '0' ?></td>
    <?php } ?>
    </tr>
<?php } ?>
<?php foreach ($this->protocols as $protocol) { ?>
    <tr>
        <td><?php echo $protocol->getFullname() ?></td>
    <?php foreach ($this->activities as $activity) { ?>
        <td><?php echo '0' ?></td>
    <?php } ?>
    </tr>
<?php } ?>
<?php foreach ($this->assistants as $assistant) { ?>
    <tr>
        <td><?php echo $assistant->getFullname() ?></td>
    <?php foreach ($this->activities as $activity) { ?>
        <td><?php echo '0' ?></td>
    <?php } ?>
    </tr>
<?php } ?>
</table>