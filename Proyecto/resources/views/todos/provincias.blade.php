<?php
      try {
        
        include("./BD/conexion.php");
        $rs = mysqli_query(
          $enlace,
          "select nombre as provincia
        from tbl_provincias;"
        );

        $provincias = [];

        while ($row = $rs->fetch_assoc()) {
          $provincias[] = $row['provincia'];
        }

        foreach ($provincias as $provincia) {
          echo "<option value= $provincia>$provincia</option>";
        }
      } catch (Exception $e) {
        echo "<h1>Error</h1>";
        echo $e->getTraceAsString();
      }

?>