<?php if (count($this->sponsors) <> 0) { ?>
<h1>Auspiciadores</h1>
<p>Este evento no podría haberse llevado a cabo sin las gentiles y afables colaboraciones de las empresas que mencionamos a continuación, nuestros agradecimientos y el de todos a los que este evento les sea útil para ellos.</p>
<br />
<table class="sponsors">
<?php foreach ($this->sponsors as $sponsor) { ?>
    <tr>
        <td>
            <img src="<?php echo $sponsor->logo ?>" width="150" alt="" title="" />
        </td>
        <td style="vertical-align:top;">
        <?php if (!empty($sponsor->url)) { ?>
            <h2>[<a href="<?php echo $sponsor->url ?>" target="_BLANK"><?php echo $sponsor->label ?></a>]</h2>
        <?php } else { ?>
            <h2><?php echo $sponsor->label ?></h2>
        <?php } ?>
            <p><?php echo $sponsor->text ?></p>
        </td>
    </tr>
<?php } ?>
</table>
<?php } ?>
