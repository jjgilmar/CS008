<?php
include 'top.php';

$dataIsGood = false;
$message = '';

$firstName = '';
$lastName = '';
$email = '';

$listenBefore = '';

$album1 = false;
$album2 = false;
$album3 = false;
$album4 = false;
$album5 = false;
$album6 = false;
$album7 = false;
$album8 = false;
$album9 = false;
$none = false; 

$favAlbum = '';
$listenAfter = '';


function getData($field) {
    if (!isset($_POST[$field])){
        $data = "";
    } else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
    }
    return $data;
}

function verifyAlphaNum($testString) {
    return (preg_match ("/^([[:alnum:]]|-|\.| |\'|&|;|#)+$/", $testString));
}
?>

        <main class= "form">
            <h1 class= "box1" id="firstHeader2">Kid Cudi Survey</h1>
                <section class= "box3">
                    <h2>Survey</h2>
                    <figure id="go-center-phone-tablet" class="go-center">
                        <img alt="" src="images/Kid-Cudi-Survey.jpg">
                        <figcaption><cite><a href="https://ew.com/music/kid-cudi-new-song-leader-of-the-delinquents/" target="_blank">Entertainment Weekly</a></cite></figcaption>
                    </figure>
<?php
if($_SERVER["REQUEST_METHOD"] == 'POST'){

    //sanitize data
    $email = getData('txtEmail');
    $firstName = getData('txtFirstName');
    $lastName = getData('txtLastName');

    $album1 = (int) getData('chkAlbum1');
    $album2 = (int)  getData('chkAlbum2');
    $album3 =  (int) getData('chkAlbum3');
    $album4 =  (int) getData('chkAlbum4');
    $album5 =  (int) getData('chkAlbum5');
    $album6 =  (int) getData('chkAlbum6');
    $album7 =  (int) getData('chkAlbum7');
    $album8 =  (int) getData('chkAlbum8');
    $album9 =  (int) getData('chkAlbum9');
    $none = (int)  getData('chkNone');

    $listenBefore = getData('radListenBefore');
    $favAlbum = getData('radFavAlbum');
    $listenAfter = getData('radListenAfter');

     //validate form
    $dataIsGood = true;

    if($email == ''){
        print'<p class="mistake">Please type in your email address.</p>';
        $dataIsGood = false;
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        print '<p class="mistake">Your email address has invalid characters.</p>';
        $dataIsGood = false;
    }

    if ($listenBefore != "Yes" AND $listenBefore != "No" ){
        print '<p class="mistake">Please choose an option.</p>';
        $dataIsGood = false; 
    }

    if ($favAlbum != "Album1" AND $favAlbum != "Album2" AND $favAlbum != "Album3" AND $favAlbum != "Album4" AND $favAlbum != "Album5" AND $favAlbum != "Album6" AND $favAlbum != "Album7" AND $favAlbum != "Album8" AND $favAlbum != "Album9" AND $favAlbum != "NA"){
        print '<p class="mistake">Please choose an option.</p>';
       #$dataIsGood = false; 
    }

    if ($listenAfter != "Yes" AND $listenAfter != "No" ){
        print '<p class="mistake">Please choose an option.</p>';
        $dataIsGood = false; 
    }

    $totalChecked = 0;

    if($album1 != 1) $album1 = 0;
    $totalChecked += $album1;

    if($album2 != 1) $album2 = 0;
    $totalChecked += $album2;
    
    if($album3 != 1) $album3 = 0;
    $totalChecked += $album3;

    if($album4 != 1) $album4 = 0;
    $totalChecked += $album4;

    if($album5 != 1) $album5 = 0;
    $totalChecked += $album5;

    if($album6 != 1) $album6 = 0;
    $totalChecked += $album6;

    if($album7 != 1) $album7 = 0;
    $totalChecked += $album7;

    if($album8 != 1) $album8 = 0;
    $totalChecked += $album8;

    if($album9 != 1) $album9 = 0;
    $totalChecked += $album9;

    if($album1 != 1) $album1 = 0;
    $totalChecked += $album1;

    if($none != 1) $none = 0;
    $totalChecked += $none;

    if($totalChecked == 0){
        print '<p class="mistake">Please choose at least one option.</p>';
        $dataIsGood = false;
    }
    if($dataIsGood){
        try{
            $sql = 'INSERT INTO tblKidCudiSurvey(fldFirstName, fldLastName, fldEmail, fldListenBefore, fldAlbum1, fldAlbum2, fldAlbum3, fldAlbum4, fldAlbum5, fldAlbum6, fldAlbum7, fldAlbum8, fldAlbum9, fldNone, fldFavAlbum, fldListenAfter)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

            $statement = $pdo->prepare($sql);
            $data = array($firstName, $lastName,  $email, $listenBefore, $album1, $album2, $album3, $album4, $album5, $album6, $album7, $album8, $album9, $none, $favAlbum, $listenAfter);


            if($statement->execute($data)){
                $message = '<h2>Thank you!</h2>';
                $message .= '<p>Your information was successfully saved.</p>';
/*email code*/
                $to = $email;
                $from = 'Joey Gilmartin <jjgilmar@uvm.edu>';
                $subject = 'Kid Cudi Survey Response';

                $mailMessage = '<p style="font: 14pt sans-serif; background-color: darkslateblue;">';
                $mailMessage .= 'Hello ' .$firstName. ' ' .$lastName.',</p>';
                $mailMessage .= '<p style= "background-color: darkslateblue;">';
                $mailMessage .= 'Thank you for taking the time to fill out my survey on Kid Cudi!';
                $mailMessage .= ' I greatly appreciate it. I hope you enjoyed the website';
                $mailMessage .= " and continue to enjoy Kid Cudi's music!</p>";
                $mailMessage .= '<p><span style="background-color: darkslateblue; padding: 2 em;">';
                $mailMessage .= '-Joey Gilmartin</span></p>';
                
                $headers = "MIME_Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=utf-8\r\n";
                $headers .= "From: " .$from . "\r\n";

                $mailSent = mail($to, $subject, $mailMessage, $headers);

                if($mailSent) {
                    print "<p>A copy has been emailed to you for your records.</p>";
                    print $mailMessage;
                }
/*end of email code*/
            } else {                
                $message .= '<p>Record was not saved. Try again.</p>';
                $dataIsGood = false;
            }
        } catch(PDOException $e){
            $message = "<p>Couldn't insert the record, please contact someone</p>";
            $dataIsGood = false;
        }
    }
} //ends form submitted
?>
                </section>
            <section class= "box4">
                <h2>Please enter your information below.</h2>
                    <p>This form is intended to collect information about your familiarity with Kid Cudi.</p>
                <form action="#" id="frmKidCudi" method="post">
                    
                    <fieldset class="contact">
                        <legend>Enter your first name</legend>  
                        <p>
                            <label class="required" for="txtFirstName"></label>
                            <input id="txtFirstName" maxlength="50" name="txtFirstName" onfocus="this.select()" type="text" value="<?php print $firstName; ?> " required>
                        </p>
                    </fieldset>

                    <fieldset class="contact">
                        <legend>Enter your last name</legend>  
                        <p>
                            <label class="required" for="txtLastName"></label>
                            <input id="txtLastName" maxlength="50" name="txtLastName" onfocus="this.select()" type="text" value="<?php print $lastName; ?> " required>
                        </p>
                    </fieldset>

                    <fieldset class="contact">
                        <legend>Enter your email address</legend>  
                        <p>
                            <label class="required" for="txtEmail"></label>
                            <input id="txtEmail" maxlength="50" name="txtEmail" onfocus="this.select()" type="email" value=" <?php print $email; ?> " required>
                        </p>
                    </fieldset>

                    <fieldset class="radio">
                        <legend>Prior to viewing this website, have you listened to Kid Cudi?</legend>
                        <p>
                            <input type="radio" id="radListenBeforeYes" name="radListenBefore" value="Yes" required <?php
                            if($listenBefore == 'Yes') print 'checked'; ?>>
                            <label class="radio-field" for="radListenBeforeYes">Yes</label>
                        </p>

                        <p>
                            <input type="radio" id="radListenBeforeNo" name="radListenBefore" value="No" required <?php
                            if($listenBefore == 'No') print 'checked'; ?>>
                            <label class="radio-field" for="radListenBeforeNo">No</label>
                        </p>
                    </fieldset>

                    <fieldset class= "checkbox">
                        <legend>If any, what Kid Cudi albums have you listened to?</legend>

                        <p>
                                <input id="chkAlbum1" name="chkAlbum1" type="checkbox" value="1" <?php 
                                if($album1) print 'checked'; ?>>
                                <label for="chkAlbum1">Man on the Moon: The End of the Day</label>
                            </p>
                        
                            <p>
                                <input id="chkAlbum2" name="chkAlbum2" type="checkbox" value="1" <?php 
                                if($album2) print 'checked'; ?>>
                                <label for="chkAlbum2">Man on the Moon II: The Legend of Mr. Rager</label>
                            </p>

                            <p>
                                <input id="chkAlbum3" name="chkAlbum3" type="checkbox" value="1" <?php 
                                if($album3) print 'checked'; ?>>
                                <label for="chkAlbum3">Indicud</label>
                            </p>

                            <p>
                                <input id="chkAlbum4" name="chkAlbum4" type="checkbox" value="1" <?php 
                                if($album4) print 'checked'; ?>>
                                <label for="chkAlbum4">Satellite Flight: The Journey to Mother Moon</label>
                            </p>

                            <p>
                                <input id="chkAlbum5" name="chkAlbum5" type="checkbox" value="1" <?php 
                                if($album5) print 'checked'; ?>>
                                <label for="chkAlbum5">Speedin' Bullet 2 Heaven</label>
                            </p>

                            <p>
                                <input id="chkAlbum6" name="chkAlbum6" type="checkbox" value="1" <?php 
                                if($album6) print 'checked'; ?>>
                                <label for="chkAlbum6">Passion, Pain, and Demon Slayin'</label>
                            </p>

                            <p>
                                <input id="chkAlbum7" name="chkAlbum7" type="checkbox" value="1" <?php 
                                if($album7) print 'checked'; ?>>
                                <label for="chkAlbum7">Kids See Ghosts</label>
                            </p>

                            <p>
                                <input id="chkAlbum8" name="chkAlbum8" type="checkbox" value="1" <?php 
                                if($album8) print 'checked'; ?>>
                                <label for="chkAlbum8">Man on the Moon III: The Chosen</label>
                            </p>

                            <p>
                                <input id="chkAlbum9" name="chkAlbum9" type="checkbox" value="1" <?php 
                                if($album9) print 'checked'; ?>>
                                <label for="chkAlbum9">Entergalactic</label>
                            </p>

                            <p>
                                <input id="chkNone" name="chkNone" type="checkbox" value="1" <?php 
                                if($none) print 'checked'; ?>>
                                <label for="chkNone">I haven't listened to Kid Cudi</label>
                            </p>
                    </fieldset>

                    <fieldset class="radio">
                        <legend>If you have listened to Kid Cudi, which album is your favorite?</legend>
                        <p>
                            <input type="radio" id="radFavAlbumAlbum1" name="radFavAlbum" value="Album1" required <?php
                            if($favAlbum == 'Album1') print 'checked'; ?>>
                            <label class="radio-field" for="radFavAlbumAlbum1">Man on the Moon: The End of the Day</label>
                        </p>

                        <p>
                            <input type="radio" id="radFavAlbumAlbum2" name="radFavAlbum" value="Album2" required <?php
                            if($favAlbum == 'Album2') print 'checked'; ?>>
                            <label class="radio-field" for="radFavAlbumAlbum2">Man on the Moon II: The Legend of Mr. Rager</label>
                        </p>

                        <p>
                            <input type="radio" id="radFavAlbumAlbum3" name="radFavAlbum" value="Album3" required <?php
                            if($favAlbum == 'Album3') print 'checked'; ?>>
                            <label class="radio-field" for="radFavAlbumAlbum3">Indicud</label>
                        </p>

                        <p>
                            <input type="radio" id="radFavAlbumAlbum4" name="radFavAlbum" value="Album4" required <?php
                            if($favAlbum == 'Album4') print 'checked'; ?>>
                            <label class="radio-field" for="radFavAlbumAlbum4">Satellite Flight: The Journey to Mother Moon</label>
                        </p>

                        <p>
                            <input type="radio" id="radFavAlbumAlbum5" name="radFavAlbum" value="Album5" required <?php
                            if($favAlbum == "Album5") print 'checked'; ?>>
                            <label class="radio-field" for="radFavAlbumAlbum5">Speedin' Bullet 2 Heaven</label>
                        </p>

                        <p>
                            <input type="radio" id="radFavAlbumAlbum6" name="radFavAlbum" value="Album6" required <?php
                            if($favAlbum == "Album6") print 'checked'; ?>>
                            <label class="radio-field" for="radFavAlbumAlbum6">Passion, Pain, and Demon Slayin'</label>
                        </p>

                        <p>
                            <input type="radio" id="radFavAlbumAlbum7" name="radFavAlbum" value="Album7" required <?php
                            if($favAlbum == "Album7") print 'checked'; ?>>
                            <label class="radio-field" for="radFavAlbumAlbum7">Kids See Ghosts</label>
                        </p>

                        <p>
                            <input type="radio" id="radFavAlbumAlbum8" name="radFavAlbum" value="Album8" required <?php
                            if($favAlbum == "Album8") print 'checked'; ?>>
                            <label class="radio-field" for="radFavAlbumAlbum8">Man on the Moon III: The Chosen</label>
                        </p>

                        <p>
                            <input type="radio" id="radFavAlbumAlbum9" name="radFavAlbum" value="Album9" required <?php
                            if($favAlbum == 'Album9') print 'checked'; ?>>
                            <label class="radio-field" for="radFavAlbumAlbum1">Entergalactic</label>
                        </p>

                        <p>
                            <input type="radio" id="radFavAlbumNA" name="radFavAlbum" value="NA" required <?php
                            if($favAlbum == 'NA') print 'checked'; ?>>
                            <label class="radio-field" for="radFavAlbumAlbum1">Not Applicable</label>
                        </p>
                    </fieldset>

                    <fieldset class="radio">
                        <legend>After viewing this website, are you inclined to listen to Kid Cudi more?</legend>
                        <p>
                            <input type="radio" id="radListenAfterYes" name="radListenAfter" value="Yes" required <?php
                            if($listenAfter == 'Yes') print 'checked'; ?>>
                            <label class="radio-field" for="radListenAfterYes">Yes</label>
                        </p>

                        <p>
                            <input type="radio" id="radListenAfterNo" name="radListenAfter" value="No" required <?php
                            if($listenAfter == 'No') print 'checked'; ?>>
                            <label class="radio-field" for="radListenAfterNo">No</label>
                        </p>
                    
                    </fieldset>

                    <fieldset class="buttons">
                        <input id="btnSubmit" name="btnSubmit" type="submit" value="Submit">
                    </fieldset>
                </form>
            </section>
            <section class= "box5">
                <h2>Thank you!</h2>
                <?php
                print '<p>' . $message . '</p>';
                ?>
            </section>
        </main>
        <?php
        include 'footer.php';
        ?> 
     </body>
</html>