<?php 
    if (isset($_GET['turma'])) {
        $turma = $_GET['turma'];
    }   else{?>
        <script type="text/javascript">
		    alert('Nenhum aluno selecionado!!!');
		    window.location.assign('./?opt=1');
	    </script><?php
    }
?>    
<fieldset>
    <img src="construtorGraficoIndividual.php?turma=<?=$turma?>" alt="Gráfico em relação as sequências" />
</fieldset>  