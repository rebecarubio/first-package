<?php
include 'orders.php';


class ApiOrders{

    function getAll(){
        $order= new Orders();
        $orders= array();
        $orders['register'] = array();

        if(isset($_GET['company'])){
            $company=$_GET['company'];
            $result=$order->filterByCompany($company);

            if($result->rowCount()){
                while($row =$result->fetch(PDO::FETCH_ASSOC)){
                    $register= array(
                        'id_order'=> $row['id_order'],
                        'date'=>$row ['date'],
                        'company'=>$row['company'],
                        'qty'=>$row['qty'],

                    );
                    array_push($orders['register'], $register);
                }

                http_response_code(200);
                echo json_encode($orders);

            }else{
                http_response_code(404);
                echo  "\n".'Compañia no encontrada en la tabla orders';
            }

        }else if(isset($_GET['date'])){
                $date=$_GET['date'];
                $result=$order->filterByDate($date);
                    if($result->rowCount()){
                        while($row =$result->fetch(PDO::FETCH_ASSOC)){
                            $register= array(
                                'id_order'=> $row['id_order'],
                                'date'=>$row ['date'],
                                'company'=>$row['company'],
                                'qty'=>$row['qty'],

                            );
                            array_push($orders['register'], $register);
                        }

                        http_response_code(200);
                        echo json_encode($orders);

                    }else{
                        http_response_code(404);
                        echo "\n".'Fecha no encontrada en la tabla orders';
                    }
        }else{
                echo "filtro no válido";
        }


    }
}

$api= new ApiOrders();
$api->getAll();
