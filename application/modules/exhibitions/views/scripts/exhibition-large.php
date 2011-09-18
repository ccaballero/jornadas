<div class="exhibition">
    <?php if ($this->exhibition->hasVideo()) { ?><div class="video">v</div><?php } ?>
    <?php if ($this->exhibition->hasSlideshow()) { ?><div class="slideshow">p</div><?php } ?>
    <span class="bold red">TÍTULO: </span><a class="bold no-decoration" name="<?php echo $this->exhibition->url ?>"><?php echo $this->exhibition->title ?></a>
    <br />
    <span class="bold red">EXPOSITOR: </span><a class="bold" href="<?php echo $this->url(array('user' => $this->exhibitor->username), 'users_user_view') ?>"><?php echo $this->exhibitor->getFullname() ?></a>
    <br />
    <span class="bold red">FECHA: </span><span class="bold"><?php echo $this->timestamp($this->exhibition->tsstart) ?></span>
    <br />
    <span class="bold red">DESCRIPCIÓN: </span>
    <br />
    <p style="text-align:justify;"><?php echo $this->specialEscape($this->exhibition->abstract) ?></p>
</div>
