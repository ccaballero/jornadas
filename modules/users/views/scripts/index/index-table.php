<h2><?php echo $this->role ?></h2>
<?php if ($this->capacity != -1) { ?>
<p>Capacidad maxima establecida: <?php echo $this->capacity ?></p>
<p>Total <?php echo $this->role ?>: <?php echo $this->count ?></p>
<?php } ?>

<table>
    <tr>
        <th style="width:30px">&nbsp;</th>
        <th>Nombre Completo</th>
        <?php if ($this->allowed('view:hash')) { ?><th>Hash</th><?php } ?>
    </tr>
<?php foreach ($this->users as $user) { ?>
    <tr class="<?php echo $this->cycle(array("even", "odd"))->next()?>">
        <td><input type="checkbox" name="users[]" value="<?php echo $user->ident ?>" /></td>
        <td>
        <?php if ($this->allowed('view:organizer')) { ?>
            <a href="<?php echo $this->url(array('username' => $user->username), 'users_user_view') ?>">
        <?php } ?>
            <?php echo $user->getFullname() ?>
        <?php if ($this->allowed('view:organizer')) { ?>
            </a>
        <?php } ?>
        </td>
    <?php if ($this->allowed('view:hash')) { ?>
        <td class="center"><?php echo $user->hash ?></td>
    <?php } ?>
    </tr>
<?php } ?>
</table>
