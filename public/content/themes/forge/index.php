<?php
if(is_singular()) {
    echo wp_forge()->view->render('singular', ['post' => wp_forge()->loop->getPost()]);
}
else {
    echo wp_forge()->view->render('homepage');
}

?>