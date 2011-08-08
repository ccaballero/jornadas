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
        <header>
            <h1>jornadas de seguridad</h1>
            <nav>
                <?php echo $this->placeholder('menu') ?>
            </nav>
        </header>
        <section id="main">
            <p>
                <?php echo $this->placeholder('messages') ?>
                <?php echo $this->layout()->content ?>
            </p>
        </section>
        <footer>
            <nav>
                <?php echo $this->placeholder('footer') ?>
            </nav>
        </footer>
    </body>
</html>
