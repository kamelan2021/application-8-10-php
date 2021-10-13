<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>mon premier projet</title>
</head>
<body>
    <?php
        $orange = [
            '07','08', '09', '47', '48', '49', '57', '58', '59', '67', '68', '69', '77', '78', '79', '87', '88','89'
        ];

        $mtn = [
            '04','05', '06', '44', '45', '46', '54', '55', '56', '64', '65', '66', '74', '75', '76', '84', '85','86', '94', '95'
        ];

        $moov = [
            '01','02', '03', '41', '42', '43', '51', '52', '53', '61', '62', '63', '71', '72', '73', '81', '82','83'
        ];
        $erros = [];
        $indicatifOrange = '07';
        $indicatifMtn = '05';
        $indicatifMoov = '01';

        if(isset($_GET['telephone']) && !empty($_GET['telephone'])){
            $numero = $_GET['telephone'];
            if(is_numeric($numero)){
                $indixe = $numero[0].$numero[1];
                $longueur = strlen($numero);
                if($longueur < 8 || $longueur > 8 ){
                    $erros['message'] = "Votre numéro n'est pas à huit chiffre";
                    
                }else{
                    if(in_array($indixe,$orange)){
                        $numeroDix = $indicatifOrange.$numero;
                        
                    }
                    if(in_array($indixe,$mtn)){
                        $numeroDix = $indicatifMtn.$numero;
                        
                    }
                    if(in_array($indixe,$moov)){
                        $numeroDix = $indicatifMoov.$numero;
                        
                    }
                }
            }else{
                $erros['message'] = 'On vous demande un numéro à huit chiffres';
            }
        }else{
            if(isset($_GET['convertir'])){
                $erros['message'] = "Veillez saisir votre numéro à convertir";
                echo $erros['message'];
            }
        }  
    ?>
<div class="cadre">
    <h2>Convertissez vos numeros à 10 chiffre en 1 seconde</h2>
    <?php if(isset($erros['message'])) :?>
        <div class="card">
            <p><strong> <?= $erros['message'];?> </strong></p>
        </div>
    <?php endif;?>
    <?php if(isset($numeroDix)) :?>
        <div class="card2">
            <p>Voici votre numéro à 10 chiffres: <strong> <?= $numeroDix;?> </strong></p>
        </div>
    <?php endif;?>
    

    <form action="index.php" method="get">
        <input type="texte" name="telephone" id="telephone" placeholder="Enter your number to convert" <?php if(isset($numero)) : ?> value ="<?=$numero ?>" style="text-align: center;"  <?php endif;?>> <br>
        <button type="submit" name="convertir">Convert</button>
    </form>
</div>

</body>
</html>