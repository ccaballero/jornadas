<div class="tasks">
<?php if ($this->allowed('activity:view')) { ?>
<a href="<?php echo $this->url(array(), 'activities') ?>">actividades</a>
<?php } ?>
<?php if ($this->allowed('activity:view')) { ?>
<a href="<?php echo $this->url(array(), 'activities_assign') ?>">estados</a>
<?php } ?>
<?php if ($this->allowed('activity:manage')) { ?>
<a href="<?php echo $this->url(array(), 'activities_manager') ?>">*administrar</a>
<?php } ?>
</div>
