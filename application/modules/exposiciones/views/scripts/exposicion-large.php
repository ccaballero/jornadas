<div style="float: left; width: 150px; margin-left: 10px;">
    <img style="background-color: #000000;" src="/icon.php?size=256&hash=<?php echo sha1($this->exposicion->title) ?>" width="128px" alt="" title="" />
</div>

<div style="padding-left: 160px;">
    <span class="bold red">TÍTULO: </span><a class="bold no-decoration" name="<?php echo $this->exposicion->url ?>"><?php echo $this->exposicion->title ?></a>
    <br />

    <?php if (isset($this->expositor)) { ?>
        <span class="bold red">EXPOSITOR: </span><a class="bold" href="<?php echo $this->url(array('usuario' => $this->expositor->username), 'usuarios_usuario_ver') ?>"><?php echo $this->expositor->fullname ?></a>
    <?php } else { ?>
        <span class="bold red">EXPOSITOR: </span><a class="bold" href="<?php echo $this->url(array('usuario' => $this->exposicion->username), 'usuarios_usuario_ver') ?>"><?php echo $this->exposicion->fullname ?></a>
    <?php } ?>

    <br />
    <span class="bold red">FECHA: </span><span class="bold"><?php echo $this->timestamp($this->exposicion->tsstart) ?></span>
    <br />
    <span class="bold red">DESCRIPCIÓN: </span>
    <br />
    <p style="text-align:justify;"><?php echo $this->specialEscape($this->exposicion->abstract) ?></p>
</div>
