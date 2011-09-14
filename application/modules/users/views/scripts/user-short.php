<tr>
    <?php /*<td><?php echo str_pad($this->count, 3, '0', STR_PAD_LEFT) ?></td>*/ ?>
    <td>drwxr-xr-x</td>
    <td>2</td>
    <td><?php echo $this->user->username ?></td>
    <td><?php echo $this->user->username ?></td>
    <td>4096</td>
    <td><?php echo $this->timestamp($this->user->tsregister) ?></td>
    <td><a class="<?php if ($this->user->role == 'exhibitor') { echo 'magenta'; } else if ($this->user->role == 'organizer') { echo 'cyan'; } else { echo 'yellow'; } ?>" href="<?php echo $this->url(array('user' => $this->user->username), 'users_user_view') ?>"><?php echo $this->user->getFullname() ?></a></td>
</tr>
