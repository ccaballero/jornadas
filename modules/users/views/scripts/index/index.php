<div class="tasks">
<?php if ($this->allowed('add:organizer')) { ?>
<a href="<?php echo $this->url(array(), 'users_add_organizer') ?>">Agregar organizador</a>
<?php } ?>
<?php if ($this->allowed('add:assistant')) { ?>
<a href="<?php echo $this->url(array(), 'users_add_assistant') ?>">Agregar asistente</a>
<?php } ?>
</div>

<h2>Organizadores</h2>
<table>
    <tr>
        <th>Nombre Completo</th>
        <?php if ($this->allowed('view:hash')) { ?><th>Hash</th><?php } ?>
    </tr>
<?php foreach ($this->organizers as $organizer) { ?>
    <tr>
        <td>
        <?php if ($this->allowed('view:organizer')) { ?>
            <a href="<?php echo $this->url(array('user' => $organizer->hash), 'users_user_view') ?>">
        <?php } ?>
                <?php echo $organizer->getFullname() ?>
        <?php if ($this->allowed('view:organizer')) { ?>
            </a>
        <?php } ?>
        </td>
    <?php if ($this->allowed('view:hash')) { ?>
        <td class="center">
            <?php echo $organizer->hash ?>
        </td>
    <?php } ?>
    </tr>
<?php } ?>
</table>

<br />
<h2>Asistentes</h2>
<table>
    <tr>
        <th>Nombre Completo</th>
        <?php if ($this->allowed('view:hash')) { ?><th>Hash</th><?php } ?>
    </tr>
<?php foreach ($this->assistants as $assistant) { ?>
    <tr>
        <td>
        <?php if ($this->allowed('view:assistant')) { ?>
            <a href="<?php echo $this->url(array('user' => $assitant->hash), 'users_user_view') ?>">
        <?php } ?>
            <?php echo $assistant->getFullname() ?></td>
        <?php if ($this->allowed('view:assistant')) { ?>
            </a>
        <?php } ?>
    <?php if ($this->allowed('view:hash')) { ?>
        <td class="center">
            <?php echo $assistant->hash ?>
        </td>
    <?php } ?>
    </tr>
<?php } ?>
</table>
