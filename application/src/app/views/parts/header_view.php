<?php foreach($this->userOptions as $opt):?>
    <ul>
        <li><a href="<?= $opt['href']?>"><?=$opt['name']?></a></li>
    </ul>
<?php endforeach; ?>