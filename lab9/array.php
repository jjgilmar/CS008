<?php
include 'top.php';
$gasEmissions = array(
        array(2000, 5912, 711, 458, 138),
        array(2005, 6138, 697, 453, 146),
        array(2010, 5681, 705, 453, 175),
        array(2015, 5377, 667, 446, 179),
        array(2020, 4715, 650, 426, 189)
);

?>   
        <main class='detail-main'>
            <h2 class= "box1" id="firstHeader2">Gas Emissions</h2>
            <section class= "box3">
                <h2>Gas Emissions</h2>
                    <p>Gas emissions are dangerous to the Earth's atmosphere because they are often cause for global warming. This is because many of these gasses trap heat in the atmosphere which is why they are called greenhouse gases. These gases can stay in the atmosphere for long periods of time(up to thousands of years). Some examples of these gasses include Carbon Dioxide, Methane, Nitrous Oxide, and Flourinated Gases. Out of these gasses, carbon is the most prominent in our atmosphere because of how often we burn natural gas and oil.</p>

                    <p>Greenhouse gasses are often a direct result of the failure to use renewbale energy sources. For example, much of the carbon dioxide pollution stems from the burning of fossil fuels, such as oil and natural gas. This could be avoided by switching many of our energy sources to renewable energy sources because they do not create or put out any harmful gasses into the environment. For example, if every house and industry had solar panels, we would not need to burn coal for electricity anymore. </p>
            </section>
            <section class= "box5">
                <h2>Recent Emissions by Gas Type</h2>
                <table>
                        <tr>
                                <th>Year</th>
                                <th>Carbon Dioxide</th>
                                <th>Methane</th>
                                <th>Nitrous Oxide</th>
                                <th>Flurinated Gas</th>
                        </tr>
<?php 
foreach($gasEmissions as $gasEmission){
        print '<tr>';
        print '<td>' . $gasEmission[0] . '</td>';
        print '<td>' . $gasEmission[1] . '</td>';
        print '<td>' . $gasEmission[2] . '</td>';
        print '<td>' . $gasEmission[3] . '</td>';
        print '<td>' . $gasEmission[4] . '</td>';
        print '</tr>' . PHP_EOL;
}
?>
                        <tr>
                                <td colspan="5">Numbers are measured in million metric tons</td>
                    </tr>
                </table>
            </section>
            <section class= "box4">
                <h2>Emissions Image</h2>
                    <figure class= "emissions-pic">
                        <img class="rounded" alt="Gas Emissions" src="images/gas-emissions.jpg">
                        <figcaption><cite><a href = "https://www.livescience.com/37821-greenhouse-gases.html" target="_blank">Live Science</a></cite></figcaption>
                    </figure>
            </section>        
        </main>
        <?php
        include 'footer.php';
        ?> 
     </body>
</html>