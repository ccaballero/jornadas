<p>Ahora que habeis decidido verificar tu información, recuerda que lo que aqui escribas,
será en ultima instancia lo que defina tu identidad, si tienes algún inconveniente respecto
al título que ostentais, deberás ir al scesi a corregir tal asunto en la brevedad posible.</p>

<?php if ($this->config->system->credentials) { ?>
<div class="aureal" style="border: 1px solid #000000;">
    <img style="position:absolute; top:30px; left:30px;" src="<?php echo $this->url(array(), 'profile_nineblock') ?>" alt="9block" title="9block" width="150px" />
    <img style="position:absolute; top:30px; right:30px;" src="<?php echo $this->url(array(), 'profile_qr') ?>" alt="QRCode" title="QRCode" width="150px" />

    <dl style="position:absolute; top:210px; left:60px; width:500px; height:70px;">
        <dt>Nombre:</dt>
        <dd><?php echo $this->user->getFullName() ?></dd>
        <dt>Usuario:</dt>
        <dd><?php echo $this->user->username ?></dd>
        <dt>Clave:</dt>
        <dd><?php echo $this->user->hash ?></dd>
    <?php if (!empty($this->user->apikey)) { ?>
        <dt>API Key:</dt>
        <dd><?php echo $this->user->apikey ?></dd>
    <?php } ?>
    </dl>

    <img style="position:absolute; bottom:10px; right:20px;" src="/media/scesi.png" alt="scesi" title="scesi" width="65px" />
</div>
<?php } ?>

<?php echo $this->form ?>
