<?php $this->placeholder('messages')->captureStart() ?>
<?php if (!empty($this->messages)) { ?>
    <?php foreach ($this->messages as $message) { ?>
        <p class="message"><?php echo $message ?></p>
    <?php } ?>
<?php } ?>
<?php $this->placeholder('messages')->captureEnd() ?>
