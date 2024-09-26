<?php
include 'top.php';
?>    
        <main>
        <h1>SQL</h1>
        <h2>Create Table</h2>

            <pre>
                CREATE TABLE tblRenewableEnergy (
                pmkRenewableEnergyId INT AUTO_INCREMENT PRIMARY KEY,
                fldCountry VARCHAR(50),
                fldWindEnergy float,
                fldHydroelectricity float,
                fldSolarEnergy float
                )
            </pre>
            
            <h2>Insert Data</h2>
            <pre>
            INSERT INTO tblRenewableEnergy (fldCountry, fldWindEnergy, fldHydroelectricity, fldSolarEnergy) VALUES
            ('United States', 5.3, 6.8, 1.2),
            ('United Kingdom', 17.1, 1.6, 3.9),
            ('China', 5.0, 16.1, 1.6)
            </pre>
            <h2>Select Records</h2>

            <pre>
            SELECT fldCountry, fldWindEnergy, fldHydroelectricity, fldSolarEnergy FROM tblRenewableEnergy
            </pre>      
        <h2>Create Table 2</h2>
            <pre>
                CREATE TABLE tblYourEnergy (
                pmkYourEnergyId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                fldEmail varchar(50) DEFAULT NULL,
                fldWindEnergy tinyint(1) DEFAULT 0,
                fldSolarEnergy tinyint(1) DEFAULT 0,
                fldHyrdroEnergy tinyint(1) DEFAULT 0,
                fldNone tinyint(1) DEFAULT 0,
                fldUseEnergy varchar(11) DEFAULT NULL
                )
            </pre>
            
            <h2>Insert Data 2</h2>
            <pre>
                INSERT INTO tblYourEnergy(pmkYourEnergyId, fldEmail, fldWindEnergy, fldSolarEnergy, fldHyrdroEnergy, fldNone, fldUseEnergy)
                VALUES
                (1, 'jjgilmar@uvm.edu', '0', '1', '1', '0', 'Yes')
            </pre>
            <h2>Select Records</h2>

            <pre>
            </pre> 
        </main>
        <?php
        include 'footer.php';
        ?>   
     </body>
</html>