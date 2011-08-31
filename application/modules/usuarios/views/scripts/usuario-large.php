<div style="float: left; width: 148px; margin-left: 16px;">
    <img src="/icon.php?size=256&hash=<?php echo sha1($this->usuario->hash) ?>" width="128px" alt="" title="" />
</div>

<div style="min-height: 142px;">
    <span class="red bold"><?php echo $this->usuario->fullname ?></span>
    <br />
    <?php if ($this->role == 'admin') { ?>
        <span><?php echo $this->usuario->hash ?></span>
        <br />
    <?php } ?>
    <?php if (!empty($this->usuario->curriculum)) { ?>
        <p style="text-align:justify;"><span class="bold"><?php echo $this->usuario->curriculum ?></span></p>
    <?php } ?>
</div>
