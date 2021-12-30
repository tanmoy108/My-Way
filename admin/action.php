<?php  
 include("../function.php");  
 $object = new busapp();  
 if(isset($_POST["action"]))  
 {  
      if($_POST["action"] == "Load")  
      {  
           echo $object->display_bus(); 
      }
      if($_POST["action"] == "Load2")  
      {  
           echo $object->show_user(); 
      }
      if($_POST["action"] == "Load3")  
      {  
           echo $object->show_seat(); 
      }    
      if($_POST["action"] == "Insert")  
      {  
          $object->add_bus($_POST);
          echo "Insert Successfull";     
      }
      if($_POST["action"] == "Fetch Single Data")  
      {  
          echo $object->display_bus_id("SELECT * FROM add_bus WHERE bus_id = '".$_POST["valueid"]."'");
      }
      if($_POST["action"] == "Edit")  
      {   
          $object->update_data($_POST);
          echo "Update Successfull";
      }
      if($_POST["action"] == "delete")  
      {   
          $object->delete_data("SELECT * FROM add_bus WHERE bus_id='".$_POST["valueid"]."'","DELETE FROM add_bus WHERE bus_id='".$_POST["valueid"]."'","DELETE FROM bus_boarding WHERE bus_id='".$_POST["valueid"]."'","DELETE FROM bus_inside WHERE bus_id='".$_POST["valueid"]."'","DELETE FROM seat WHERE bus_id='".$_POST["valueid"]."'");
          echo "delete Successfull";
      }
      if($_POST["action"] == "autofrom")  
      {   
        if(isset($_POST['query']))
        {
            $fromText = $_POST['query'];
            $object->fromautocomplete("SELECT from_route FROM add_bus WHERE from_route LIKE '%$fromText%'");
        }  
      }
      if($_POST["action"] == "autoto")  
      {   
        if(isset($_POST['query']))
        {
            $toText = $_POST['query'];
            $object->toautocomplete("SELECT to_route FROM add_bus WHERE to_route LIKE '%$toText%'");
        }  
      }    
 }
 
 ?>