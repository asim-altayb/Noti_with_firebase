<?php
require "conn.php";
global $id_trip;

if (isset($_POST["from_city"])) {
  $from_city=$_POST["from_city"];
}


if (isset($_POST["to_city"])) {
  $to_city=$_POST["to_city"];
}

if (isset($_POST["class_train"])) {
  $class_train=$_POST["class_train"];
}

if (isset($_POST["date_go"])) {
  $time_go=$_POST["date_go"];}
  
  $from_city="الخرطوم";
  $to_city="مدني";
  $class_train="2";
  $time_go="12_5_2019";
  
 
  
  

$ress = array();

  $query="select * from trips where from_ like '$from_city' and to_ like '$to_city' and date_ like '$time_go' ;";
  $result=mysqli_query( $con , $query );

  if(mysqli_num_rows($result)>0)
  {
   while( $rows=mysqli_fetch_assoc($result)){
       

    $id_trip=$rows["id_trips"];
    $number_train=$rows["number_train"];
    $time_arrival=$rows["time_arrival"];
    $go_time=$rows["time_go"];
    $price=$rows["price"];
}
    $clas="select * from train_info where Train_no like '$number_train' and class_trip like '1' ;";
    $res2=mysqli_query($con , $clas);

    if(mysqli_num_rows($res2)>0)
    {
              while( $detail=mysqli_fetch_assoc($res2)){

                $car_no=$detail["Car_no"];
                $chair_no=$detail["Chair_no"];}
                                                            // CAR NO 1-3 CLASS "VIP"    & PRICE +=40 $
                                                            // CAR NO 4-6 CALSS "MEDIUM" & PRICE +=20 $
                                                            // CAR NO 7-9 CLASS "NORMAL" & PRICE +=0 $

                if ($class_train==1)
                {
                            $price+=40;

                                        if(($car_no==1) )
                                        {
                                                    if($chair_no>=50)
                                                    {
                                                        $car_no=2;
                                                        $chair_no=1;
                                                    }
                                                    else
                                                    if($chair_no<50)
                                                    {
                                                        $chair_no=( $chair_no+1);
                                                    }
                                        }//car no =1

                                        else
                                        if(($car_no==2) )
                                        {
                                                    if($chair_no>=50)
                                                    {
                                                        $car_no=3;
                                                        $chair_no=1;
                                                    }

                                                    else

                                                    if($chair_no<50)
                                                    {
                                                        $chair_no=( $chair_no+1);
                                                    }

                                        }//CAR NO =2

                                        else
                                        if(($car_no==3))
                                        {
                                                  if($chair_no>=50)
                                                  {
                                                    $car_no=3;
                                                    $chair_no=0;
                                                  }
                                                  else
                                                  if($chair_no<50)
                                                  {
                                                    $chair_no=( $chair_no+1);
                                                  }
                                        }//CAR NO =3
                    }//class ==1

                    else
                    if ($class_train==2)
                    {
                                $price+=20;

                                        if(($car_no==4) )
                                        {
                                                  if($chair_no>=50)
                                                  {
                                                    $car_no=5;
                                                    $chair_no=1;
                                                  }
                                                  else
                                                  if($chair_no<50)
                                                  {
                                                    $chair_no=( $chair_no+1);
                                                  }
                                        }//CAR NO =4
                                        else
                                        if(($car_no==5)  )
                                        {
                                                  if($chair_no>=50)
                                                  {
                                                    $car_no=6;
                                                    $chair_no=1;
                                                  }
                                                  else
                                                  if($chair_no<50)
                                                  {
                                                      $chair_no=( $chair_no+1);
                                                  }
                                        }//CAR NO =5

                                        else
                                        if(($car_no==6) )
                                        {
                                                  if($chair_no>=50)
                                                  {
                                                    $car_no=6;
                                                    $chair_no=0;
                                                  }
                                                  else
                                                  if($chair_no<50)
                                                  {
                                                    $chair_no=( $chair_no+1);
                                                  }
                                        }//CAR NO =6
                        }//class ==2

                        else
                        if ($class_train==3)
                        {


                                        if(($car_no==7) )
                                        {
                                                  if($chair_no>=50)
                                                  {
                                                    $car_no=8;
                                                    $chair_no=1;
                                                  }
                                                  else
                                                  if($chair_no<50)
                                                  {
                                                    $chair_no=( $chair_no+1);
                                                  }
                                        }//CAR NO =7
                                        else
                                        if(($car_no==8) )
                                        {
                                                  if($chair_no>=50)
                                                  {
                                                    $car_no=9;
                                                    $chair_no=1;
                                                  }
                                                  else
                                                  if($chair_no<50)
                                                  {
                                                    $chair_no=( $chair_no+1);
                                                  }
                                        }//CAR NO =8

                                        else
                                        if(($car_no==9))
                                        {
                                                  if($chair_no>=50)
                                                  {
                                                    $car_no=9;
                                                    $chair_no=0;
                                                  }
                                                  else
                                                  if($chair_no<50)
                                                  {
                                                    $chair_no=( $chair_no+1);
                                                  }
                                        }//CAR NO =9
                            }//class ==3

                              //FINAL DETAILS OF TRIP
                              $result = array();

  

                            $DETAILS=array('' => '' );

                            $DETAILS['id_trip']      =$id_trip;
                            $DETAILS['number_train'] =$number_train;
                            $DETAILS['time_arrival'] =$time_arrival;
                            $DETAILS['go_time']      =$go_time;
                            $DETAILS['price']        =$price;
                            $DETAILS['car_no']       =$car_no;
                            $DETAILS['chair_no']     =$chair_no;  //IF CHAIR_NO =0 THAT MEAN NOT AVILBLE CHAIR AT THIS CLASS .
                             
                             
                              array_push($ress,array(
                                             'id_trip'=>$id_trip,
                                             'number_train'=>$number_train,
                                             'time_arrival'=>$time_arrival,
                                             'go_time'=>$go_time,
                                             'price'=>$price,
                                        	 'chair_no'=>$chair_no,
                                        	  'tic_no'=>$chair_no."-".$car_no
                                                                             ));


                                                        echo json_encode(array('result'=>$ress));
                                //echo print_r($DETAILS);

    }//train class

  }//FIND TRIP ...

  else
  {
    $DETAILS=array('' => '' );

    $DETAILS['id_trip']      =0;
    $DETAILS['number_train'] =0;
    $DETAILS['time_arrival'] =0;
    $DETAILS['go_time']      =0;
    $DETAILS['price']        =0;
    $DETAILS['car_no']       =0;
    $DETAILS['chair_no']     =0;


  array_push($ress,array(
                                             'id_trip'=>0,
                                             'number_train'=>0,
                                             'time_arrival'=>0,
                                             'go_time'=>0,
                                             'price'=>0,
                                        	 'chair_no'=>0,
                                        	  'tic_no'=>0
                                                                             ));


                                                        echo json_encode(array('result'=>$ress));
   // echo print_r($DETAILS);
  }//IF NOT FOUND TRIP  SET ALL VALUES 0 ...
  
  
 ?>
