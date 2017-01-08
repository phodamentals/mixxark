<!DOCTYPE html>
<html lang="en">


<?php include 'header.php';?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class='OswaldFont'>Contact Us</h1>
                <?php 
                $action=$_REQUEST['action']; 
                if ($action=="")    /* display the contact form */ 
                    { 
                    ?> 
                    <form  action="" method="POST" enctype="multipart/form-data"> 
                    <input type="hidden" name="action" value="submit"> 
                    Your name:<br> 
                    <input name="name" type="text" value="" size="30" class='form-control'/><br> 
                    Your email:<br> 
                    <input name="email" type="text" value="" size="30" class='form-control'/><br> 
                    Your message:<br> 
                    <textarea name="message" rows="7" cols="30" class='form-control'></textarea><br> 
                    <input type="submit" value="Send email"/> 
                    </form> 
                    <?php 
                    }  
                else                /* send the submitted data */ 
                    { 
                    $name=$_REQUEST['name']; 
                    $email=$_REQUEST['email']; 
                    $message=$_REQUEST['message']; 
                    if (($name=="")||($email=="")||($message=="")) 
                        { 
                        echo "All fields are required, please fill <a href=\"\">the form</a> again."; 
                        } 
                    else{         
                        $from="From: $name<$email>\r\nReturn-path: $email"; 
                        $subject="Question from Mixxark.com"; 
                        mail("phodamentals@gmail.com", $subject, $message, $from); 
                        echo "Email sent!"; 
                        } 
                    }   
                ?> 
            </div>
        </div>
        <!-- /.row -->
        <?php include 'footer.php';?>
            </div>
</body>

    <!-- /.container -->



</html>
