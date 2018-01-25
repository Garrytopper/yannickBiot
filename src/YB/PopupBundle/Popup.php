<?php

namespace YB\PopupBundle ;

/**
* 
*/
class Popup
{
    public function alert($message)
    {
        ?>
            <script type="text/javascript">
                var msg='<?PHP echo $message;?>';
                alert('alerte :' + msg);
            </script>
        <?php
    }
}