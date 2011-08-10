<span class="bold red">TÍTULO: </span><a class="bold" name="<?php echo $this->exposicion->url ?>"><?php echo $this->exposicion->title ?></a>
<br />
<?php if (isset($this->expositor)) { ?>
    <span class="bold red">EXPOSITOR: </span><a class="bold" href="<?php echo $this->url(array('usuario' => $this->expositor->username), 'usuarios_usuario_ver') ?>"><?php echo $this->expositor->fullname ?></a>
<?php } else { ?>
    <span class="bold red">EXPOSITOR: </span><a class="bold" href="<?php echo $this->url(array('usuario' => $this->exposicion->username), 'usuarios_usuario_ver') ?>"><?php echo $this->exposicion->fullname ?></a>
<?php } ?>
<?php if (!empty($this->exposicion->abstract)) { ?>
<br />
<span class="bold red">DESCRIPCIÓN: </span>
<br />
<p style="text-align:justify;"><?php echo $this->exposicion->abstract ?>
<?php } ?>
&nbsp;<a class="bold magenta" href="<?php echo $this->url(array('exposicion' => $this->exposicion->url), 'exposiciones_exposicion_ver') ?>">[VER MAS]</a>
</p>
