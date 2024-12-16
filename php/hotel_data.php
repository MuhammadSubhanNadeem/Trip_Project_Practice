<?php
header("Allow-Control-Content-Type: application/json");
ini_set("log_errors", "1");
ini_set("display_error", "0");
ini_set("error_log", "./php/error.log");
error_reporting(E_ALL);
include_once("./config.php");
$req_receiver = file_get_contents("php://input");
$req_decode = json_decode($req_receiver, true);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
} else if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["action"]) && $_GET["action"] === "hotel_data") {
        $hotel_data_query = "SELECT * FROM trip_data.hotel_data INNER JOIN trip_data.facilities ON facilities.facalities_id = hotel_data.hotel_type_id";
        $hotel_data_raw_res = mysqli_query($database_connection, $hotel_data_query);
        if (mysqli_num_rows($hotel_data_raw_res) > 0) {
            $hotel_data_res = [];
            while ($hotel_data_res_assoc = mysqli_fetch_assoc($hotel_data_raw_res)) {
                array_push($hotel_data_res, $hotel_data_res_assoc);
            }
            echo json_encode(["hotel_found" => true, "hotel_data" => $hotel_data_res]);
        } else {
            echo json_encode(["hotel_found" => false, "hotel_data" => null]);
        }
    } elseif (isset($_GET["action"]) && $_GET["action"] === "hotel_detail") {
        if (isset($_GET["hotel_id"])) {
            // $hotel_detail_query = "";
            function get_hotel_detail($query)
            {
                global $database_connection;
                $hotel_data_query_res = mysqli_query($database_connection, $query);
                if (mysqli_num_rows($hotel_data_query_res) > 0) {
                    $hotel_detail_res = [];
                    while ($hotel_data_query_res_assoc = mysqli_fetch_assoc($hotel_data_query_res)) {
                        array_push($hotel_detail_res, $hotel_data_query_res_assoc);
                    }
                    echo json_encode(["hotel_access" => true, "hotel_detail" => $hotel_detail_res]);
                } else {
                    echo json_encode(["hotel_access" => false, "hotel_detail" => null]);
                }
            }
            if ($_GET["hotel_id"] == 'A1') {
                $hotel_detail_query = "SELECT * FROM trip_data.hotel_data INNER JOIN trip_data.room_data ON room_data.hotel_id = 'A1' OR room_data.hotel_id = 'A3' OR room_data.hotel_id = 'A5' INNER JOIN trip_data.facilities ON facilities.facalities_id = hotel_data.hotel_type_id WHERE hotel_data.hotel_type_id = '{$_GET["hotel_id"]}'";
                get_hotel_detail($hotel_detail_query);
            } elseif ($_GET["hotel_id"] == 'A2') {
                $hotel_detail_query = "SELECT * FROM trip_data.hotel_data INNER JOIN trip_data.room_data ON room_data.hotel_id = 'A2' OR room_data.hotel_id = 'A5' OR room_data.hotel_id = 'A6' INNER JOIN trip_data.facilities ON facilities.facalities_id = hotel_data.hotel_type_id WHERE hotel_data.hotel_type_id = '{$_GET["hotel_id"]}'";
                get_hotel_detail($hotel_detail_query);
            } elseif ($_GET["hotel_id"] == 'A3') {
                $hotel_detail_query = "SELECT * FROM trip_data.hotel_data INNER JOIN trip_data.room_data ON room_data.hotel_id = 'A3' OR room_data.hotel_id = 'A4' OR room_data.hotel_id = 'A6' INNER JOIN trip_data.facilities ON facilities.facalities_id = hotel_data.hotel_type_id WHERE hotel_data.hotel_type_id = '{$_GET["hotel_id"]}'";
                get_hotel_detail($hotel_detail_query);
            } elseif ($_GET["hotel_id"] == 'A4') {
                $hotel_detail_query = "SELECT * FROM trip_data.hotel_data INNER JOIN trip_data.room_data ON room_data.hotel_id = 'A1' OR room_data.hotel_id = 'A2' OR room_data.hotel_id = 'A3' INNER JOIN trip_data.facilities ON facilities.facalities_id = hotel_data.hotel_type_id WHERE hotel_data.hotel_type_id = '{$_GET["hotel_id"]}'";
                get_hotel_detail($hotel_detail_query);
            } elseif ($_GET["hotel_id"] == 'A5') {
                $hotel_detail_query = "SELECT * FROM trip_data.hotel_data INNER JOIN trip_data.room_data ON room_data.hotel_id = 'A3' OR room_data.hotel_id = 'A4' OR room_data.hotel_id = 'A5' INNER JOIN trip_data.facilities ON facilities.facalities_id = hotel_data.hotel_type_id WHERE hotel_data.hotel_type_id = '{$_GET["hotel_id"]}'";
                get_hotel_detail($hotel_detail_query);
            } else {
                echo json_encode(["hotel_access" => false, "hotel_detail" => null]);
            }
        } else {
            echo json_encode(["hotel_access" => false, "hotel_detail" => null]);
            // file_put_contents("./php/error.log", print_r("dsfsd", true));
        }
    } elseif (isset($_GET["action"]) && $_GET["action"] === "route_data") {
        $routes_query_req = "SELECT * FROM trip_data.routes_data";
        $routes_query_res_raw = mysqli_query($database_connection, $routes_query_req);
        if (mysqli_num_rows($routes_query_res_raw) > 0) {
            $routes_data = [];
            while ($routes_query_res_assoc = mysqli_fetch_assoc($routes_query_res_raw)) {
                array_push($routes_data, $routes_query_res_assoc);
            }
            echo json_encode(["route_data_status" => true, "route_data" => $routes_data]);
        } else {
            echo json_encode(["route_data_status" => false, "route_data" => null]);
        }
    } elseif (isset($_GET["action"]) && $_GET["action"] === "hotel_route_all_data") {
        $total_data_res = [];
        $all_hotel_name = mysqli_query($database_connection, "SELECT * FROM trip_data.hotel_data");
        if (mysqli_num_rows($all_hotel_name) > 0) {
            while ($each_hotel = mysqli_fetch_assoc($all_hotel_name)) {
                if ($each_hotel["hotel_type_id"] == "A1") {
                    $hotel_routes_all_query_req = "SELECT * FROM trip_data.hotel_data INNER JOIN trip_data.room_data ON room_data.hotel_id = 'A1' OR room_data.hotel_id = 'A3' OR room_data.hotel_id = 'A5' INNER JOIN trip_data.facilities ON facilities.facalities_id = hotel_data.hotel_type_id WHERE hotel_data.hotel_type_id = '{$each_hotel["hotel_type_id"]}'";
                } elseif ($each_hotel["hotel_type_id"] == "A2") {
                    $hotel_routes_all_query_req = "SELECT * FROM trip_data.hotel_data INNER JOIN trip_data.room_data ON room_data.hotel_id = 'A2' OR room_data.hotel_id = 'A5' OR room_data.hotel_id = 'A6' INNER JOIN trip_data.facilities ON facilities.facalities_id = hotel_data.hotel_type_id WHERE hotel_data.hotel_type_id = '{$each_hotel["hotel_type_id"]}'";
                } elseif ($each_hotel["hotel_type_id"] == "A3") {
                    $hotel_routes_all_query_req = "SELECT * FROM trip_data.hotel_data INNER JOIN trip_data.room_data ON room_data.hotel_id = 'A3' OR room_data.hotel_id = 'A4' OR room_data.hotel_id = 'A6' INNER JOIN trip_data.facilities ON facilities.facalities_id = hotel_data.hotel_type_id WHERE hotel_data.hotel_type_id = '{$each_hotel["hotel_type_id"]}'";
                } elseif ($each_hotel["hotel_type_id"] == "A4") {
                    $hotel_routes_all_query_req = "SELECT * FROM trip_data.hotel_data INNER JOIN trip_data.room_data ON room_data.hotel_id = 'A1' OR room_data.hotel_id = 'A2' OR room_data.hotel_id = 'A3' INNER JOIN trip_data.facilities ON facilities.facalities_id = hotel_data.hotel_type_id WHERE hotel_data.hotel_type_id = '{$each_hotel["hotel_type_id"]}'";
                } elseif ($each_hotel["hotel_type_id"] == "A5") {
                    $hotel_routes_all_query_req = "SELECT * FROM trip_data.hotel_data INNER JOIN trip_data.room_data ON room_data.hotel_id = 'A3' OR room_data.hotel_id = 'A5' OR room_data.hotel_id = 'A6' INNER JOIN trip_data.facilities ON facilities.facalities_id = hotel_data.hotel_type_id WHERE hotel_data.hotel_type_id = '{$each_hotel["hotel_type_id"]}'";
                }
                $hotel_routes_all_query_res_raw = mysqli_query($database_connection, $hotel_routes_all_query_req);
                if (mysqli_num_rows($hotel_routes_all_query_res_raw) > 0) {
                    while ($routes_query_res_assoc = mysqli_fetch_assoc($hotel_routes_all_query_res_raw)) {
                        array_push($total_data_res, $routes_query_res_assoc);
                    }
                } else {
                    die(json_encode(["route_data_status" => false, "route_data" => null]));
                }
            }
            $route_data_raw_res = mysqli_query($database_connection, "SELECT * FROM trip_data.routes_data");
            if (mysqli_num_rows($route_data_raw_res) > 0) {
                $route_data = [];
                while ($route_data_res = mysqli_fetch_assoc($route_data_raw_res)) {
                    array_push($route_data, ["routes_data" => $route_data_res]);
                }
                echo json_encode(["route_data_status" => true, "total_data" => $total_data_res, "routes_data" => $route_data]);
            } else {
                echo json_encode(["route_data_status" => false, "route_data" => null]);
            }
        } else {
            echo json_encode(["route_data_status" => false, "route_data" => null]);
        }
    }
} else {
}
