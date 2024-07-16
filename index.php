
<?php



    include "model/product.php";
    include "model/category.php";
    include "global.php";
    include "controller/ControllerHome/HomeControl.php";
    include "controller/ControllerHome/ProductControl.php";


    
    include "views/header.php";

    if ((isset($_GET['act']))&&($_GET['act']!="")) {
        $act = $_GET['act'];
        switch ($act) {
            case 'gioithieu':
           
                include "views/gioithieu.php";
                break;
            // -------------------------- User ------------------------------------------------------
            case 'form_login':
           
                include "views/login.php";
                break;
            case 'login':
                login();   
                break;
            case 'logout':
                logout();
                break;
            case 'register':
                include "views/signup.php";
                break;
            case 'signup':
                signup();
                break;

           
            default:
                include "views/home.php";
                break;
            
        }

    }
    include "views/footer.php";
?>