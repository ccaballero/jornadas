<form method="post" action="">

<?php echo $this->partial('index/index-tools.php',
    array(
        'max_organizers' => $this->max_organizers,
        'count_organizers' => $this->count_organizers,
        'max_assistants' => $this->max_assistants,
        'count_assistants' => $this->count_assistants,
    )) ?>

<?php echo $this->partial('index/index-table.php',
    array(
        'role' => 'Organizadores',
        'capacity' => $this->max_organizers,
        'count' => $this->count_organizers,
        'users' => $this->organizers,
    )) ?>
<br />
<?php echo $this->partial('index/index-table.php',
    array(
        'role' => 'Protocolo',
        'capacity' => $this->max_protocols,
        'count' => $this->count_protocols,
        'users' => $this->protocols,
    )) ?>
<br />
<?php echo $this->partial('index/index-table.php',
    array(
        'role' => 'Asistentes',
        'capacity' => $this->max_assistants,
        'count' => $this->count_assistants,
        'users' => $this->assistants,
    )) ?>

<?php echo $this->partial('index/index-tools.php',
    array(
        'max_organizers' => $this->max_organizers,
        'count_organizers' => $this->count_organizers,
        'max_assistants' => $this->max_assistants,
        'count_assistants' => $this->count_assistants,
    )) ?>

</form>