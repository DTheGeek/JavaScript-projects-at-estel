<?php

	mail("softgeekvert@gmail.com","Greeting","Bonsoir");
	
    function check_input ($data) {
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }
    
    if (isset($_GET['fname'])) {
	$fname = $_GET['fname'];
	$lname = $_GET['lname'];
	$num = $_GET['phone'];
	$email = $_GET['email'];
	$msg = $_GET['msg'];
	$to = "softgeekvert@gmail.com";
	$subject = "Salut!";
	$headers = "MIME-Version:1.0". "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8". "\r\n";
		/*$message = wordwrap($message,70);*/
	
	/*$message = $msg;"
	<html>
	<head>
	<style>
	body {
	    font:14px -apple-system, helvetica;
	    padding:10px;
	    background:#ea1
	}
	div {
	    text-align:center;
	    padding:10px;
	    margin:10px;
	    border-radius:9px;
	    background:#fff;
	    font-size:13px;
	}
	button {
	    padding:5px;
	    border:none;
	    margin:25px;
	    border-radius:3px;
	    background:#ddd
	}
	
	a {
	    text-decoration:none;
	    color:#4ac
	}
	</style>
	</head>
	<body>
	<img alt='doos-logo@35px' height='35px'>
	<div>
	<p>
	<b>Nouveau message!</b>
	</p>
	<p>
	prénom: $fname<br/>
	nom: $lname<br/>
	numéro : $num,
	adresse email : $email
	</p>
	<p>
	Message:<br/>
	$msg
	</p>
	</body>
	</html>
	";*/

    echo "<div id='succ'>
    Message envoyé avec succès<br/>
    <span style='color:#f92' onclick=".'"this.parentNode.style.display='."'none'".'">Fermer</span>'."
    </div>";
    }
?>
<html>
    <head>
        <title>
            My Doo's account!
        </title>
        <style>
    * {
    box-sizing:border-box;
}
    
    #main {
    text-align:center;
    padding-top: 5%;
    }
    
    #err, #succ {
        width: 50%;
        margin: auto 40%;
        position: absolute;
        background : #eee;
        border: 2px solid #fbb;
        border-radius: 15px;
        padding: 25px;
    }
        
    input, textarea {
    width:50%;
    padding:5px 5px 5px 10px;
    text-decoration:none;
    transition:0.8s;
    border-radius:19px;
    margin-bottom:15px;
    background:rgba(0,1,0,0.1);
    border:none;
}

    textarea {
        height: 75px;
    }

    @media (min-width:768px) {
    label {
        margin-top: 20px;
    }
    input, textarea {
        width:25%;
        }
    input:focus {
        width: 35%;
    }
    #err {
        width: 25%;
    }
}

    input:focus {
    width:60%;
    }
        
    h1 {
    font-size:18px;
    font-weight:900;
}
        
    a {
    text-decoration:none;
    color:#f92;
}

    .msg {
    color:#f00;
}

        </style>
    </head>
    <body>
        <?php include "header.php"
        ?>
        
    <div id="main" class="col-12">
    <img height="30px" src="images/mail-me.png">

        <h1 style="margin-top:5%; margin-bottom:5%">
           Laissez-nous un message!
        </h1>
        <div id='err' style='display:none'>
            <!---->
        </div>
        <form method='GET' action='account.php' id='sform' name='msgform'>
            <label>
                Entrez votre prénom
            </label>
            <br/>
            <input name="fname" id="name" class='ifield'  type="text" placeholder="Votre prénom">
            <br/>
            <label>
                Entrez votre nom
            </label>
            <br/>
            <input type='text' name='lname' class='ifield' placeholder='Votre nom'>
            <br/>
            <label>
                Entrez votre numéro de mobile
            </label>
            <br/>
            <input type='tel' name='phone' class='ifield' placeholder='Votre mobile'>
            <br/>
            <label>
                Quel est votre adresse mail ?
            </label>
            <br/>
            <input type='mail' name='email' placeholder='Adresse mail'>
            <br/>
            <label>
                Une question ou suggestion?
            </label>
            <br/>
            <textarea name='msg' id='msg' placeholder='message'></textarea>
            <br/>
            <input type="submit" value="OK!">
        </form>
        <p>

        </p>
    <?php include 'footer.php'
    ?>
    </div>
<script src="https://smtpjs.com/v3/smtp.js">
</script>
<script>

var formdata = {
    myinput: document.getElementsByTagName('input'),
    error: document.getElementById('err'),
    sform: document.forms.msgform,
    fname: this.sform.fname,
    lname: this.sform.lname,
    tel: this.sform.phone,
    email: this.sform.email,
    emsg: this.sform.msg
}


   var closeBtn = '<br/><span style="color:#f92" onclick="this.parentNode.style.display='+"'none'"+'">Fermer</span>';

function sendmail() {
        if (
Email.send({
    Host : "smtp.elasticemail.com",
    Username : "softgeekvert@gmail.com",
    Password : "0874E368800E5E7D428EB0B4F88664567095",
    To : 'sagnekhane95@gmail.com',
    From : 'softgeekvert@gmail.com',
    Subject : "Test du code d'envoi de mail",
    Body : 'Prénom: '+ formdata.fname.value + '<br/> Nom : ' + formdata.lname.value + '<br/> Tel: ' + formdata.tel.value + '<br/>Email: ' + formdata.email.value + '<br/> Message: ' + formdata.emsg.value
})) {
            formdata.error.innerHTML = 'Mail envoyé avec succès !' + closeBtn;
        }
        else {
            formdata.error.innerHTML = "Une erreur s'est produite, le mail n'a pas été envoyé!" + closeBtn;
    }
}

formdata.sform.onsubmit = function (event) {
   var formOK = true;
   var goodNum = /[0-9]/.test(formdata.tel.value);
   var numLen = formdata.tel.value.length;
   var correctEmail = /[@.]/.test(formdata.email.value);
   if (!goodNum || numLen < 9) {
       formOK = false;
       formdata.error.innerHTML = "Le numéro de téléphone doit être composé de (9) nombres uniquement!" + closeBtn;
   }
   if (!correctEmail) {
       formOK = false;
       formdata.error.innerHTML = "L'email saisi n'est pas correct !" + closeBtn;
   }
    for (var c=0;c<formdata.myinput.length-1;c++) {
        if (formdata.myinput[c].value == "") {
            formOK = false;
            formdata.error.innerHTML = "Un formulaire vide ne peut pas être soumis! Toi aussi!" + closeBtn;
        }
        if (!formOK) {
            event.preventDefault();
            formdata.error.style.display = 'block'
        }
        else {
            event.preventDefault();
            sendmail();
            formdata.error.style.display = 'block';
        }
    }
}
        </script>
    </body>
</html>

