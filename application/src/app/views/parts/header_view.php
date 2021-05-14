<header>
    <a href="<?= $this->contact['href']?>"><?= $this->contact['name']?></a>
    <ul>        
        <?php foreach($this->userOptions as $uOpt):?>
            <li><a href="<?= $uOpt['href']?>" target="_self"><?=$uOpt['name']?></a></li>
        <?php endforeach; ?>
    </ul>

    <nav>
        <a href="../" target="_self">
            <h1>Dental Medical Group</h1>
        </a>
        <a href="#">&#9776;</a>
        <ul>
            <?php foreach($this->menuOptions as $mOpt):?>
                <li><a href="<?= $mOpt['href']?>" target="_self" ><?=$mOpt['name']?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>