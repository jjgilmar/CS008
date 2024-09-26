<?php
include 'top.php';
?>   
        <main class="detail2-main">
            <h1 class= "box1" id="firstHeader2">Singles and Other Projects</h1>
            <section class= "box2">
                <h2>Entergalactic</h2>
                    <p>In recent years, Kid Cudi has expressed his interest in creating media in other industries. He has appeared as a feature in many movies and TV shows such as <i>Need For Speed</i> (2014),  <i>X </i> (2022), One Tree Hill, and Brooklyn Nine-Nine. However, Kid Cudi dove deeper into this industry in 2022 by creating, producing, and starring as a voice actor in his own movie "Entergalactic".</p>

                    <p><i>Entergalactic</i> is an animated, light-hearted, romantic comedy that serves as a visual for his album <i>Entergalactic</i>. The animation style takes inspiration from the popular movie, <i>Spider-Man: Into The Spider-Verse</i>. <i>Entergalactic</i> was announced in August 2022 as a series and was later reworked into a 92 minute movie for its release on September 30th, 2022 as a Netflix exclusive. The story portrays Kid Cudi as an artist named Jabari who begins to fall in love with his new neighbor Meadow, while also balancing his career.</p>

                    <p>Upon its release, the movie was great success. Both critics and audiences enjoyed Cudi's production as both groups gave it above a 90% rating. Recently, he won the Groundbreaker Award at the Celebration of Black Cinema and Television for <i>Entergalactic</i>. </p>
            </section>
            <section class= "box3">
                <h2>Popular Singles and Features</h2>
                    <p>Kid Cudi has worked with multiple artists such as <a href="https://open.spotify.com/artist/5K4W6rqBFWDnAN6FQUkS6x?si=ZzLQdMiqSsmJLtEPkUUZRQ">Kanye West</a>, <a href="https://open.spotify.com/artist/0Y5tJX1MQlPlqiwlOH1tJY?si=k44Fi1VZQ0yCb7_vCTCAXg">Travis Scott</a>, <a href="https://open.spotify.com/artist/0eDvMgVFoNV3TpwtrVCoTj?si=G22L-TArT9-qOsdKqXHRXA">Pop Smoke</a>, and <a href="https://open.spotify.com/artist/3nFkdlSjzX9mRTtwJOzDYB?si=J5nhSCBYRHaS15C1QhhnZw">Jay-Z</a>. During these collaborations he has made multiple successful songs and projects. He has featured on countless Kanye songs with the most successful being “All of the Lights” which also featured Rihanna. He has also had success with Travis Scott as the two created a rap duo called “THE SCOTTS” and released a song called “THE SCOTTS” which reached number 1 on the charts in May of 2020</p>

                    <p>Outside of features, Kid Cudi has had an abundance of success on his own singles starting from the beginning of his career. His first single, 'Day n Nite' was his first huge success. The song was later added to his first mixtape <i>A Kid Named Cudi</i> and then was later added to his first studio album <i>Man on the Moon: The End of the Day</i>. This single has become a defining moment in his career and is often referred to as his biggest success.
</p>

                    <p>He has continued to release singles throughout his career with his most recent, “Love.”, being another huge success. “Love.” was originally recorded in 2013 for his album <i>Satellite Flight: The Journey to Mother Moon</i> and has been leaked on SoundCloud since 2014 and quickly became popular. The long-awaited single was finally released on July 8th, 2022.</p>
                </section>
                <div class="box4">
                    <figure class= "go-center">
                        <img alt="Entergalactic" src="images/entergalactic-show.jpg">
                        <figcaption><cite><a href="https://www.latimes.com/entertainment-arts/tv/story/2022-09-29/netflix-entergalactic-kid-cudi-review" target="_blank">LA Times</a></cite></figcaption>
                    </figure>
            </div>
            <section class= "box5">
                <h2>Kid Cudi's Most Popular Songs</h2>
                <table>
                    <caption></caption>
                    <tr>
                        <th>Song Title</th>
                        <th>Release Date</th>
                        <th>Amount of Streams</th>
                    </tr>

<?php
$sql = 'SELECT fldSong, fldReleaseDate, fldStreams FROM tblCudiSongs';

$statement = $pdo->prepare($sql);
$statement->execute();

$records = $statement->fetchAll();

foreach ($records as $record) {
    print '<tr>';
    print '<td>' . $record['fldSong'] . '</td>';
    print '<td>' . $record['fldReleaseDate'] . '</td>';
    print '<td>' . $record['fldStreams'] . '</td>';
    print '</tr>' . PHP_EOL;
}
?>
                    <tr>
                        <td colspan="3"> Source: <cite><a href="https://open.spotify.com/" target= "_blank">Spotify</a></cite></td>
                    </tr>
                </table>
            </section>        
        </main>
        <?php
        include 'footer.php';
        ?> 
     </body>
</html>