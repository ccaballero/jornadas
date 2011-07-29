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
            <nav><?php echo $this->partial('layout/menu.php') ?></nav>
        </header>
        <section><?php echo $this->layout()->content ?></section>
        <footer><nav><?php echo $this->partial('layout/footer.php') ?></nav></footer>
    </body>
</html>
