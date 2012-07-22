<div class="tasks">
<?php if ($this->allowed('add:organizer') && ($this->max_organizers == -1 || $this->max_organizers > $this->count_organizers)) { ?>
<a href="<?php echo $this->url(array(), 'users_add_organizer') ?>">Agregar organizador</a>
<?php } ?>
<?php if ($this->allowed('add:assistant') && ($this->max_assistants == -1 || $this->max_assistants > $this->count_assistants)) { ?>
<a href="<?php echo $this->url(array(), 'users_add_assistant') ?>">Agregar asistente</a>
<?php } ?>
</div>

<h2>Organizadores</h2>
<?php if ($this->max_organizers != -1) { ?>
<p>Capacidad maxima establecida: <?php echo $this->max_organizers ?></p>
<p>Total Organizadores: <?php echo $this->count_organizers ?></p>
<?php } ?>
<table>
    <tr>
        <th>Nombre Completo</th>
        <?php if ($this->allowed('view:hash')) { ?><th>Hash</th><?php } ?>
    </tr>
<?php foreach ($this->organizers as $organizer) { ?>
    <tr class="<?php echo $this->cycle(array("even", "odd"))->next()?>">
        <td>
        <?php if ($this->allowed('view:organizer')) { ?>
            <a href="<?php echo $this->url(array('username' => $organizer->username), 'users_user_view') ?>">
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
<?php if ($this->max_assistants != -1) { ?>
<p>Capacidad maxima establecida: <?php echo $this->max_assistants ?></p>
<p>Total Asistentes: <?php echo $this->count_assistants ?></p>
<?php } ?>
<table>
    <tr>
        <th>Nombre Completo</th>
        <?php if ($this->allowed('view:hash')) { ?><th>Hash</th><?php } ?>
    </tr>
<?php foreach ($this->assistants as $assistant) { ?>
    <tr class="<?php echo $this->cycle(array("even", "odd"))->next()?>">
        <td>
        <?php if ($this->allowed('view:assistant')) { ?>
            <a href="<?php echo $this->url(array('username' => $assistant->username), 'users_user_view') ?>">
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
