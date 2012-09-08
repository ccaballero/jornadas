<div class="aureal">
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
