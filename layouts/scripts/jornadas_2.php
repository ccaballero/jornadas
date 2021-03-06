<?php echo $this->doctype() ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->headTitle() ?>
        <?php echo $this->headMeta() ?>
        <?php echo $this->headLink() ?>
        <?php echo $this->headStyle() ?>
        <?php echo $this->headScript() ?>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div class="auth"><?php echo $this->placeholder('auth') ?></div>
            </div>
            <div id="main">
                <div class="nav">
                    <?php echo $this->placeholder('menu') ?>
                </div>
                <div id="content">
                    <?php echo $this->placeholder('messages') ?>
                    <?php echo $this->layout()->content ?>
                </div>
                <div class="nav inverse"><?php echo $this->placeholder('footer') ?></div>
            </div>
            <div id="footer" />
        </div>
    </body>
</html>
