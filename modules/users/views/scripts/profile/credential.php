<h2>Credencial</h2>

<style>
    .aureal strong {
        font-size: 23px;
        font-weight: bold;
        text-align: center;
        color: #0000FF;
    }
        
    .aureal dl dt, .aureal dl dd {
        font-size: 14px;
    }
    
    .aureal dl dt {
        width: 120px;
        margin: 0px;
        font-weight: bold;
        color: #0000FF;
    }
    
    .aureal dl dd {
        margin-left: 130px;
    }
</style>

<div class="aureal" style="margin: 0 auto;">
    <img style="position:relative; top:30px; left:60px;" src="<?php echo $this->url(array(), 'profile_nineblock') ?>" alt="9block" title="9block" width="150px" />
    <img style="position:relative; top:30px; left:175px;" src="<?php echo $this->url(array(), 'profile_qr') ?>" alt="QRCode" title="QRCode" width="150px" />
    <br />
    <strong style="position:relative; display:block; top:50px; left:20px; width:500px;"><?php echo $this->title ?></strong>
    <dl style="position:relative; top:75px; left:20px; width:500px; height:70px;">
        <dt>Nombre:</dt>
        <dd><?php echo $this->user->getFullName() ?></dd>
        <dt>Usuario:</dt>
        <dd><?php echo $this->user->username ?></dd>
        <dt>Clave:</dt>
        <dd><?php echo $this->user->hash ?></dd>
    </dl>
    <img style="position:relative; top:25px; left:445px;" src="/media/scesi.png" alt="scesi" title="scesi" width="65px" />
</div>
<br />
<br />
