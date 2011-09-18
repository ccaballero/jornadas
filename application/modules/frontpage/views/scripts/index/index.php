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

<?php echo $this->partial('frontpage/views/scripts/index/_tools_news.php', array('role' => $this->role, 'user' => $this->user)); ?>
<?php if (count($this->news) <> 0) { ?>
    <?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
        'pwd' => '~',
        'cmd' => 'cat /noticias/*',
        'sudo' => false,
        'user' => $this->user,
        'role' => $this->role,
    )) ?>
    <br/>

    <?php foreach ($this->news as $new) { ?>
        <?php echo $this->partial('news/views/scripts/new.php', array('new' => $new, 'author' => $new->getAuthor(), 'user' => $this->user)) ?>
    <?php } ?>
<?php } ?>

<?php echo $this->partial('frontpage/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => '_',
    'sudo' => false,
    'user' => $this->user,
    'role' => $this->role,
)) ?>
