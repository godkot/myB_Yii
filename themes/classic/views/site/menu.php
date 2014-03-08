<?php
/**
 * Created by PhpStorm.
 * User: KoT
 * Date: 12.02.14
 * Time: 10:54
 */
?>
<nav class="nav nav__primary clearfix">
                                    <?php
                                        $this->widget('application.extensions.superfish.RSuperfish', array(
                                            'items'=>$menuItems,
                                        ));

                                    ?>
</nav>