<?php $this->placeholder('menu')->captureStart() ?>
<ul>
    <li>
        <a href="<?php echo $this->url(array(), 'news_rss') ?>"
           target="_BLANK">
            <img src="/media/feed.png" alt="RSS" title="RSS" /></a>
    </li>
<?php if (!empty($this->facebook)) { ?>
    <li>
        <a href="<?php echo $this->facebook ?>"
           target="_BLANK">
            <img src="/media/facebook.png" alt="Facebook" title="Facebook" /></a>
    </li>
<?php } ?>
    <li<?php echo $this->isActive($this->route, 'frontpage') ? ' class="active"' : '' ?>>
        <a href="<?php echo $this->url(array(), 'frontpage') ?>"
           accesskey="1">Inicio</a>
    </li>
<?php if ($this->config->system->exhibitions) { ?>
    <li<?php echo $this->isActive($this->route, 'exhibitions') ? ' class="active"' : '' ?>>
        <a href="<?php echo $this->url(array(), 'exhibitions') ?>"
           accesskey="2">Exposiciones</a>
    </li>
<?php } ?>
<?php if ($this->config->system->sponsors) { ?>
    <li<?php echo $this->isActive($this->route, 'users') ? ' class="active"' : '' ?>>
        <a href="<?php echo $this->url(array(), 'users') ?>"
           accesskey="3">Participantes</a>
    </li>
<?php } ?>
<?php if ($this->config->system->sponsors) { ?>
    <li<?php echo $this->isActive($this->route, 'sponsors') ? ' class="active"' : '' ?>>
        <a href="<?php echo $this->url(array(), 'sponsors') ?>"
           accesskey="4">Auspiciadores</a>
    </li>
<?php } ?>
<?php if ($this->allowed('activity:view')) { ?>
    <li<?php echo $this->isActive($this->route, 'activities') ? ' class="active"' : '' ?>>
        <a href="<?php echo $this->url(array(), 'activities') ?>"
           accesskey="3">Actividades</a>
    </li>
<?php } ?>
</ul>
<?php $this->placeholder('menu')->captureEnd() ?>

<?php /*
<ul>
    <li><a href="#conferencias">Conferencias</a></li>
    <li><a href="#talleres">Talleres</a></li>
    <li><a href="#auspiciadores">Auspiciadores</a></li>
</ul> */ ?>
