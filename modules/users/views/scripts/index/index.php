<div class="tasks">
<a href="<?php echo $this->url(array(), 'users_add_organizer') ?>">Agregar organizador</a>
<a href="<?php echo $this->url(array(), 'users_add_assistant') ?>">Agregar asistente</a>
</div>

<h2>Organizadores</h2>
<table>
    <tr>
        <th>Nombre Completo</th>
        <th>Hash</th>
    </tr>
<?php foreach ($this->organizers as $organizer) { ?>
    <tr>
        <td>
            <a href="<?php echo $this->url(array('user' => $organizer->hash), 'users_user_view') ?>"><?php echo $organizer->getFullname() ?></a>
        </td>
        <td><?php echo $organizer->hash ?></td>
    </tr>
<?php } ?>
</table>

<br />
<h2>Participantes</h2>
<table>
    <tr>
        <th>Nombre Completo</th>
        <th>Hash</th>
    </tr>
<?php foreach ($this->assistants as $assistant) { ?>
    <tr>
        <td><?php echo $assistant->getFullname() ?></td>
        <td><?php echo $assistant->hash ?></td>
    </tr>
<?php } ?>
</table>
