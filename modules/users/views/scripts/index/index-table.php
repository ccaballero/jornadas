<tr>
    <td colspan="3"><h3><?php echo $this->role ?></h3></td>
</tr>
<?php if ($this->capacity != -1) { ?>
<tr>
    <td>
    <p>Capacidad maxima establecida: <?php echo $this->capacity ?></p>
    <p>Total <?php echo $this->role ?>: <?php echo $this->count ?></p>
    </td>
</tr>
<?php } ?>

    <tr class="nav">
    <?php if ($this->allowed('hash:view') || $this->allowed('apikey:view') || $this->allowed('user:edit')) { ?>
        <th style="width:30px">&nbsp;</th>
    <?php } ?>
        <th>#</th>
        <th>Nombre Completo</th>
        <?php if ($this->allowed('hash:view')) { ?><th>Hash</th><?php } ?>
        <?php if ($this->allowed('apikey:view')) { ?><th>Key</th><?php } ?>
        <?php if ($this->allowed('user:edit')) { ?><th>Editar</th><?php } ?>
    </tr>
<?php foreach ($this->users as $i => $user) { ?>
    <tr class="<?php echo $this->cycle(array("even", "odd"))->next()?>">
    <?php if ($this->allowed('hash:view') || $this->allowed('apikey:view') || $this->allowed('user:edit')) { ?>
        <td><input type="checkbox" name="users[]" value="<?php echo $user->ident ?>" /></td>
    <?php } ?>
        <td><?php echo $i + 1 ?></td>
        <td><?php echo $user->getFullname() ?></td>
    <?php if ($this->allowed('hash:view')) { ?>
        <td class="center"><?php echo $user->hash ?></td>
    <?php } ?>
    <?php if ($this->allowed('apikey:view')) { ?>
        <td class="center">
        <?php if (!empty($user->apikey)) { ?>
            <?php echo $user->apikey ?>
            <a href="<?php echo $this->url(array('username' => $user->username), 'users_remove_apikey') ?>">[-]</a>
        <?php } else { ?>
            <a href="<?php echo $this->url(array('username' => $user->username), 'users_add_apikey') ?>">[+]</a>
        <?php } ?>
        </td>
    <?php } ?>
    <?php if ($this->allowed('user:edit')) { ?>
        <td class="center">[<a href="<?php echo $this->url(array('username' => $user->username), 'users_user_edit') ?>">editar</a>]</td>
    <?php } ?>
    </tr>
<?php } ?>
