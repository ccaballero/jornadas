<?php if ($this->preview) { ?>
    <script type="text/javascript">
        $(function(){
            $('#counter').countdown({
                image:'<?php echo $this->baseUrl ?>/media/digits.png',
                startTime:'<?php echo $this->countdown ?>'
            });
        });
    </script>
    <div id="countdown">
        <div id="counter"></div>
        <div class="desc">
            <div class="days">Días</div>
            <div class="hours">Horas</div>
            <div class="minutes">Minutos</div>
            <div class="seconds">Segundos</div>
        </div>
    </div>
<?php } ?>

<a style="float:right; margin: 0.1em;" href="<?php echo $this->url(array(), 'news_rss') ?>"><img src="/media/feed.png" /></a>
<?php if (!empty($this->facebook)) { ?>
<a style="float:right; margin: 0.1em;" href="<?php echo $this->url(array(), 'news_rss') ?>"><img src="/media/facebook.png" /></a>
<?php } ?>

<div class="tasks">
<?php if ($this->allowed('new:add')) { ?>
<a href="<?php echo $this->url(array(), 'news_new_add') ?>">+noticia</a>
<?php } ?>
</div>

<?php if (count($this->news) <> 0) { ?>
    <?php foreach ($this->news as $new) { ?>
        <?php echo $this->partial('news/views/scripts/new.php', array('new' => $new, 'author' => $new->getAuthor(), 'user' => $this->user)) ?>
    <?php } ?>
<?php } ?>
