<?= $this->doctype() ?>
<html>
    <head>
        <?php echo $this->headTitle() ?>
        <?php echo $this->headMeta() ?>
        <?php echo $this->headLink() ?>
        <?php echo $this->headStyle() ?>
        <?php echo $this->headScript() ?>
    </head>
    <body>
        <div id="header">
            <h1 id="banner">jornadas de seguridad informática</h1>
            <div class="nav">
                <?php echo $this->placeholder('menu') ?>
            </div>
        </div>
        <div id="main">
            <div id="content">
                <?php echo $this->placeholder('messages') ?>
                <?php echo $this->layout()->content ?>
            </div>
        </div>
        <div id="footer">
            <div class="nav">
                <?php echo $this->placeholder('footer') ?>
            </div>
        </div>
    </body>
</html>
