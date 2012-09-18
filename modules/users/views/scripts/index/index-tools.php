<div class="tasks">
<?php if ($this->allowed('organizer:add') && ($this->max_organizers == -1 || $this->max_organizers > $this->count_organizers)) { ?>
    <a href="<?php echo $this->url(array(), 'users_add_organizer') ?>">+organizador</a>
<?php } ?>
<?php if ($this->allowed('exhibitor:add')) { ?>
    <a href="<?php echo $this->url(array(), 'users_add_exhibitor') ?>">+expositor</a>
<?php } ?>
<?php if ($this->allowed('protocol:add') && ($this->max_protocols == -1 || $this->max_protocols > $this->count_protocols)) { ?>
    <a href="<?php echo $this->url(array(), 'users_add_protocol') ?>">+protocolo</a>
<?php } ?>
<?php if ($this->allowed('assistant:add') && ($this->max_assistants == -1 || $this->max_assistants > $this->count_assistants)) { ?>
<a href="<?php echo $this->url(array(), 'users_add_assistant') ?>">+asistente</a>
<?php } ?>

<?php if ($this->allowed('credential:print') && $this->config->system->credentials) { ?>
<input type="submit" name="credentials" value="imprimir credenciales" />
<?php } ?>
</div>
