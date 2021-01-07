<?php
   session_start(['name'=>'SC']);
        session_unset();
              session_destroy();

	header("Location:../");
 ?>