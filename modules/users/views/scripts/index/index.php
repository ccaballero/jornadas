<form method="post" action="">

<?php echo $this->partial('index/index-tools.php',
    array(
        'max_organizers'   => $this->max_organizers,
        'count_organizers' => $this->count_organizers,
        'max_protocols'    => $this->max_protocols,
        'count_protocols'  => $this->count_protocols,
        'max_assistants'   => $this->max_assistants,
        'count_assistants' => $this->count_assistants,
        'config' => $this->config,
    )) ?>

<table>
<?php if ($this->config->system->view->administrators) { ?>
<?php echo $this->partial('index/index-table.php',
    array(
        'role' => 'Administradores',
        'capacity' => -1,
        'count' => -1,
        'users' => $this->admins,
    )) ?>
<?php } ?>
<?php if ($this->config->system->view->organizers) { ?>
<?php echo $this->partial('index/index-table.php',
    array(
        'role' => 'Organizadores',
        'capacity' => $this->max_organizers,
        'count' => $this->count_organizers,
        'users' => $this->organizers,
    )) ?>
<?php } ?>
<?php if ($this->config->system->view->exhibitors) { ?>
<?php echo $this->partial('index/index-table.php',
    array(
        'role' => 'Expositores',
        'capacity' => -1,
        'count' => -1,
        'users' => $this->exhibitors,
    )) ?>
<?php } ?>
<?php if ($this->config->system->view->protocols) { ?>
<?php echo $this->partial('index/index-table.php',
    array(
        'role' => 'Protocolo',
        'capacity' => $this->max_protocols,
        'count' => $this->count_protocols,
        'users' => $this->protocols,
    )) ?>
<?php } ?>
<?php if ($this->config->system->view->assistants) { ?>
<?php echo $this->partial('index/index-table.php',
    array(
        'role' => 'Asistentes',
        'capacity' => $this->max_assistants,
        'count' => $this->count_assistants,
        'users' => $this->assistants,
    )) ?>
<?php } ?>
</table>

<?php echo $this->partial('index/index-tools.php',
    array(
        'max_organizers'   => $this->max_organizers,
        'count_organizers' => $this->count_organizers,
        'max_protocols'    => $this->max_protocols,
        'count_protocols'  => $this->count_protocols,
        'max_assistants'   => $this->max_assistants,
        'count_assistants' => $this->count_assistants,
        'config' => $this->config,
    )) ?>
</form>