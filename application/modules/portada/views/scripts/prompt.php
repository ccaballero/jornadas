<span class="green bold"><?php if (is_object($this->user)) { ?><?php echo $this->user->username ?><?php } else { ?><?php echo $this->user ?><?php } ?>@jornadas</span>
<span class="blue bold"><?php echo $this->pwd ?>$ </span>
<?php if (isset($this->cmd)) { ?>
    <?php echo $this->cmd ?>
    <?php if (isset($this->sudo) && $this->sudo) { ?>
        <br/>[sudo] password for guest:
    <?php } else if (isset($this->su) && $this->su) { ?>
        <br/>password:
    <?php } ?>
<?php } else { ?>
    _
<?php } ?>
<br />