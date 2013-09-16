<?php echo $this->doctype() ?>
<html>
    <head>
        <?php echo $this->headTitle() ?>
        <?php echo $this->headMeta() ?>
        <?php echo $this->headLink() ?>
        <?php echo $this->headStyle() ?>
        <?php echo $this->headScript() ?>
    </head>
    <body>
        <div id="wrapper">
            <header>
                <h1>III JORNADAS NACIONALES DE SEGURIDAD INFORMÁTICA</h1>
            </header>
            <nav><?php echo $this->placeholder('menu') ?></nav>
            <div class="clear"></div>
            <?php echo $this->layout()->content ?>
            <footer>
                <ul>
                    <li><a href="">SCESI</a></li>
                </ul>
            </footer>
        </div>
    </body>
</html>
