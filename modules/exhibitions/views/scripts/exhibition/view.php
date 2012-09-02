<h2 style="display: block;"><?php echo $this->exhibition->title ?></h2>
<?php if (count($this->exhibitors) <> 0) { ?>
    <p><?php if (count($this->exhibitors) == 1) { ?><span class="bold">Expositor:</span><?php } else { ?><span class="bold">Expositores:</span><?php } ?></p>
    <dl>
    <?php foreach ($this->exhibitors as $this->exhibitor) { ?>
        <dt><?php echo $this->exhibitor->getFullname() ?></dt>
        <dd><?php echo $this->exhibitor->getCurriculum() ?></dd>
    <?php } ?>
    </dl>
<?php } ?>
