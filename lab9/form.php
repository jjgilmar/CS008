<?php
include 'top.php';

$dataIsGood = false;
$message = '';

$email = '';

$windEnergy = false;
$solarEnergy = false;
$hydroEnergy = false;
$none = false;

$useEnergy = 'Already Do';

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
            <h2 class= "box1" id="firstHeader2">Renewable Energy in Your Life</h2>
                <section class= "box3">
                    <h2>Survey</h2>
                    <figure id="go-center-phone-tablet" class="go-left">
                        <img class="rounded" alt="Renewable Energy at Home" src="images/home-solar-panels.jpg">
                        <figcaption><cite><a href="https://www.build-review.com/11-benefits-for-installing-a-home-solar-system/" target="_blank">BUILD</a></cite></figcaption>
                    </figure>
                    <p>This form is intended to collect information about the usage of renewable energy sources</p>
<?php
if($_SERVER["REQUEST_METHOD"] == 'POST'){

    //sanitize data
    $email = getData('txtEmail');

    $windEnergy = (int) getData('chkWindEnergy');
    $solarEnergy = (int)  getData('chkSolarEnergy');
    $hydroEnergy =  (int) getData('chkHydroEnergy');
    $none = (int)  getData('chkNone');

    $useEnergy = getData('radUseEnergy');

     //validate form
    $dataIsGood = true;

    if($email == ''){
        print'<p class="mistake">Please type in your email address.</p>';
        $dataIsGood = false;
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        print '<p class="mistake">Your email address has invalid characters.</p>';
        $dataIsGood = false;
    }

    if ($useEnergy != "Already Do" AND $useEnergy != "Yes" AND $useEnergy != "No" AND $useEnergy != "Unsure"){
        print '<p class="mistake">Please tell me if you would use renewable energy sources.</p>';
        $dataIsGood = false; 
    }

    $totalChecked = 0;

    if($windEnergy != 1) $windEnergy = 0;
    $totalChecked += $windEnergy;

    if($solarEnergy != 1) $solarEnergy = 0;
    $totalChecked += $solarEnergy;

    if($hydroEnergy != 1) $hydroEnergy = 0;
    $totalChecked += $hydroEnergy;

    if($none != 1) $none = 0;
    $totalChecked += $none;

    if($totalChecked == 0){
        print '<p class="mistake">Please choose at least one checkbox</p>';
        $dataIsGood = false;
    }
    if($dataIsGood){
        try{
            $sql = 'INSERT INTO tblYourEnergy( fldEmail, fldWindEnergy, fldSolarEnergy, fldHyrdroEnergy, fldNone, fldUseEnergy)
            VALUES (?, ?, ?, ?, ?, ?)';

            $statement = $pdo->prepare($sql);
            $data = array($email, $windEnergy, $solarEnergy, $hydroEnergy, $none, $useEnergy);


            if($statement->execute($data)){
                $message = '<h2>Thank you</h2>';
                $message .= '<p>Your information was successfully saved</p>';
            } else {                
                $message .= '<p>Record was NOT successfully saved</p>';
                $dataIsGood = false;
            }
        } catch(PDOException $e){
            $message = '<p>Couldn/t insert the record, please contact someone</p>';
            $dataIsGood = false;
        }
    }
} //ends form submitted
?>
                </section>
            <section class= "box4">
                <h2>Please enter your information below.</h2>
                <form action="#" id="frmRenewableEnergy" method="post">
                    
                    <fieldset class="contact">
                        <legend>Enter your email address</legend>  
                        <p>
                            <label class="required" for="txtEmail">Email</label>
                            <input id="txtEmail" maxlength="50" name="txtEmail" onfocus="this.select()" type="email" value="" <?php print $email; ?> required>
                        </p>
                    </fieldset>

                    <fieldset class= "checkbox">
                        <legend>Do you currently use any of the following renewable energy sources?</legend>
                            <p>
                                <input id="chkWindEnergy" name="chkWindEnergy" type="checkbox" value="1" <?php 
                                if($windEnergy) print 'checked'; ?>>
                                <label for="chkWindEnergy">Wind Energy</label>
                            </p>

                            <p>
                                <input id="chkSolarEnergy" name="chkSolarEnergy"  type="checkbox" value="1" <?php 
                                if($solarEnergy) print 'checked'; ?>>
                                <label for="chkSolarEnergy">Solar Energy</label>
                            </p>

                            <p>
                                <input id="chkHydroEnergy" name="chkHydroEnergy" type="checkbox" value="1" <?php 
                                if($hydroEnergy) print 'checked'; ?>>
                                <label for="chkHydroEnergy">Hydroelectricity</label>
                            </p>

                            <p>
                                <input id="chkNone" name="chkNone" type="checkbox" value="1" <?php 
                                if($none) print 'checked'; ?>>
                                <label for="chkNone">None of the Above</label>
                            </p>
                    </fieldset>

                    <fieldset class="radio">
                       <legend>Would you use renewable energy sources in your life?</legend>
                        <p>
                            <input type="radio" id="radUseEnergyAlreadyDo" name="radUseEnergy" value="AlreadyDo" required <?php
                            if($useEnergy == 'Already Do') print 'checked'; ?>>
                            <label class="radio-field" for="radUseEnergyAlreadyDo">Already Do</label>
                        </p>
                    
                        <p>
                            <input type="radio" id="radUseEnergyYes" name="radUseEnergy" value="Yes" required <?php
                            if($useEnergy == 'Yes') print 'checked'; ?>>
                            <label class="radio-field" for="radUseEnergyYes">Yes</label>
                        </p> 

                        <p>
                            <input type="radio" id="radUseEnergyNo" name="radUseEnergy" value="No" required <?php
                            if($useEnergy == 'No') print 'checked'; ?>>
                            <label class="radio-field" for="radUseEnergyNo">No</label>
                        </p>

                        <p>
                            <input type="radio" id="radUseEnergyUnsure" name="radUseEnergy" value="Unsure" required <?php
                            if($useEnergy == 'No') print 'checked'; ?>>
                            <label class="radio-field" for="radUseEnergyUnsure">Unsure</label>
                        </p>
                    </fieldset>

                    <fieldset class="buttons">
                        <input id="btnSubmit" name="btnSubmit" type="submit" value="Submit">
                    </fieldset>
                </form>
            </section>
            <section class= "box5">
                <?php
                print '<h2>' . $message . '</h2>';
                print '<p>Post Array:</p><pre>';
                print_r($_POST);
                print '</pre>';
                ?>
            </section>
        </main>
        <?php
        include 'footer.php';
        ?> 
     </body>
</html>