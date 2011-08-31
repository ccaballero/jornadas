<div style="float: left; width: 80px; margin-left: 10px;">
    <img src="/icon.php?size=128&hash=<?php echo sha1($this->exposicion->title) ?>" width="64px" alt="" title="" />
</div>

<span class="bold red">TÍTULO: </span><a class="bold" name="<?php echo $this->exposicion->url ?>"><?php echo $this->exposicion->title ?></a>
<br />

<?php if (isset($this->expositor)) { ?>
    <span class="bold red">EXPOSITOR: </span><a class="bold" href="<?php echo $this->url(array('usuario' => $this->expositor->username), 'usuarios_usuario_ver') ?>"><?php echo $this->expositor->fullname ?></a>
<?php } else { ?>
    <span class="bold red">EXPOSITOR: </span><a class="bold" href="<?php echo $this->url(array('usuario' => $this->exposicion->username), 'usuarios_usuario_ver') ?>"><?php echo $this->exposicion->fullname ?></a>
<?php } ?>

<br />
<span class="bold red">FECHA: </span>
<br />
<span class="bold red">DESCRIPCIÓN: </span>
<br />
<p style="text-align:justify;"><?php echo $this->wrapper($this->specialEscape($this->exposicion->abstract)) ?>

&nbsp;<a class="bold cyan" href="<?php echo $this->url(array('exposicion' => $this->exposicion->url), 'exposiciones_exposicion_ver') ?>">[VER&nbsp;MAS]</a>
</p>
