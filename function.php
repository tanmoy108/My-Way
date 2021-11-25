<?php 

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
                header("location:admin/dashcondition.php");
                $admin_data=mysqli_fetch_assoc($admin_info);
                session_start();
                $_SESSION['adminid']=$admin_data['id'];
                $_SESSION['adminname']=$admin_data['admin_name'];
            }

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
                <th>picture</th>
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
                            <a class="dropdown-item seatbooking" href="#">Seat Booking</a>
                            <a class="dropdown-item update" id="'.$row->bus_id.'">Edit</a>
                            <a class="dropdown-item delete" id="'.$row->bus_id.'">Delete</a>
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

    public function delete_data($catch_img,$query)
    {
        if(mysqli_query($this->conn,$query))
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
}
?>