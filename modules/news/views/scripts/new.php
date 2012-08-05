<div class="post">
    <h2><a href="<?php echo $this->url(array('new' => $this->new->ident), 'news_new_view') ?>"><?php echo $this->new->title ?></a></h2>
    <div class="photo">
        <img src="<?php echo $this->url(array('username' => $this->author->username, 'size' => 64), 'users_user_nineblock') ?>"
             alt="<?php echo $this->author->getFullname() ?>"
             title="<?php echo $this->author->getFullname() ?>"
             width="96" />
    </div>
    <p><?php echo $this->specialEscape($this->escape($this->new->text)) ?></p>
    <div class="time">
        <span class="month"><?php echo $this->translate($this->timestamp($this->new->tsregister, 'F')) ?></span><span class="day"><?php echo $this->timestamp($this->new->tsregister, 'd') ?></span>
    </div>
    <div class="tools">
        <?php if ($this->author->ident == $this->user->ident) { ?>
            <a href="<?php echo $this->url(array('new' => $this->new->ident), 'news_new_edit') ?>">[editar]</a>
        <?php } ?>
    </div>
</div>
