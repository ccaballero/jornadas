<div class="tasks">
<?php if ($this->allowed('add:organizer') && ($this->max_organizers == -1 || $this->max_organizers > $this->count_organizers)) { ?>
<a href="<?php echo $this->url(array(), 'users_add_organizer') ?>">Agregar organizador</a>
<?php } ?>
<?php if ($this->allowed('add:assistant') && ($this->max_assistants == -1 || $this->max_assistants > $this->count_assistants)) { ?>
<a href="<?php echo $this->url(array(), 'users_add_assistant') ?>">Agregar asistente</a>
<?php } ?>
<?php if ($this->allowed('print:credential')) { ?>
<input type="submit" name="credentials" value="Imprimir credenciales" />
<?php } ?>
</div>
