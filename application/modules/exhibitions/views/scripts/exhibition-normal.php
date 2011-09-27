<div class="exhibition" style="border-top: 1px solid #ffffff; padding-top: 1.0em;">
    <?php if ($this->exhibition->hasVideo()) { ?><div class="video">v</div><?php } ?>
    <?php if ($this->exhibition->hasAudio()) { ?><div class="audio">a</div><?php } ?>
    <?php if ($this->exhibition->hasSlideshow()) { ?><div class="slideshow">p</div><?php } ?>
    <span class="bold red">TÍTULO: </span><a class="bold no-decoration" name="<?php echo $this->exhibition->url ?>"><?php echo $this->exhibition->title ?></a>
    <br />
    <span class="bold red">EXPOSITOR: </span><a class="bold" href="<?php echo $this->url(array('user' => $this->exhibition->username), 'users_user_view') ?>"><?php echo $this->exhibition->fullname ?></a>
    <br />
    <span class="bold red">FECHA: </span><span class="bold"><?php echo $this->timestamp($this->exhibition->tsstart) ?></span>
    <br />
    <span class="bold red">DESCRIPCIÓN: </span>
    <br />
    <p style="text-align:justify;"><?php echo $this->wrapper($this->specialEscape($this->exhibition->abstract)) ?><a class="bold magenta" href="<?php echo $this->url(array('exhibition' => $this->exhibition->url), 'exhibitions_exhibition_view') ?>">[VER&nbsp;MAS]</a></p>
</div>
<br />
