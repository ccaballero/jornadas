<div class="tasks">
<?php if ($this->allowed('exhibitions:add')) { ?>
<a href="<?php echo $this->url(array(), 'exhibitions_exhibition_add') ?>">+exposición</a>
<?php } ?>
<?php if ($this->allowed('exhibitor:add')) { ?>
    <a href="<?php echo $this->url(array(), 'users_add_exhibitor') ?>">+expositor</a>
<?php } ?>
</div>

<?php if (count($this->exhibitions) <> 0) { ?>
    <?php foreach($this->exhibitions as $exhibition) { ?>
        <?php echo $this->partial('exhibitions/views/scripts/exhibition.php', array('exhibition' => $exhibition[0], 'exhibitors' => $exhibition[1])) ?>
    <?php } ?>
<?php } ?>
