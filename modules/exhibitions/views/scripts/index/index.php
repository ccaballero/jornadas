<?php
/*<div class="tasks">
<?php if ($this->allowed('exhibitions:add')) { ?>
<a href="<?php echo $this->url(array(), 'news_new_add') ?>">+exposición</a>
<?php } ?>
</div>
*/
?>

<?php if (count($this->exhibitions) <> 0) { ?>
    <?php foreach($this->exhibitions as $exhibition) { ?>
        <?php echo $this->partial('exhibitions/views/scripts/exhibition.php', array('exhibition' => $exhibition[0], 'exhibitors' => $exhibition[1])) ?>
    <?php } ?>
<?php } ?>
