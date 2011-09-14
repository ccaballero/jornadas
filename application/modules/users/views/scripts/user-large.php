<div style="float: left; width: 148px; margin-left: 16px;">
    <img src="/icon.php?size=256&hash=<?php echo sha1($this->user->getFullname()) ?>" width="128px" alt="" title="" />
</div>

<div style="min-height: 142px;">
    <span class="red bold"><?php echo $this->user->getFullname() ?></span>
    <br />
    <?php if ($this->role == 'admin') { ?>
        <span><?php echo $this->user->hash ?></span>
        <br />
    <?php } ?>
</div>
