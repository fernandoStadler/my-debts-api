<?php
use \Slim\Http\Request as Request;
use \Slim\Http\Response as Response;

$app->post("/ong/adocao", function (Request $request, Response $response, array $args){
    
    $data = $request->getParsedBody();
    
    $slug = $data['slug'];
    $description =  $data['description']; 
    $img =  $data['img'];
    
    
        $json=$data;
        
        $db = new Adocao\Connect();
        $query = "INSERT INTO adocao (slug, description,img) VALUE ('$slug', '$description','$img')";
        $exec = $db->query($query);
        
        return $response->withJson($json);
        
        
    });
    
    
    $app->get("/ong/adocao[/{id}]", function(Request $request, Response $response, array $args){
            
    
            $db = new Adocao\Connect();
            
            $id = preg_replace("/[^0-9]/","",$args["id"]);
            
            $query = "SELECT * FROM adocao";
            if(!empty($id)) $query .= " WHERE id=$id";
            $exec = $db->query($query);
    
            $result = $exec->fetch_object();
            $ong = [];
    
    
            foreach($exec as $row){
                    $ong[]=$row;
    
                    print_r($row);
            }
            return $response->withJson($ong);
    });
    $app->delete("/ong/{id}", function(Request $request, Response $response, array $args){
        
        $id = preg_replace("/[^0-9]/","",$args["id"]);
        $data = $request->getParsedBody();
        
        $db = new Adocao\Connect();
        
        $query = "DELETE FROM adocao WHERE id=$id";
        $exec = $db->query($query);
        
        // $result = $exec->fetch_object();
        
        return $response->withJson("Foi para o egito!");
    });
    
    
    
    
    
