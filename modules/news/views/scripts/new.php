<div class="new">
    <div class="title">
        <span class="bold blue"><?php echo $this->new->title ?></span><br />
        <span class="plain"><?php echo $this->author->getFullname() ?></span>
        <div style="float:right;">
            <?php echo $this->timestamp($this->new->tsregister) ?>
            <?php if ($this->author->ident == $this->user->ident) { ?>
                <a class="bold magenta" href="<?php echo $this->url(array('new' => $this->new->ident), 'news_new_edit') ?>">[editar]</a>
            <?php } ?>
        </div>
    </div>
    <div class="description">
        <div style="float: left; width: 128px; margin: 0.5em 0.8em 0em 0.3em;">
            <img src="/icon.php?size=256&hash=<?php echo $this->author->getHash() ?>" width="128px" alt="" title="" />
        </div>
        <p style="text-align:justify;"><?php echo $this->specialEscape($this->escape($this->new->text)) ?></p>
    </div>
</div>
