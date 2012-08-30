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
        <div id="header">
            <div style="width:960px; margin: 0px auto;">
                <div class="auth"><?php echo $this->placeholder('auth') ?></div>
            </div>
        </div>
        <div class="nav"><div style="width:960px; margin: 0px auto;">
            <?php echo $this->placeholder('menu') ?>
        </div></div>
        <div id="main">
            <div id="content">
                <?php echo $this->placeholder('messages') ?>
                <?php echo $this->layout()->content ?>
            </div>
            <div class="nav"><?php echo $this->placeholder('footer') ?></div>
        </div>
        <div id="footer">&nbsp;</div>
    </body>
</html>
