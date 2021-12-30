<?php

include "dbconfig.php";

header("Access-Control-Allow-Origin: *"); 

if(isset($_POST['getCategories'])){


    $check=$conn->query("SELECT * FROM categories");
    $arr=array();
    while($cat=$check->fetch_assoc()){
           array_push($arr,$cat);

    }
    echo json_encode($arr);

}




if(isset($_POST['isUserToken'])){
$user_token=$_POST['user_token'];

$check=$conn->query("SELECT * FROM users WHERE  token ='{$user_token}'");

 echo json_encode($check->fetch_assoc());

}



if(isset($_POST['isLogin'])){
$email=$_POST['email'];
$password=$_POST['password'];

$check=$conn->query("SELECT * FROM users WHERE (email='{$email}' AND password='{$password}') AND login_type='4'");
$token=md5($email);
if(mysqli_num_rows($check) == 1){
     $check=$conn->query("UPDATE users SET token='{$token}' WHERE email='{$email}' ");

   echo json_encode(["success" => "succesfully login ","token" => md5($email)]);

}else{

      echo json_encode(["error" => "User Data not Found! "]);
}

}




if(isset($_POST['isRegister'])){

//print_r($_POST);
 //die();
 $username=$_POST['username'];
   $email=$_POST['email'];
   $password=$_POST['password'];
   
   $check=$conn->query("SELECT * FROM users WHERE email='{$email}'");
   if(mysqli_num_rows($check) < 1){
        
      $sql=$conn->query("INSERT INTO users(username,email,password,login_type) VALUE('{$username}','{$email}','{$password}','5')");
         
      if($sql){
          
      echo json_encode(["success"=> "succesful register!"]);

      }

   }else{

      echo json_encode(["error"=> "email already exit!"]);
   }

   
}

if(isset($_POST['isallusers'])){
   $check=$conn->query("SELECT * FROM users");
      $array=array();
      while($user=$check->fetch_assoc()){

       array_push($array,$user);
       
      }
      echo json_encode($array);

}

if(isset($_POST['isUserEdit'])){
   $check=$conn->query("SELECT * FROM users WHERE id='{$_POST['user_id']}'");
   
   echo json_encode($check->fetch_assoc());
}




if( isset($_POST['isUserupdate'])){

//   print_r($_POST);
$check=$conn->query("UPDATE users SET email='{$_POST['email']}', password='{$_POST['password']}' WHERE id='{$_POST['user_id']}'");
echo json_encode(['success' => 'updated']);
}


if( isset($_POST['isUserdelete'])){
$check=$conn->query("DELETE FROM users  WHERE id='{$_POST['user_id']}'");
if($check){
 echo json_encode("success");
}
}




if(isset($_POST['totalusers'])){
    $check=$conn->query("SELECT * FROM users");
  echo  (mysqli_num_rows($check));
//  print_r($_POST);
//  die();

   }

   if(isset($_POST['totalposts'])){
      $check=$conn->query("SELECT *FROM products");
      echo (mysqli_num_rows($check));
   }

   if(isset($_POST['totalcategory'])){
      $check=$conn->query("SELECT *FROM categories");
      echo (mysqli_num_rows($check));
   }

   if(isset($_POST['totalroles'])){
      $check=$conn->query("SELECT *FROM roles");
      echo (mysqli_num_rows($check));
   }

   if(isset($_POST['isproduct'])){

            // print_r($_POST);
            // die();
        $title=$_POST['product_title'];
        $description=$_POST['product_description'];
        $image=$_FILES['product_image']['name'];
        $ext= explode('.',$image);
        $imagename= date('dmY').time().".".$ext[1];
        $tmp_image=$_FILES['product_image']['tmp_name'];
        $category_id=$_POST['product_category'];
        $buy_price=$_POST['buy_price'];
        $sell_price=$_POST['sell_price'];
            $sql=$conn->query("INSERT INTO products(title,description,image,category_id,buy_price,sell_price) VALUE('{$title}','{$description}','{$imagename}','{$category_id}','{$buy_price}','{$sell_price}')");
                 move_uploaded_file($tmp_image,"uploads/products/".$imagename);
            if($sql){
                
            echo json_encode(["success"=> "succesful added!"]);
      
            }
      
            else{

               echo json_encode(["error"=> " already exit!"]);
            }
         
      }


      if(isset($_POST['isallproducts'])){
         $check=$conn->query("SELECT products.image AS prod_image, products.id AS pro_id, categories.name AS catname, products.*,categories.* FROM products LEFT JOIN categories ON products.category_id=categories.id");
         
            $array=array();
            while($products=$check->fetch_assoc()){
      
             array_push($array,$products);
             
            }
            echo json_encode($array);
      
      }

if(isset($_POST['isproductsEdit'])){
 
   $check=$conn->query("SELECT * FROM  products WHERE id='{$_POST['products_id']}'");
  
   echo json_encode($check->fetch_assoc());
}

if( isset($_POST['isproductsupdate'])){
  
   if(isset($_FILES['product_image'])){
      $image=$_FILES['product_image']['name'];
      $ext= explode('.',$image);
      $imagename= date('dmY').time().".".$ext[1];
      $tmp_image=$_FILES['product_image']['tmp_name'];
      unlink("uploads/products/".$_POST['old_image']);
      move_uploaded_file($tmp_image,"uploads/products/".$imagename);


   }else{

    $imagename=$_POST['old_image'];
   }
 
   $check=$conn->query("UPDATE products SET title='{$_POST['title']}',description='{$_POST['description']}', sell_price='{$_POST['sell_price']}',image='{$imagename}' WHERE id='{$_POST['product_id']}'");
 
   echo json_encode(['success' => 'updated']);
 }


 if( isset($_POST['isproductsdelete'])){
   $check=$conn->query("SELECT * FROM products  WHERE id='{$_POST['product_id']}'");
    while($data=$check->fetch_assoc()){
      unlink("uploads/products/".$data['image']);
     
    }

    $sql=$conn->query("DELETE FROM products WHERE id='{$_POST['product_id']}'");
    if($sql){
       echo json_encode("success");
      }

  
   }
   
   if(isset($_POST['isLogout'])){
     
       $check=$conn->query("SELECT * FROM users WHERE token='{$_POST['user_token']}'");
   //       print_r($_POST);
   //  die();
         
          if(mysqli_num_rows($check) == 1){
            echo json_encode("Successfully Logout");
       }
      }
   //    if(isset($_POST[cookie'])){ 
   //       echo 'User ' . $_COOKIE['nameofcookie'] . ' is set<br>';
   //   }else{
   //       echo'User is not set';
   //   }
     
   if(isset($_POST['isallcategories'])){
      $check=$conn->query("SELECT * FROM categories");
         $array=array();
         while($user=$check->fetch_assoc()){
   
          array_push($array,$user);
          
         }
         echo json_encode($array);
   
   }

   if(isset($_POST['isproducts'])){
      $check=$conn->query("SELECT * FROM  products LEFT JOIN categories ON products.category_id=categories.id");
         $array=array();
         while($products=$check->fetch_assoc()){
   
          array_push($array,$products);
          
         }
         echo json_encode($array);
   
   }


// all products

// if(isset($_POST['Productsall'])){
//    $check=$conn->query("SELECT * FROM  products LEFT JOIN categories ON products.category_id=categories.id");
// //        print_r($_POST);
// //  die();
//       $array=array();
//       while($products=$check->fetch_assoc()){

//        array_push($array,$products);
       
//       }
//       echo json_encode($array);

// }
// edit for category
// if(isset($_POST['isproductEdit'])){
//    $check=$conn->query("SELECT * FROM categories WHERE id='{$_POST['categories_id']}'");
   
//    echo json_encode($check->fetch_assoc());
// }




// if( isset($_POST['isproductupdate'])){

// //   print_r($_POST);
// $check=$conn->query("UPDATE categories SET email='{$_POST['email']}', password='{$_POST['password']}' WHERE id='{$_POST['categories_id']}'");
// echo json_encode(['success' => 'updated']);
// }


// if( isset($_POST['isproductdelete'])){
// $check=$conn->query("DELETE FROM categories  WHERE id='{$_POST['categories_id']}'");
// if($check){
//  echo json_encode("success");
// }
// }
if(isset($_POST['isallproductsshow'])){
   $check=$conn->query("SELECT products.image AS prod_image, products.id AS prod_id, categories.name AS catname, products.*,categories.* FROM products LEFT JOIN categories ON products.category_id=categories.id");
   
      $array=array();
      while($products=$check->fetch_assoc()){

       array_push($array,$products);
       
      }
      echo json_encode($array);

}


if(isset($_POST['isallCart'])){
     $data= implode(',',$_POST['products']);
     $products=array();
      $check=$conn->query("SELECT * FROM  products WHERE `id` IN ($data)");

      while($user=$check->fetch_array()){
          array_push($products,$user);
      }
   
    
  
    echo json_encode($products);

}


?>



