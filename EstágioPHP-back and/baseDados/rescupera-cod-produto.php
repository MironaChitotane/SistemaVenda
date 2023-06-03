<?php
        include_once('con.php');
        $sql = "SELECT CODPRODUTO FRoM PRODUTOS";
	$result = mysqli_query($con,$sql) or die ('Falha na conexão'.mysqli_error($con));

	if (mysqli_num_rows($result)>0) {

		
		while ($row = mysqli_fetch_assoc($result)) {
		
                $newCodProduto = $row['CODPRODUTO'];
		}
                $newCodProduto= $newCodProduto + 1;
                echo $newCodProduto;
	};
	mysqli_close($con);

        ?>