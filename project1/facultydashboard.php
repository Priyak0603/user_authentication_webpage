<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            background-image:linear-gradient(to top left ,#340E41,#225C76, #1ca6b0);
        }
        h1{
            
            text-align: center;
        }
        .flx1{
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            width: 80%;
            height: 400px;
            border: 2px solid steelblue;
            gap: 10px;
            padding: 20px;
            text-align: center;
            margin: auto;
        }
        #flx1_1{
            padding: 10px;
            background-color: rgb(0, 255, 255,0.5);
            font-size: 20px;
            background-color: rgb(0,255,255,0.4);
        }
        #flx1_1 h3{
            text-align: left;
        }
        #flx1_1 i{
            font-size: 50px;
        }
        #flx1_2{
            background-color: darkblue;
            background-color: rgb(0,255,255,0.4);
            padding-left: 10px;
            font-size: 20px;
        }
        .form1{
            width: fit-content;
            margin: auto;
            background-color: rgb(0,255,255,0.4);
            margin-bottom: 20px;
            padding: 15px;
        }
        .form1 input{
            font-size: 15px;
        }
        .form1 input[type="submit"]{
            margin-top: 23px;
            margin-left: 43%;
        }
        
    </style>
</head>
<body>
    <h1><b>USER SUCCESSFULLY LOGGED IN TO THERE PROFILE</b></h1>
    <div class="form1">
        <form action="" method="POST">
            <input type="text" name="uname" placeholder="enter full name" id="un">
            <input type="password" name="upass" placeholder="enter password" id="up"><br>
            <input type="submit" value="submit" name="submit">
        </form>
    </div>
    <div class="flx1">
        <?php
            $conn = new mysqli("localhost","root","Hellokitty@24#","mysql");
            if(!$conn){
                die("connection failed");
            }
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $upass = $_POST['upass'];
                $uname = $_POST['uname'];
                
                $stmt = $conn->prepare("SELECT * FROM kfac_desc WHERE  name = ? AND  password = ?");
                
                // Bind parameters
                $stmt->bind_param("ss", $uname, $upass);
                
                // Execute the query
                $stmt->execute();
                
                // Fetch the result if needed
                $result = $stmt->get_result();
                
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
        ?>
        
        <div id="flx1_1">
            <i class="fa-solid fa-chalkboard-user"></i>
            <h3>NAME:
                <?php echo  "Prof.".$row['name'] . "<br>";?>
            </h3>
            <h3>ID:
                <span id="spn"><?php echo $row['fid']."<br>";?></span>
            </h3>
            <h3>QUALIFICATIONS:
            <?php echo $row['designation']."<br>";?>
            </h3>
        </div>
        <div id="flx1_2">
            <h3>Area Of Expertise:
            <?php echo $row['area_of_expertise']."<br>";?>
            </h3>
            <h3>Years of Experience:
            <?php echo $row['yr_experience']."<br>";?>
            </h3>
        </div>
    </div>
    <?php
                    }
                }
            }

    ?>
</body>
</html>