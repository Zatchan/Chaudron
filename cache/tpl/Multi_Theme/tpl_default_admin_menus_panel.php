<?php $_result='<nav id="admin-quick-menu">
    <a href="" class="js-menu-button" onclick="open_submenu(\'admin-quick-menu\');return false;" title="' . $_data->get('L_MENUS_MANAGEMENT') . '">
        <i class="fa fa-bars"></i> ' . $_data->get('L_MENUS_MANAGEMENT') . '
    </a>
	<ul>
        <li>
            <a href="menus.php" class="quick-link">' . $_data->get('L_MENUS_MANAGEMENT') . '</a>
        </li>
        <li>
            <a href="links.php" class="quick-link">' . $_data->get('L_ADD_LINKS_MENUS') . '</a>
        </li>
        <li>
            <a href="content.php" class="quick-link">' . $_data->get('L_ADD_CONTENT_MENUS') . '</a>
        </li>
        <li>
            <a href="feed.php" class="quick-link">' . $_data->get('L_ADD_FEED_MENUS') . '</a>
        </li>
    </ul>
</nav>'; ?>