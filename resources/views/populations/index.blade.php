<html>
    <head>
        <title>自來水供水普及率</title>
    </head>
    <body>
        <h1>自來水供水普及率</h1>

        <table border="1">
            @foreach ($populations as $population)
                <tr>  
                    <td>{{ $population->actual_population_served }}</td>
                    <td>{{ $population->date_time }}</td> 
                    <td>{{ $population->executing_unit }}</td> 
                    <td>{{ $population->percentage_of_population_served }}</td> 
                    <td>{{ $population->population_in_served_area }}</td> 
                    <td>{{ $population->remarks }}</td>
                </tr>
            @endforeach     
        </table>  
        
    </body>
</html>







