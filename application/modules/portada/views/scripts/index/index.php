<?php if ($this->preview) { ?>
    <?php echo $this->partial('portada/views/scripts/prompt.php', array(
        'pwd' => '~',
        'cmd' => 'countdown',
        'sudo' => false,
        'user' => $this->user,
        'role' => $this->role,
    )) ?>
    Para el comienzo de las jornadas faltan:
    <br />
    <br />

    <script type="text/javascript">
    $(function(){
        $('#counter').countdown({
            image: '/media/digits.png',
            startTime: '<?php echo $this->countdown ?>'
        });
    });
    </script>
    <style type="text/css">
    .cntSeparator {
        margin: 10px 10px;
    }
    .desc {
        margin: 7px 3px;
    }
    .desc div {
        float: left;
        font-family: Arial;
        width: 106px;
        margin-right: 30px;
        font-size: 13px;
        font-weight: bold;
        color: #000;
    }
    </style>

    <div style="margin: 0pt auto; width: 550px; height: 105px; padding-left: 10px; padding-top: 10px; background-color: #ffffff; -moz-border-radius: 10px;">
        <div id="counter"></div>
        <div class="desc">
            <div>Días</div>
            <div>Horas</div>
            <div>Minutos</div>
            <div>Segundos</div>
        </div>
    </div>

    <br />
<?php } ?>

<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => '_',
    'sudo' => false,
    'user' => $this->user,
    'role' => $this->role,
)) ?>
