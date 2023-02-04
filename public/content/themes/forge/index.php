<?php
if(is_singular()) {
    echo wp_forge()->view->render('layouts.singular', ['post' => wp_forge()->loop->getPost()]);
}
elseif(is_search()) {
    echo wp_forge()->view->render('layouts.search');
}
elseif(is_archive()) {
    echo wp_forge()->view->render('layouts.archive');
}
else {
    echo wp_forge()->view->render('layouts.homepage');
}

?>