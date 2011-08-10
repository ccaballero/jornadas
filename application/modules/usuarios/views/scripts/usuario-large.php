<div style="float:left; width:145px;">
    <img style="border: 3px solid #FFFFFF;" src="/media/usuario.png" width="128" height="128" alt="" title="" />
</div>
<div style="min-height: 142px;">
    <span class="red bold"><?php echo $this->usuario->fullname ?></span>
    <br />
    <span class="red bold">=======================================================================================</span>
    <br />
    <?php if (!empty($this->usuario->curriculum)) { ?>
        <p style="text-align:justify;"><span class="bold"><?php echo $this->usuario->curriculum ?></span></p>
    <?php } ?>
</div>
