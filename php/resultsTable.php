<?php 
    if(empty($_GET["country_slc"])){
        include("connection.php");
    }
    include("functions.php");
    $executeQuery = $connectiondb->query($query);
    $number_register = $executeQuery->num_rows;

    if($number_register==0){
        echo "<br /><br /><span class='messages'>No se encontraron registros con esta búsqueda :(</span><br /><br />";
    }
    else{
    ?>
        <br /><br />
        <table>
            <thead>
                <tr>
                    <th>email</th>
                    <th>nombre</th>
                    <th>sexo</th>
                    <th>nacimiento</th>
                    <th>telefono</th>
                    <th>pais</th>
                    <th>imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while($register = $executeQuery->fetch_assoc())
                {
                ?>
                    <tr>
                        <td><?php echo utf8_decode($register["email"]); ?></td>
                        <td><?php echo utf8_decode($register["name_user"]); ?></td>
                        <td><?php echo ($register["sex"]=="M")?"Masculino":"Femenino"; ?></td>
                        <td><?php echo utf8_decode($register["birth"]); ?></td>
                        <td><?php echo utf8_decode($register["phone"]); ?></td>
                        <td><?php echo utf8_decode($register["country"]); ?></td>
                        <td><img src="img/photos/<?php echo utf8_decode($register["photo"]); ?>"/></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    $connectiondb->close();
?>