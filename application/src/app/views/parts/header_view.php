<header class="header_container">
    <ul class="menu_user">
        <li><a href="<?= $this->contact['href']?>" class="telefono"><?= $this->contact['name']?></a></li>
        <?php foreach($this->userOptions as $uOpt):?>
            <li><a href="<?= $uOpt['href']?>" target="_self" class="user_opt"><?=$uOpt['name']?></a></li>
        <?php endforeach; ?>
    </ul>

    <nav>
        <h1 class="logotipo">
            <a href="../" target="_self">Dental Medical Group</a>
        </h1>
        <!-- <a href="#" class="hamburguesa">&#9776;</a> -->
        <ul class="main_menu main_menu_cerrado">
            <?php foreach($this->menuOptions as $mOpt):?>
                <li class="main_opt"><a href="<?= $mOpt['href']?>" target="_self" ><?=$mOpt['name']?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>