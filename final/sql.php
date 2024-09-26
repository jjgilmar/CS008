<?php
include 'top.php';
?>    
        <main>
        <h1>SQL</h1>
        <h2>Create Table</h2>

            <pre>
                CREATE TABLE tblCudiSongs (
                pmkCudiSongsId INT AUTO_INCREMENT PRIMARY KEY,
                fldSong VARCHAR(50),
                fldReleaseDate DATE,
                fldStreams int,
                )
            </pre>
            
            <h2>Insert Data</h2>
            <pre>
            INSERT INTO tblCudiSongs (           fldSong, fldReleaseDate,
                fldStreams) VALUES
            ("Day 'N' Nite", '2009-09-15', 610057716),
            ('Pursuit Of Happiness(Nightmare)', '2009-09-15', 577853468),
            ('Mr. Rager', '2010-11-09', 319424383), 
            ('Reborn (feat. Kanye West', '2018-06-08', 269641418), 
            ('Erase Me- Main', '2010-11-09', 256511747)
            </pre>

            <h2>Select Records</h2>

            <pre>
            SELECT fldSong, fldReleaseDate, fldStreams FROM tblCudiSongs
            </pre>      
        <h2>Create Table 2</h2>
            <pre>
                CREATE TABLE tblKidCudiSurvey(
                pmkKidCudiSurveyId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                fldFirstName VARCHAR(50) DEFAULT NULL,
                fldLastName VARCHAR(50) DEFAULT NULL,
                fldEmail VARCHAR(50) DEFAULT NULL,
                fldListenBefore varchar(5) DEFAULT NULL, 
                fldAlbum1 tinyint(1) DEFAULT 0, 
                fldAlbum2 tinyint(1) DEFAULT 0, 
                fldAlbum3 tinyint(1) DEFAULT 0,
                fldAlbum4 tinyint(1) DEFAULT 0, 
                fldAlbum5 tinyint(1) DEFAULT 0, 
                fldAlbum6 tinyint(1) DEFAULT 0, 
                fldAlbum7 tinyint(1) DEFAULT 0, 
                fldAlbum8 tinyint(1) DEFAULT 0, 
                fldAlbum9 tinyint(1) DEFAULT 0, 
                fldNone tinyint(1) DEFAULT 0, 
                fldFavAlbum VARCHAR(50) DEFAULT NULL,
                fldListenAfter VARCHAR(5) DEFAULT NULL
                )
            </pre>
            
            <h2>Insert Data 2</h2>
            <pre>
                INSERT INTO tblKidCudiSurvey(pmkKidCudiSurveyId, fldFirstName, fldLastName, fldEmail, fldListenBefore, fldAlbum1, fldAlbum2, fldAlbum3, fldAlbum4, fldAlbum5, fldAlbum6, fldAlbum7, fldAlbum8, fldAlbum9, fldNone, fldFavAlbum, fldListenAfter)
                VALUES
                (1, 'Joey' 'Gilmartin', 'jjgilmar@uvm.edu', 'Yes', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', 'Album1', 'Yes')
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