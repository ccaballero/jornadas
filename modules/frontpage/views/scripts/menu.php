<?php $this->placeholder('menu')->captureStart() ?>
<ul>
<li<?php echo $this->isActive($this->route, 'frontpage') ? ' class="active"' : '' ?>>
<a accesskey="1" href="<?php echo $this->url(array(), 'frontpage') ?>">inicio</a>
</li>
<?php if ($this->config->system->exhibitions) { ?>
<li<?php echo $this->isActive($this->route, 'exhibitions') ? ' class="active"' : '' ?>>
<a accesskey="2" href="<?php echo $this->url(array(), 'exhibitions') ?>">exposiciones</a>
</li>
<?php } ?>
<?php if ($this->config->system->sponsors) { ?>
<li<?php echo $this->isActive($this->route, 'sponsors') ? ' class="active"' : '' ?>>
<a accesskey="4" href="<?php echo $this->url(array(), 'sponsors') ?>">auspiciadores</a>
</li>
<?php } ?>
<li<?php echo $this->isActive($this->route, 'users') ? ' class="active"' : '' ?>>
<a accesskey="3" href="<?php echo $this->url(array(), 'users') ?>">participantes</a>
</li>
<?php if ($this->allowed('activity:view')) { ?>
<li<?php echo $this->isActive($this->route, 'activities') ? ' class="active"' : '' ?>>
<a accesskey="3" href="<?php echo $this->url(array(), 'activities') ?>">actividades</a>
</li>
<?php } ?>
</ul>
<?php $this->placeholder('menu')->captureEnd() ?>
