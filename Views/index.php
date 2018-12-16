<?php
$titulo = "swcpa";
include 'cabecalho.php';
?>
<div class="container cabecalho recuo">
    <h1>Bem-vindo ao swcpa!</h1>
    <div class="row">
        <div class="col-sm-8">
            Aqui você poderá gerenciar o arquivo escolar da Escola Estadual de Ensino Médio em Tempo Integral Marechal
            Rondon.
            A seguir, listamos algumas recomendações importantes.
            <ul>
                <li>
                    Recomendamos nomear a pasta de arquivo morto apenas com a letra inicial dos nomes das pastas de
                    estudantes que estão dentro da mesma, em seguida do seu número. Exemplo: <b>A1</b>. No caso dos
                    estudantes que concluíram o ensino médio, recomendamos digitar a palavra "Formandos" seguida do ano.
                    Exemplo: <b>Formandos 2018</b>.
                </li>
                <li>
                    Recomendamos prudência ao excluir uma pasta de arquivo morto, pois nestas pastas existem estudantes
                    vinculados que também terão seus registros apagados para sempre.
                </li>
                <li>
                    Quando você for alterar uma pasta de estudante, o campo de observação não preenche automaticamente
                    os dados gravados como acontece com o restante dos campos. Recomendamos que se leia antes a observação
                    que está salva e decida se deve ou não digitá-la novamente.
                </li>
            </ul>
        </div>
        <div class="col-sm-4">
            <h5>
            <span class="badge badge-dark text-left" style="border-radius: 2px; padding: 5px;">
                <i class="fas fa-database"></i> Registrado até o momento:<br>
            </span>
            <span class="badge badge-warning text-left" style="border-radius: 2px; padding: 5px;">
                <?php
                $arq = new \App\Model\Arquivo();
                $aDAO = new \App\DAO\ArquivoDAO();
                $arquivos = $aDAO->pesquisar($arq);
                $result = count($arquivos);
                echo "<i title='Arquivo morto' class='fas fa-archive'></i> {$result} pastas de arquivo morto";
                ?>
            </span>
            <span class="badge badge-warning text-left" style="border-radius: 2px; padding: 5px;">
                <?php
                $a = new \App\Model\Aluno();
                $aDAO = new \App\DAO\AlunoDAO();
                $alunos = $aDAO->pesquisar($a);
                $result = count($alunos);
                echo "<i title='Estudante' class='far fa-file-alt'></i> {$result} pastas de estudantes";
                ?>
            </span>
            </h5>
        </div>
    </div>
    <nav class="navbar" style="border-radius: 2px; background-color: #e3f2fd;">
        <div class="nav-item">
            <i class="fas fa-info-circle" title="Informação"></i> Em caso de dúvidas, envie e-mail para o
            <a href="mailto:mcs754@gmail.com" class="link">administrador</a>. Antes de realizar alterações nos registros
            salvos, certifique-se de que realmente é necessário.
        </div>
    </nav>
</div>
<?php
include 'rodape.php';
?>
