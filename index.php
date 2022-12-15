<?php
    // data variables
    $name = $surname = $num = $isLiked = $email = $opinion = "";
    
    // error variables
    $nameError = $surnameError = $numError = "";
    
    // ak sa formular odošle tak sa skontroluju data
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        // skontroluje ci je meno zlozene len z pismen
        if (empty($_POST["name"])) {
            $nameError = "Meno je povinné.";
        } else {
            if (ctype_alpha(trim($_POST['name']))) {
                $name = trim($_POST['name']);
                $nameEnteredRight = true;
            } else {
                $nameError = "Meno sa musí skladať iba z písmen.";   
            }
        }
        
        // skontroluje ci je priezvisko zlozene len z pismen
        if (empty($_POST["surname"])) {
            $surnameError = "Priezvisko je povinné.";
        } else {
            if (ctype_alpha(trim($_POST['surname']))) {
                $surname = trim($_POST['surname']);
                $surnameEnteredRight = true;
            } else {
                $surnameError = "Priezvisko sa musí skladať iba z písmen.";   
            }
        } 

        // skontroluje ci je telefonne cislo zlozene len z cisiel
        if (empty($_POST["num"])) {
            $numError = "Telefónne číslo je povinné.";  
        } else {
            if (ctype_digit(trim($_POST['num']))) {
                $num = trim($_POST['num']);
                $numEnteredRight = true;
            } else {
                $numError = "Telefónne číslo sa musí skladať len z čísiel vo formáte 09...";   
            }
        }  

        // zisti aku moznost ano/nie pouzivatel zaskrtol
        if (empty($_POST["isLiked"])) {
            $isLiked = "";
        } else {
            $answers = array('Ano', 'Nie');
            $chosen = $_POST['isLiked'];

            if (in_array($chosen, $answers)) {
                if(strcasecmp($chosen, 'Ano') == 0) {
                    $isLiked = "Ano";
                } else {
                    $isLiked = "Nie";
                }
            }
        } 

        // uloží email
        if (empty($_POST['email'])) {
            $email = "";
        } else {
            $email = $_POST['email'];
        }

        // uloží názor
        if (empty($_POST['opinion'])) {
            $opinion = "";
        } else {
            $opinion = $_POST['opinion'];
        }

        // ak sú povinné údaje vyplnené vytorí súbor a zapíše doňho dáta
        if ($nameEnteredRight == true &&
            $surnameEnteredRight == true &&
            $numEnteredRight == true
           ) {

            $text = "Meno: " . $name . " " . $surname . "\r\n";
            $text .= "Telefonne cislo: " . $num . "\r\n";
            $text .= "Email: " . $email . "\r\n";
            $text .= "Paci sa mu/jej IPaIoT: " . $isLiked . "\r\n";
            $text .= "Nazor na predmet: " . $opinion;

            $data = fopen("data.txt", "w") or die("Unable to open file!");
            fwrite($data, $text);

            fclose($data);

            echo '<script type="text/javascript">
                function thanks() {
                    alert("Ďakujem za vyplnenie dotazníka");
                }

                thanks();
            </script>';
        }
    }
?>

<html lang="sk">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="house.png" type="image/icon type">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>SmartHome Ovládacie centrum</title>
</head>
<body>
    <div class="formDiv">
        <h2 class="heading"></h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <label for="name">Vaše meno</label>
            <input type="text" id="name" name="name" placeholder="Meno" autofocus>
            <span class="required">* <?php echo $nameError;?></span>
            <input type="text" id="surname" name="surname" placeholder="Priezvisko">
            <span class="required">* <?php echo $surnameError;?></span>

            <br><br>
            <label for="num">Telefónne číslo</label>
            <input type="tel" id="num" name="num" placeholder="0912345678">
            <span class="required">* <?php echo $numError;?></span>

            <br><br>
            <label for="email">Emailová adresa</label>
            <input type="email" id="email" name="email" placeholder="meno@mail.com">

            <br><br>
            <label for="like">Páči sa ti IPaIoT?</label>
            <input type="radio" id="like" name="isLiked" class="like" value="Ano">
            <p class="ano">Áno</p>

            <input type="radio" id="like" name="isLiked" class="disLike" value="Nie">
            <p class="nie">Nie</p>

            <br><br>
            <label for="opinion">Názor na predmet</label>
            <input type="text" id="opinion" name="opinion">

            <br><br><br><br>
            <hr>
            <button class="submitButton">ODOSLAŤ</button>
        </form>
    </div>
</body>
</html>