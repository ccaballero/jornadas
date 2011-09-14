<?php if ($this->preview) { ?>
    <?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
        'pwd' => '~',
        'cmd' => 'countdown',
        'sudo' => false,
        'user' => $this->user,
        'role' => $this->role,
    )) ?>
    <br />
    Para el comienzo de las segundas jornadas de seguridad informática faltan:
    <br />
    <br />

    <script type="text/javascript">$(function(){$('#counter').countdown({image:'/media/digits.png',startTime:'<?php echo $this->countdown ?>'});});</script>
    <div id="countdown">
        <div id="counter"></div>
        <div class="desc">
            <div class="days">Días</div>
            <div class="hours">Horas</div>
            <div class="minutes">Minutos</div>
            <div class="seconds">Segundos</div>
        </div>
    </div>

    <br />
<?php } ?>

<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => '_',
    'sudo' => false,
    'user' => $this->user,
    'role' => $this->role,
)) ?>
