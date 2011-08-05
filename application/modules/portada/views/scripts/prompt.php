<span class="green bold"><?php echo $this->user->username ?>@jornadas</span>
<span class="blue bold"><?php echo $this->pwd ?>$ </span>
<?php if (isset($this->cmd)) { ?>
    <?php echo $this->cmd ?>
    <?php if (isset($this->sudo) && $this->sudo) { ?>
        <br/>[sudo] password for guest:
    <?php } ?>
<?php } else { ?>
    _
<?php } ?>
