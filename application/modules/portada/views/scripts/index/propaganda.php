<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => 'ls -lh /afiches',
    'sudo' => false,
    'user' => $this->user,
    'role' => $this->role,
)) ?>
<br />

total 3,6M
</p>
<table>
    <tr><td>-rw-r--r--</td><td>1</td><td>guest</td><td>guest</td><td>422K</td><td>2011-09-01 23:29</td><td><a class="bold magenta" href="/media/afiches/afiche.jpg">afiche.jpg</a></td></tr>
    <tr><td>-rw-r--r--</td><td>1</td><td>guest</td><td>guest</td><td>384K</td><td>2011-09-01 23:29</td><td><a class="bold red" href="/media/afiches/afiche.tar.gz">afiche.tar.gz</a></td></tr>
    <tr><td>-rw-r--r--</td><td>1</td><td>guest</td><td>guest</td><td>575K</td><td>2011-09-01 23:29</td><td><a class="bold magenta" href="/media/afiches/triptico_exterior.jpg">triptico_exterior.jpg</a></td></tr>
    <tr><td>-rw-r--r--</td><td>1</td><td>guest</td><td>guest</td><td>868K</td><td>2011-09-01 23:29</td><td><a class="bold magenta" href="/media/afiches/triptico_interior.jpg">triptico_interior.jpg</a></td></tr>
    <tr><td>-rw-r--r--</td><td>1</td><td>guest</td><td>guest</td><td>1,4M</td><td>2011-09-01 23:29</td><td><a class="bold red" href="/media/afiches/triptico.tar.gz">triptico.tar.gz</a></td></tr>
</table>
<br />
<p>
<?php echo $this->partial('portada/views/scripts/prompt.php', array(
    'pwd' => '~',
    'cmd' => '_',
    'sudo' => false,
    'user' => $this->user,
    'role' => $this->role,
)) ?>
