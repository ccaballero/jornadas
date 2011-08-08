<tr>
    <td>drwxr-xr-x</td>
    <td>2</td>
    <td><?php echo $this->exposicion->username ?></td>
    <td><?php echo $this->exposicion->username ?></td>
    <td>4096</td>
    <td><?php echo $this->timestamp($this->exposicion->tsregister) ?></td>
    <td><a class="blue" href="<?php echo $this->url(array('exposicion' => $this->exposicion->url), 'exposiciones_exposicion_ver') ?>"><?php echo $this->exposicion->title ?></a></td>
</tr>
