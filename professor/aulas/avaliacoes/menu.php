<?php
        include 'configs.php';
        $query = "SELECT nome FROM tbl_professor WHERE id = '$id'";
        $queryRUN = mysqli_query($con,$query);
        // foreach ($queryRUN as $key => $value) {
        //     echo $value->nome;
        // }
        $reg = mysqli_fetch_row($queryRUN);
?>  

<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
  <i class="fas fa-bars"></i>
</a>
<nav id="sidebar" class="sidebar-wrapper">
  <div class="sidebar-content">
    <div class="sidebar-brand">
      <a href="http://quizmeedu.ga/professor/aulas/"><img style="width: 50%" src="contorno.png"></a>
      <div id="close-sidebar">
        <i class="fas fa-times"></i>
      </div>
    </div>
    <div class="sidebar-header">
      <div class="user-info">
        <span style="font-size: 15px" class="user-name"><?php echo $reg[0];?>
        </span>
        <span class="user-status">
          <i class="fa fa-circle"></i>
          <span>Online</span>
        </span>
      </div>
    </div>
    <!-- sidebar-search  -->
    <div class="sidebar-menu">
      <ul>
        <li class="header-menu">
          <span>Geral</span>
        </li>
        <li class="sidebar-dropdown">
          <a href="#">
          <i class="far fa-file-alt"></i>
          <span>Avaliações</span>
          </a>
          <div class="sidebar-submenu">
              <ul>
                  <li>
                      <a href="./avaliacoes/?opt=0">aaaaaaaaa</a>
                  </li>
                  <li>
                      <a href="./avaliacoes/?opt=1">Deletar</a>
                  </li>
                  <li>
                      <a href="./avaliacoes/?opt=2">Editar</a>
                  </li>
                  <li>
                      <a href="./avaliacoes/?opt=3">Agendar</a>
                  </li>
              </ul>
          </div>
          </li>

          <li class="sidebar-dropdown">
              <a href="#">
                  <i class="fas fa-users"></i>
                  <span>Turmas</span>
              </a>
              <div class="sidebar-submenu">
              <ul>
                  <li>
                      <a href="./turmas/?opt=0">Criar</a>
                  </li>
                  <li>
                      <a href="./turmas/?opt=1">Deletar</a>
                  </li>
                  <li>
                      <a href="./turmas/?opt=2">Editar</a>
                  </li>
              </ul>
              </div>
          </li>

          <li class="sidebar-dropdown">
              <a href="#">
                  <i class="fas fa-chart-bar"></i>
                  <span>Pontuações</span>
              </a>
              <div class="sidebar-submenu">
              <ul>
                    <li>
                        <a class="dropdown-item" href="../pontuacao/?opt=0">Gráficos: Alunos</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="../pontuacao/?opt=1">Gráficos: Turmas</a>
                    </li>
              </ul>
              </div>
          </li>
      </ul>
    <!-- sidebar-menu  -->
  </div>
  <!-- sidebar-content  -->
  <div class="sidebar-footer">
    <a href="sair.php">
      <i class="fa fa-power-off"></i>
    </a>
  </div>
</nav>

