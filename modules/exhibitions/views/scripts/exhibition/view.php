<h2><?php echo $this->exhibition->title ?></h2>

<div class="photo">
<?php if (count($this->exhibitors) <> 0) { ?>
    <?php foreach ($this->exhibitors as $this->exhibitor) { ?>
    <img src="<?php echo $this->url(array('username' => $this->exhibitor->username, 'size' => 64), 'users_user_nineblock') ?>"
            alt="<?php echo $this->exhibitor->getFullname() ?>"
            title="<?php echo $this->exhibitor->getFullname() ?>"
            width="96" />
    <?php break; ?>
    <?php } ?>
<?php } ?>
</div>

<?php if (count($this->exhibitors) <> 0) { ?>
    <p><?php if (count($this->exhibitors) == 1) { ?><span class="bold">Expositor:</span><?php } else { ?><span class="bold">Expositores:</span><?php } ?></p>
    <dl>
    <?php foreach ($this->exhibitors as $this->exhibitor) { ?>
        <dt><?php echo $this->exhibitor->getFullname() ?></dt>
        <dd><?php echo $this->exhibitor->getCurriculum() ?></dd>
    <?php } ?>
    </dl>
<?php } ?>
<br />
<p><?php echo $this->specialEscape($this->exhibition->abstract) ?></p>
