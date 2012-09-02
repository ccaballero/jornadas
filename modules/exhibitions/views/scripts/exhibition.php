<div class="post">
    <h2 style="display: block; width: 906px;"><a href="<?php echo $this->url(array('exhibition' => $this->exhibition->url), 'exhibitions_exhibition_view') ?>"><?php echo $this->exhibition->title ?></a></h2>
    <?php if (count($this->exhibitors) <> 0) { ?>
        <p><?php if (count($this->exhibitors) == 1) { ?><span class="bold">Expositor:</span><?php } else { ?><span class="bold">Expositores:</span><?php } ?></p>
        <dl>
        <?php foreach ($this->exhibitors as $this->exhibitor) { ?>
            <dt><?php echo $this->exhibitor->getFullname() ?></dt>
            <dd><?php echo $this->exhibitor->getCurriculum() ?></dd>
        <?php } ?>
        </dl>
    <?php } ?>
</div>

<?php if ($this->exhibition->hasVideo()) { ?><div class="video">v</div><?php } ?>
<?php if ($this->exhibition->hasAudio()) { ?><div class="audio">a</div><?php } ?>
<?php if ($this->exhibition->hasSlideshow()) { ?><div class="slideshow">p</div><?php } ?>
