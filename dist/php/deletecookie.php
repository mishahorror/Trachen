<?php  setcookie("username", "", time()-3600,"/");
                 setcookie("user", "", time()-3600,"/");
                 setcookie("email", "", time()-3600,"/");
                 setcookie("img", "", time()-3600,"/");
                 header("Location: /test/dist/index.php");
                 ?>