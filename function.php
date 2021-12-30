<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';
    define ('GUSER','tanmoysharma46@gmail.com');
    define ('GPWD','%%%Tanmoysharma108%%%');

Class busapp
{
    private $conn;

    public function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpassword = "";
        $dbname = "bus_management";

        $this->conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

        if(!$this->conn)
        {
            die("Database connection failed");
        }

    }

    public function admin_login($data)
    {
        $admin_email = $data['admin_email'];
        $admin_password = md5($data['admin_password']);

        $query = "SELECT * FROM admin_info WHERE admin_email='$admin_email' && admin_pass='$admin_password'";
        
        if(mysqli_query($this->conn,$query))
        {
            $admin_info = mysqli_query($this->conn,$query);
            if($admin_info)
            {
                $admin_data=mysqli_fetch_assoc($admin_info);
                if(isset($admin_data['admin_email'])==$admin_email)
                {
                    header("location:admin/dashcondition.php");
                    session_start();
                    $_SESSION['adminid']=$admin_data['id'];
                    $_SESSION['adminname']=$admin_data['admin_name'];
                }
            }
            else
            return "Alert !!";
        }
        
    }
    public function admin_logout()
    {
        unset($_SESSION['adminid']);
        unset($_SESSION['adminname']);
        header("location:../admin.php");
    }

    public function display_bus()
    {
        $query = "SELECT * FROM add_bus";
        $output = ''; 
        if(mysqli_query($this->conn,$query))
        {
            $result = mysqli_query($this->conn,$query);
            $output .= '
            <table>
            <tr>
                <th>Bus Name</th>
                <th>Route</th>
                <th>Travel Date</th>
                <th>Time</th>
                <th>Type</th>
                <th>Picture</th>
                <th></th>
            </tr>
            ';
            while($row=mysqli_fetch_object($result))
            {
                $output .= '
                
                <tr>
                <td>'.$row->bus_name.'</td>
                <td>
                    <p><small><b>From :</b>'.$row->from_route.'</small></p>
                    <p><small><b>To :</b>'.$row->to_route.'</small></p>
                </td>
                <td>'.$row->bus_date.'</td>
                <td>
                    <p><small><b>Departure :</b>'.$row->departure.'</small></p>
                    <p><small><b>Arrival :</b>'.$row->arrival.'</small></p>
                </td>
                <td>'.$row->bus_type.'</td>
                <td> <img style="height:100px;" src="upload/'.$row->picture.'" alt="busimage"> </td>
                <td>

                <div class="dropdown">
                        <button class="btn actionbtn  dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item seatbooking" href="seatbooking.php?status=booking&&id='.$row->bus_id.'">Seat Booking</a>
                            <a class="dropdown-item update" href="#" id="'.$row->bus_id.'">Edit</a>
                            <a class="dropdown-item delete" href="#" id="'.$row->bus_id.'">Delete</a>
                        </div>
                    </div>
                </td>
            </tr> ';
            }
            $output .= ' </table>';
            return $output;
        }
    }

    public function add_bus($busdata)
    {
        $busname = $busdata['busname'];
        $fromroute = $busdata['fromroute'];
        $toroute = $busdata['toroute'];
        $dateroute = $busdata['dateroute'];
        $dtimeroute = $busdata['dtimeroute'];
        $atimeroute = $busdata['atimeroute'];
        $bustype = $busdata['bustype'];
        $picture = $_FILES['picture']['name'];
        $tmp_name = $_FILES['picture']['tmp_name'];

        $query = "INSERT INTO add_bus(bus_name,from_route,to_route,bus_date,departure,arrival,bus_type,picture) VALUES ('$busname','$fromroute','$toroute','$dateroute','$dtimeroute','$atimeroute','$bustype','$picture')";

        if(mysqli_query($this->conn,$query))
        {
            move_uploaded_file($tmp_name,'upload/'.$picture);
        }
    }

    public function show_bus_id($id)
    {
        $query = "SELECT * FROM add_bus WHERE bus_id=$id";
        if(mysqli_query($this->conn,$query))
        {
            $return = mysqli_query($this->conn,$query);
            $fetchdata = mysqli_fetch_assoc($return);
            return $fetchdata;
        }
    }
    

    public function display_bus_id($query)
    {
        if(mysqli_query($this->conn,$query))
        {
            $output[]= ''; 
            if(mysqli_query($this->conn,$query))
            {
                 $result = mysqli_query($this->conn,$query);
                 while($row = mysqli_fetch_assoc($result)) 
                 {
                    $output["busname"] = $row['bus_name'];  
                    $output["fromroute"] = $row['from_route'];
                    $output["toroute"] = $row['to_route'];  
                    $output["dateroute"] = $row['bus_date'];
                    $output["dtimeroute"] = $row['departure'];  
                    $output["atimeroute"] = $row['arrival'];
                    $output["bustype"] = $row['bus_type'];  
                    $output["pictureimage"] ='<img src="upload/'.$row['picture'].'" class="img-thumbnail" width="200" height="auto"/>' ;
                    $output["picture"] = $row['picture'];
                 }
            return json_encode($output);
            }    
        }
    }
    public function update_data($data)
    {
        $busname = $data['busname'];
        $fromroute = $data['fromroute'];
        $toroute = $data['toroute'];
        $dateroute = $data['dateroute'];
        $dtimeroute = $data['dtimeroute'];
        $atimeroute = $data['atimeroute'];
        $bustype = $data['bustype'];
        $picture = $_FILES['picture']['name'];
        $tmp_name = $_FILES['picture']['tmp_name'];

        $query = "UPDATE add_bus SET bus_name = '".$busname."',from_route = '".$fromroute."',to_route = '".$toroute."',bus_date = '".$dateroute."',departure = '".$dtimeroute."',arrival = '".$atimeroute."',bus_type = '".$bustype."',picture ='".$picture."' WHERE bus_id='".$_POST["user_id"]."'";

        if(mysqli_query($this->conn,$query))
        {
            move_uploaded_file($tmp_name,'upload/'.$picture);
            return "update successfull";
        }
    }

    public function delete_data($catch_img,$query,$query1,$query2,$query3)
    {
        if((mysqli_query($this->conn,$query)) && (mysqli_query($this->conn,$query1)) && (mysqli_query($this->conn,$query2)) && (mysqli_query($this->conn,$query3)))
        {
                $delete_info = mysqli_query($this->conn,$catch_img);
                $fetch_delete_info = mysqli_fetch_assoc($delete_info);
                if($fetch_delete_info){
                $img = $fetch_delete_info['picture'];
                unlink('upload/'.$img);}
            
        }
    }
    public function fromautocomplete($query)
    {
        if(mysqli_query($this->conn,$query))
        {
            $result = mysqli_query($this->conn,$query);
            while($row = mysqli_fetch_assoc($result)) 
            {
            echo" <a href='#' class='list-group-item from-item list-group-item-action border-1'>".$row['from_route']."</a> ";
            } 
        }
        else
        echo '<p class="list-group-item border-1">No Record</p>';
    }
    public function toautocomplete($query)
    {
        if(mysqli_query($this->conn,$query))
        {
            $result = mysqli_query($this->conn,$query);
            while($row = mysqli_fetch_assoc($result)) 
            {
            echo" <a href='#' class='list-group-item to-item list-group-item-action border-1'>".$row['to_route']."</a> ";
            } 
        }
        else
        echo '<p class="list-group-item border-1">No Record</p>';
    }
    
    public function bushow($query)
    {
        if(mysqli_query($this->conn,$query))
        {
            $result = mysqli_query($this->conn,$query);
            return $result;
        }
    }


    public function priceshow($query)
    {
        if(mysqli_query($this->conn,$query))
        {
            $result = mysqli_query($this->conn,$query);
            return $result;
        }
    }
    public function sendemail_verify($username,$email,$verify_token)
    {

        // global $error;
        global $error;
        $mail = new PHPMailer();  // create a new object
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 2;  // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true;  // authentication enabled
        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
        $mail->SMTPAutoTLS = false;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
    
        $mail->Username = GUSER;  
        $mail->Password = GPWD;           
        $mail->SetFrom($username);
        $mail->Subject = "here is the subject";
        $email_template ="
        <h2>You have Registered with MyWay</h2>
        <h5>Verify your email addrees to Login with the below given link</h5><br/></br>
        <a href='http://localhost/bus_management/signin.php/verify_email.php?token=$verify_token'>click here</a>
        ";
        $mail->Body = $email_template;
        $mail->AddAddress($email);
        if(!$mail->Send()) {
            $error = 'Mail error: '.$mail->ErrorInfo; 
            return false;
        } else {
            $error = 'Message sent!';
            return true;
        }



    }

    public function adduser($data)
    {
        $username = $data['username'];
        $email = $data['email'];
        $password = md5($data['password']);
<<<<<<< HEAD
        $verify_token = md5(rand());
        $select = mysqli_query($this->conn, "SELECT `email` FROM `users` WHERE `email`='$email'") or exit(mysqli_error($this->conn));
        if(mysqli_num_rows($select)) 
            {
                ?>
            <script>
                alert('This email is already being used');
            </script>
=======
        $select = mysqli_query($this->conn, "SELECT `email`,`username` FROM `users` WHERE `email`='$email' OR `username`='$username'") or exit(mysqli_error($this->conn));
        if(mysqli_num_rows($select)) 
            {
                ?>
                <script>
                    alert('This email or username is already being used');
                </script>
>>>>>>> main
            <?php }
        else
            {
                $query = "INSERT INTO `users`(`username`, `email`, `password`,`token`) VALUES ('$username','$email','$password','$verify_token')";
                
                if(mysqli_query($this->conn,$query))
                    {
                        $status = "Accout Created.Please verify your email";
                        return $status;
                        $this->sendemail_verify("$username","$email","$verify_token");
                    }
                else
                    {
                        return "Failed";
                    }
            }
    }
    public function user_login($data)
    {
        $email = $data['emailsignin'];
        $password = md5($data['passwordsignin']);

        $query = "SELECT * FROM users WHERE email='$email' && password='$password'";
        
        if(mysqli_query($this->conn,$query))
        {
            $user_info = mysqli_query($this->conn,$query);
            if($user_info)
            {
                
                $user_data=mysqli_fetch_assoc($user_info);

                if(isset($user_data))
                {
                    if($user_data['email'] == $email)
                {
                    header("location:index.php");
                    session_start();
                    $_SESSION['id'] = $user_data['id'];
                    $_SESSION['username'] = $user_data['username'];
                }
                }
                else
                return "Please fill up correctly";
            }
        }
    }
    public function user_logout()
    {
        unset($_SESSION['id']);
        unset($_SESSION['uname']);
        header("location:signin.php");
    }


    public function show_user()
    {
        $query = "SELECT * FROM users";
        $output = ''; 
        if(mysqli_query($this->conn,$query))
        {
            $result = mysqli_query($this->conn,$query);
            $output .= '
            <table>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
            ';
            while($row=mysqli_fetch_object($result))
            {
                $output .= '
                
                <tr>
                <td>'.$row->username.'</td>
                <td>'.$row->email.'</td>
                <td>'.$row->password.'</td>
            </tr> ';
            }
            $output .= ' </table>';
            return $output;
        }
    }
    public function add_price($data)
    {
        $id = $data['id'];
        $name = $data['bus_name'];
        $seatnumber = $data['seatnumber'];
        $price = $data['price'];

        $query = "INSERT INTO bus_inside(bus_id,bus_name,price,seatsize)VALUES($id,'$name',$price,$seatnumber)";
        if(mysqli_query($this->conn,$query))
        {
            echo "success price";
        }
    }


    public function add_boarding($data)
    {
        $id = $data['id'];
        $name = $data['bus_name'];
        $bname = $data['name'];
        $number = count($bname);
        if($number > 0)  
    {  
      for($i=0; $i<$number; $i++)  
      {  
           if(trim($bname[$i] != ''))  
           {  
                $sql = "INSERT INTO bus_boarding(bus_id,bus_name,boarding_pnt) VALUES( $id,'$name','$bname[$i]')";  
                if(mysqli_query($this->conn,$sql))
                {
                    echo "success boarding";
                } 
           }  
      }   
    }  
    }

    public function view_seats($id)
    {
        $query="SELECT * FROM bus_inside WHERE bus_id=$id";
        if(mysqli_query($this->conn,$query))
        {
            $seat = mysqli_query($this->conn,$query);
            return $seat;
        }
<<<<<<< HEAD
=======
    }
    
    public function getpdf($a,$b)
    {
        $query="SELECT * FROM seat WHERE bus_id=$a AND user_id =$b";
        if(mysqli_query($this->conn,$query))
        {
            $info = mysqli_query($this->conn,$query);
            return $info;
        }
>>>>>>> main

    }

    public function add_seat($data)
    {
        $busid=$data['busidno'];
        $busname=$data['busnames'];
        $userid=$data['useridno'];
        $username=$data['usernames'];
        $boarding = $data['busboarding'];
        $seatno = $data['seatno'];
        $amount = $data['seatamount'];
        $seatnoe = $data['seatnoe'];

        $select = mysqli_query($this->conn, "SELECT `bus_id`,`user_id` FROM `seat` WHERE `bus_id`='$busid' AND `user_id`='$userid'") or exit(mysqli_error($this->conn));
        if(mysqli_num_rows($select)) 
            {
            ?>
                <script>
                    alert('you can not booked seat now');
                </script>
            <?php }
        else
        {

            $query = "INSERT INTO seat(bus_id,bus_name,user_id,user_name,boardingpnt,seatno,amount,seatnoextra) VALUES($busid,'$busname',$userid,'$username','$boarding','$seatno','$amount','$seatnoe')";

            if(mysqli_query($this->conn , $query))//query send
            {
                $query1="SELECT * FROM seat WHERE bus_id=$busid AND user_id =$userid";
                if(mysqli_query($this->conn,$query1))
                {
                    $info = mysqli_query($this->conn,$query1);
                    if($info)
                    {
                        $seatinfo = mysqli_fetch_assoc($info);
                        if(isset($seatinfo))
                        {
                            header("location:getpdf.php");
                            session_start();
                            $_SESSION['busname'] = $seatinfo['bus_name'];
                            $_SESSION['username'] = $seatinfo['user_name'];
                            $_SESSION['boarding'] = $seatinfo['boardingpnt'];
                            $_SESSION['seatnumber'] = $seatinfo['seatno'];
                            $_SESSION['price'] = $seatinfo['amount'];
                        }
                    }
                }
            }
        }
    }
    public function displayseat($data)
    {
        $query = "SELECT * FROM seat Where bus_id=$data ORDER BY id DESC";

        if(mysqli_query($this->conn,$query))
        {
            $returndata = mysqli_query($this->conn,$query);
            return $returndata;
        }
    }

    public function boardingpoint($data)
    {
        $query ="SELECT * FROM bus_boarding WHERE bus_id=$data";
        if(mysqli_query($this->conn,$query))
        {
            $returndata = mysqli_query($this->conn,$query);
            return $returndata;
        }
    }
    public function show_seat()
    {
        $query = "SELECT * FROM seat";
        $output = ''; 
        if(mysqli_query($this->conn,$query))
        {
            $result = mysqli_query($this->conn,$query);
            $output .= '
            <table>
            <tr>
                <th>Bus Name</th>
                <th>User Name</th>
                <th>Boarding Point</th>
                <th>Seat no</th>
                <th>Amount</th>
            </tr>
            ';
            while($row=mysqli_fetch_object($result))
            {
                $output .= '
                
                <tr>
                <td>'.$row->bus_name.'</td>
                <td>'.$row->user_name.'</td>
                <td>'.$row->boardingpnt.'</td>
                <td>'.$row->seatno.'</td>
                <td>'.$row->amount.'</td>
            </tr> ';
            }
            $output .= ' </table>';
            return $output;
        }
    }
}
?>