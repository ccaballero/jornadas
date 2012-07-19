<?php $this->placeholder('messages')->captureStart() ?>
<?php if (!empty($this->messages)) { ?>
    <?php foreach ($this->messages as $message) { ?>
        <?php echo $message // echo $this->partial('frontpage/views/scripts/prompt.php', $message) ?>
    <?php } ?>
<?php } ?>
<?php $this->placeholder('messages')->captureEnd() ?>
