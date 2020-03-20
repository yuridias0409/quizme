<?php 
    if (isset($_GET['userid'])) {
        $userid = $_GET['userid'];
    }   else{?>
        <script type="text/javascript">
		    alert('Nenhum aluno selecionado!!!');
		    window.location.assign('./?opt=1');
	    </script><?php
    }
?>    
<fieldset>
    <img src="construtorGraficoIndividual.php?userid=<?=$userid?>" alt="Gráfico em relação as sequências" />
</fieldset>  