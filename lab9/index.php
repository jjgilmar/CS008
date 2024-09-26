<?php
include 'top.php';
?>    
        <main class="index-main">
            <h2 class='box1' id="firstHeader2">Most Commonly Used Renewable Energy Sources</h2>
                <ul class='box2'>
                    <li>Wind Energy</li>
                    <li>Hydroelectricity</li>
                    <li>Solar energy</li>
                    <li>Source: <cite>Joey Gilmartin</cite></li>
                </ul>
            <section class= "box3">
                <h2>Wind Energy</h2>
                <!--explain the energy source-->  
                    <p>The usage of wind energy is increasing throughout the whole world and especially in European countries like the UK in the form of wind farms. Wind farms are made up of multiple turbines in an open field with the intent of turning the wind into energy. The wind is converted into energy using turbines that spin the generator attached to it. This creates electrical energy. </p>
                    <figure class= "go-center">
                        <img class="rounded" alt="Wind Energy" src="images/wind-energy2.jpg">
                        <figcaption><cite><a href="https://www.scientificamerican.com/article/how-does-wind-energy-work/" target="_blank">Scientific American</a></cite></figcaption>
                    </figure> 
            </section>
            <section class= "box4">
                <h2>Hydroelectricity</h2>
                <!--Explain the energy source-->   
                    <p>Similarly to wind energy, hydroelectricity is also produced by using a turbine. Water flows into turbine blades causing the turbine to spin a generator that produces electrical energy. The advantage of hydroelectricity is that the water can be built up and used to create electricity according to demand. Unfortunately, it is used less than other forms of energy because of the large upfront cost of building a dam and the machinery.</p>
                    <figure class= "go-center">
                        <img class= "rounded" alt="Hydroelectricity" src="images/hydroelectric-dam.jpg">
                        <figcaption><cite><a href="https://education.nationalgeographic.org/resource/hydroelectric-energy" target="_blank">National Geographic</a></cite></figcaption>
                    </figure>  
            </section>
            <section class= "box5">
                <h2>Solar Panels</h2>
                <p>Solar energy is harnessed from solar radiation that is provided by the sun. It is most commonly produced by photovoltaic cells (solar panels) in solar fields or on the roofs of houses. The energy is produced in solar panels when the sun shines on the cell. The sunlight is absorbed into the cell and the energy creates electrical charges that cause electricity to flow. These are often used on homes to produce power and can reduce the cost of electricity.</p>
                <figure id="go-center-phone-tablet-solar" class="go-right">
                    <img class="rounded" alt="Solar Energy" src="images/solar-energy.jpg">
                    <figcaption><cite><a href="https://www.energy.gov/eere/solar/how-does-solar-work" target="_blank">Department of Energy</a></cite></figcaption>
                </figure>
                <table>
                    <caption>Renewable Energy Used in Countries Around the World</caption>
                    <tr>
                        <th>Countries</th>
                        <th>Wind Energy (in % of total energy used)</th>
                        <th>Hydroelectricity (in % of total energy used)</th>
                        <th>Solar Energy (in % of total energy used)</th>
                    </tr>

<?php
$sql = 'SELECT fldCountry, fldWindEnergy, fldHydroelectricity, fldSolarEnergy FROM tblRenewableEnergy';

$statement = $pdo->prepare($sql);
$statement->execute();

$records = $statement->fetchAll();

foreach ($records as $record) {
    print '<tr>';
    print '<td>' . $record['fldCountry'] . '</td>';
    print '<td>' . $record['fldWindEnergy'] . '</td>';
    print '<td>' . $record['fldHydroelectricity'] . '</td>';
    print '<td>' . $record['fldSolarEnergy'] . '</td>';
    print '</tr>' . PHP_EOL;
}
?>
                    <tr>
                        <td colspan="4"> Source: <cite><a href="https://en.wikipedia.org/wiki/List_of_countries_by_renewable_electricity_production" target= "_blank">https://en.wikipedia.org/wiki/List_of_countries_by_renewable_electricity_production</a></cite></td>
                    </tr>
                </table>
            </section>        
        </main>
        <?php
        include 'footer.php';
        ?>   
     </body>
</html>