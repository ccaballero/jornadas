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
            <div class="nav">
                <?php echo $this->placeholder('menu') ?>
            </div>
            <div id="main">
                <div id="content">
                    <?php echo $this->placeholder('messages') ?>
                    <?php echo $this->layout()->content ?>
                </div>
            </div>
            <div id="footer"><?php echo $this->placeholder('footer') ?></div>
        </div>
        <div id="binary"><?php echo $this->tile('0123456789ABCDEF', pow(2, 14), 6) ?></div>
    </body>
</html>
